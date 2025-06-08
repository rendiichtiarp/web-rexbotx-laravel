<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SigninController extends Controller
{
    public function index()
    {
        return view('pages.signin');
    }

    public function authenticate(Request $request)
    {
        // Format nomor telepon lengkap untuk pengecekan
        $phone = $request->phone_number;
        if (substr($phone, 0, 1) === '0') {
            $phone = substr($phone, 1);
        }
        $fullPhoneNumber = $request->country_code . $phone;

        // Validasi input
        $request->validate([
            'country_code' => [
                'required',
                'string',
                Rule::in(['62','60','65','66','63','673','84','855','856','95'])
            ],
            'phone_number' => [
                'required',
                'string',
                'regex:/^[8-9][0-9]{7,11}$/'
            ],
            'password' => 'required|string',
        ], [
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Nomor telepon harus diawali dengan 8 atau 9 dan memiliki panjang 8-12 digit',
            
            'country_code.required' => 'Kode negara wajib diisi',
            'country_code.in' => 'Kode negara tidak valid',
            
            'password.required' => 'Kata sandi wajib diisi'
        ]);

        // Coba login dengan credentials
        $credentials = [
            'id' => $fullPhoneNumber,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()
            ->withInput($request->except('password'))
            ->withErrors([
                'phone_number' => 'Nomor telepon atau kata sandi salah.'
            ]);
    }

    public function forgotPassword()
    {
        return view('pages.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^(62|60|65|66|63|673|84|855|856|95)[8-9][0-9]{7,11}$/',
                'exists:users,id'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]+$/'
            ]
        ], [
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Format nomor telepon tidak valid',
            'phone_number.exists' => 'Nomor telepon tidak terdaftar',
            
            'password.required' => 'Kata sandi wajib diisi',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password.max' => 'Kata sandi maksimal 32 karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'password.regex' => 'Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&#)'
        ]);

        try {
            // Cek OTP terakhir
            $otp = Otp::where('phone_number', $request->phone_number)
                ->where('type', 'reset_password')
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (!$otp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sesi reset password telah kadaluarsa. Silakan mulai dari awal.'
                ], 400);
            }

            // Update password
            $user = User::find($request->phone_number);
            $user->password = Hash::make($request->password);
            $user->save();

            // Hapus OTP setelah password berhasil direset
            $otp->delete();

            return response()->json([
                'success' => true,
                'message' => 'Kata sandi berhasil direset',
                'redirect' => route('signin')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mereset kata sandi'
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }
}
