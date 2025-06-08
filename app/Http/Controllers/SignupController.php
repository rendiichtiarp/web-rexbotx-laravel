<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SignupController extends Controller
{
    public function index()
    {
        return view('pages.signup');
    }

    public function store(Request $request)
    {
        // Validasi tanggal lahir terlebih dahulu
        $birthDate = Carbon::parse($request->birthdate);
        $age = $birthDate->age;
        
        if ($age < 13) {
            return back()
                ->withInput()
                ->withErrors(['birthdate' => 'Anda harus berusia minimal 13 tahun untuk mendaftar']);
        }

        // Format nomor telepon lengkap untuk pengecekan
        $fullPhoneNumber = $request->country_code . $request->phone_number;

        $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'last_name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'min:5',
                'max:20',
                'regex:/^[a-z0-9_]+$/',
                'unique:users,username',
                'not_in:admin,root,administrator,system,moderator,bot,support,help,info,test,demo,guest,anonymous'
            ],
            'country_code' => [
                'required',
                'string',
                Rule::in(['62','60','65','66','63','673','84','855','856','95'])
            ],
            'phone_number' => [
                'required',
                'string',
                'regex:/^[8-9][0-9]{7,11}$/',
                function ($attribute, $value, $fail) use ($fullPhoneNumber) {
                    if (User::where('id', $fullPhoneNumber)->exists()) {
                        $fail('Nomor telepon sudah terdaftar');
                    }
                }
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]+$/'
            ],
            'birthdate' => [
                'required',
                'date',
                'before:'.Carbon::now()->subYears(13)->format('Y-m-d'),
                'after:'.Carbon::now()->subYears(100)->format('Y-m-d')
            ],
            'terms' => 'required|accepted',
        ], [
            'first_name.required' => 'Nama depan wajib diisi',
            'first_name.regex' => 'Nama depan hanya boleh mengandung huruf',
            'first_name.max' => 'Nama depan maksimal 100 karakter',
            
            'last_name.required' => 'Nama belakang wajib diisi',
            'last_name.regex' => 'Nama belakang hanya boleh mengandung huruf',
            'last_name.max' => 'Nama belakang maksimal 100 karakter',
            
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 5 karakter',
            'username.max' => 'Username maksimal 20 karakter',
            'username.regex' => 'Username hanya boleh mengandung huruf kecil, angka, dan underscore',
            'username.unique' => 'Username sudah digunakan',
            'username.not_in' => 'Username tersebut tidak diperbolehkan',
            
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Nomor telepon harus diawali dengan 8 atau 9 dan memiliki panjang 8-12 digit',
            
            'country_code.required' => 'Kode negara wajib diisi',
            'country_code.in' => 'Kode negara tidak valid',
            
            'password.required' => 'Kata sandi wajib diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password.max' => 'Kata sandi maksimal 32 karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'password.regex' => 'Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&#)',
            
            'birthdate.required' => 'Tanggal lahir wajib diisi',
            'birthdate.date' => 'Format tanggal lahir tidak valid',
            'birthdate.before' => 'Anda harus berusia minimal 13 tahun untuk mendaftar',
            'birthdate.after' => 'Tanggal lahir tidak valid (maksimal 100 tahun yang lalu)',
            
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan'
        ]);

        // Simpan data sementara di session
        $request->session()->put('signup_data', [
            'first_name' => Str::title($request->first_name),
            'last_name' => Str::title($request->last_name),
            'name' => trim(Str::title($request->first_name) . ' ' . Str::title($request->last_name)),
            'username' => strtolower($request->username),
            'phone_number' => $fullPhoneNumber,
            'password' => $request->password,
            'birthdate' => $request->birthdate,
            'birth_date_time' => $birthDate->timestamp * 1000,
            'age' => $age
        ]);

        // Return response untuk menampilkan modal OTP
        return response()->json([
            'success' => true,
            'message' => 'Silakan masukkan kode OTP yang telah dikirim',
            'phone_number' => $fullPhoneNumber
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6|regex:/^[0-9]+$/'
        ], [
            'otp.required' => 'Kode OTP wajib diisi',
            'otp.size' => 'Kode OTP harus 6 digit',
            'otp.regex' => 'Kode OTP hanya boleh berisi angka'
        ]);

        // Ambil data signup dari session
        $signupData = $request->session()->get('signup_data');
        if (!$signupData) {
            return response()->json([
                'success' => false,
                'message' => 'Data pendaftaran tidak ditemukan'
            ], 400);
        }

        try {
            // Cek OTP
            $otp = Otp::where('phone_number', $signupData['phone_number'])
                ->where('otp', $request->otp)
                ->where('type', 'signup')
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (!$otp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode OTP tidak valid atau sudah kadaluarsa'
                ], 400);
            }

            // Hapus OTP yang sudah diverifikasi
            $otp->delete();

            // Buat user baru
            $user = new User();
            $user->id = $signupData['phone_number'];
            $user->name = $signupData['name'];
            $user->username = $signupData['username'];
            $user->password = Hash::make($signupData['password']);
            $user->birth_date = $signupData['birthdate'];
            $user->birth_date_time = $signupData['birth_date_time'];
            $user->age = $signupData['age'];
            $user->save();

            // Hapus data signup dari session
            $request->session()->forget('signup_data');

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil! Silakan login.',
                'redirect' => route('signin')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat verifikasi OTP. Silakan coba lagi.'
            ], 500);
        }
    }
}
