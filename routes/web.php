<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\OtpController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Command
Route::get('/command', [CommandController::class, 'index'])->name('command');

// Halaman Rating
Route::get('/rating', [RatingController::class, 'index'])->name('rating');

// Halaman Signup
Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
Route::post('/signup/verify-otp', [SignupController::class, 'verifyOtp'])->name('signup.verify-otp');
Route::post('/signup/resend-otp', [SignupController::class, 'resendOtp'])->name('signup.resend-otp');

// Halaman Signin
Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'authenticate'])->name('signin.authenticate');

// Lupa Password
Route::get('/forgot-password', [SigninController::class, 'forgotPassword'])->name('signin.forgot-password');
Route::post('/reset-password', [SigninController::class, 'resetPassword'])->name('signin.reset-password');

// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Logout
Route::post('/logout', function() {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Route untuk OTP dengan throttle
Route::prefix('api/otp')->group(function () {
    Route::post('send', [OtpController::class, 'send'])->middleware('throttle:6,1');
    Route::post('verify', [OtpController::class, 'verify'])->middleware('throttle:10,1');
    Route::get('check', [OtpController::class, 'check'])->middleware('throttle:10,1');
});