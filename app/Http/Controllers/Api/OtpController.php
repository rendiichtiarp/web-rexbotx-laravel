<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^(62|60|65|66|63|673|84|855|856|95)[8-9][0-9]{7,11}$/'
            ],
            'type' => [
                'required',
                'string',
                'in:signup,reset_password'
            ]
        ], [
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Format nomor telepon tidak valid. Gunakan format: [kode negara][nomor], contoh: 628123456789',
            'type.required' => 'Tipe OTP wajib diisi',
            'type.in' => 'Tipe OTP tidak valid'
        ]);

        // Cek apakah nomor sudah terdaftar untuk signup
        if ($request->type === 'signup' && User::where('id', $request->phone_number)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor telepon sudah terdaftar'
            ], 400);
        }

        // Cek apakah nomor belum terdaftar untuk reset password
        if ($request->type === 'reset_password' && !User::where('id', $request->phone_number)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor telepon tidak terdaftar'
            ], 400);
        }

        // Hapus OTP lama jika ada
        Otp::where('phone_number', $request->phone_number)
            ->where('type', $request->type)
            ->delete();

        // Generate OTP 6 digit
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Simpan OTP baru
        Otp::create([
            'phone_number' => $request->phone_number,
            'otp' => $otp,
            'type' => $request->type,
            'expires_at' => Carbon::now()->addMinutes(5)
        ]);

        // Di sini Anda bisa menambahkan logika untuk mengirim OTP via WhatsApp/SMS
        // Untuk sementara kita tampilkan OTP di response (development only)
        return response()->json([
            'success' => true,
            'message' => 'OTP berhasil dikirim',
            'data' => [
                'phone_number' => $request->phone_number,
                'expires_in' => 300, // 5 menit dalam detik
                'otp' => $otp // Hapus ini di production
            ]
        ]);
    }

    public function verify(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^(62|60|65|66|63|673|84|855|856|95)[8-9][0-9]{7,11}$/'
            ],
            'otp' => [
                'required',
                'string',
                'size:6',
                'regex:/^[0-9]+$/'
            ],
            'type' => [
                'required',
                'string',
                'in:signup,reset_password'
            ]
        ], [
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Format nomor telepon tidak valid. Gunakan format: [kode negara][nomor], contoh: 628123456789',
            'otp.required' => 'Kode OTP wajib diisi',
            'otp.size' => 'Kode OTP harus 6 digit',
            'otp.regex' => 'Kode OTP hanya boleh berisi angka',
            'type.required' => 'Tipe OTP wajib diisi',
            'type.in' => 'Tipe OTP tidak valid'
        ]);

        // Cek OTP
        $otp = Otp::where('phone_number', $request->phone_number)
            ->where('otp', $request->otp)
            ->where('type', $request->type)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otp) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak valid atau sudah kadaluarsa'
            ], 400);
        }

        // Hapus OTP hanya jika tipe signup
        if ($request->type === 'signup') {
            $otp->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Verifikasi OTP berhasil'
        ]);
    }

    public function check(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/^(62|60|65|66|63|673|84|855|856|95)[8-9][0-9]{7,11}$/'
            ]
        ], [
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Format nomor telepon tidak valid. Gunakan format: [kode negara][nomor], contoh: 628123456789'
        ]);

        // Cek OTP
        $otp = Otp::where('phone_number', $request->phone_number)
            ->where('type', 'signup')
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otp) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada OTP aktif untuk nomor ini',
                'data' => [
                    'phone_number' => $request->phone_number,
                    'has_active_otp' => false
                ]
            ]);
        }

        // Hitung sisa waktu
        $remainingTime = Carbon::now()->diffInSeconds($otp->expires_at);

        return response()->json([
            'success' => true,
            'message' => 'OTP masih aktif',
            'data' => [
                'phone_number' => $request->phone_number,
                'has_active_otp' => true,
                'expires_in' => $remainingTime,
                'created_at' => $otp->created_at,
                'expires_at' => $otp->expires_at
            ]
        ]);
    }
} 