@extends('layouts.app')

@section('title', 'Lupa Password - RexbotX')

@section('hide_footer', true)

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center py-6 lg:py-16">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Form Container -->
        <div class="max-w-[400px] sm:max-w-xl mx-auto">
            <!-- Badge -->
            <div class="mb-6 sm:mb-8 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-200">
                    <span class="text-primary text-xl">🔑</span>
                    <span class="text-[13px] font-medium tracking-wide">Reset Kata Sandi</span>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 leading-[1.15]">Lupa Kata Sandi?</h1>
                <p class="text-[14px] sm:text-[15px] lg:text-lg text-base-content/70 leading-relaxed max-w-lg mx-auto">
                    Masukkan nomor telepon Anda untuk mereset kata sandi
                </p>
            </div>

            <!-- Form -->
            <div class="bg-base-200/50 rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8">
                <form id="forgotPasswordForm" class="space-y-3 sm:space-y-4">
                    @csrf
                    
                    <!-- No Telepon -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Nomor Telepon</span>
                        </label>
                        <div class="join w-full">
                            <select name="country_code" class="select select-bordered join-item w-[120px] bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]">
                                <option value="62">🇮🇩 +62</option>
                                <option value="60">🇲🇾 +60</option>
                                <option value="65">🇸🇬 +65</option>
                                <option value="66">🇹🇭 +66</option>
                                <option value="63">🇵🇭 +63</option>
                                <option value="673">🇧🇳 +673</option>
                                <option value="84">🇻🇳 +84</option>
                                <option value="855">🇰🇭 +855</option>
                                <option value="856">🇱🇦 +856</option>
                                <option value="95">🇲🇲 +95</option>
                            </select>
                            <input type="tel" 
                                name="phone_number" 
                                class="input input-bordered join-item flex-1 bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                placeholder="8xxxxxxxxx" 
                                pattern="[8-9][0-9]{7,11}"
                                title="Nomor harus diawali dengan 8 atau 9, panjang 8-12 digit"
                                required>
                        </div>
                        <label class="label !py-1 hidden error-phone_number">
                            <span class="label-text-alt text-error"></span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full text-[14px] font-medium h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]">
                        Kirim OTP
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-[13px] text-base-content/70 mt-4">
                        Ingat kata sandi? 
                        <a href="{{ route('signin') }}" class="text-primary hover:underline font-medium">Masuk di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal OTP -->
<dialog id="otpModal" class="modal">
    <div class="modal-box max-w-sm">
        <h3 class="font-bold text-lg mb-2">Verifikasi OTP</h3>
        <p class="text-sm text-base-content/70 mb-6">Masukkan kode OTP yang telah dikirim ke nomor WhatsApp Anda</p>
        
        <form id="otpForm" class="space-y-4">
            <!-- OTP Input -->
            <div class="form-control">
                <input type="text" 
                    name="otp" 
                    class="input input-bordered w-full text-center text-2xl tracking-[1em] font-medium bg-base-100" 
                    maxlength="6"
                    placeholder="000000"
                    pattern="[0-9]*"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                    required>
                <label class="label !py-1 hidden error-otp">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>

            <!-- Timer -->
            <div class="text-center text-sm">
                <span>Kirim ulang OTP dalam </span>
                <span id="otpTimer" class="font-medium">05:00</span>
            </div>

            <!-- Resend Button -->
            <button type="button" id="resendButton" class="btn btn-ghost btn-sm w-full" disabled>
                Kirim Ulang OTP
            </button>

            <!-- Verify Button -->
            <button type="submit" class="btn btn-primary w-full">
                Verifikasi
            </button>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Modal Reset Password -->
<dialog id="resetPasswordModal" class="modal">
    <div class="modal-box max-w-sm">
        <h3 class="font-bold text-lg mb-2">Reset Kata Sandi</h3>
        <p class="text-sm text-base-content/70 mb-6">Masukkan kata sandi baru untuk akun Anda</p>
        
        <form id="resetPasswordForm" class="space-y-4">
            <!-- Password -->
            <div class="form-control">
                <label class="label !py-1">
                    <span class="label-text font-medium">Kata Sandi Baru</span>
                </label>
                <div class="join w-full">
                    <input type="password" 
                        name="password" 
                        id="password" 
                        class="input input-bordered join-item w-full bg-base-100" 
                        required>
                    <button type="button" class="btn join-item bg-base-100 hover:bg-base-200" onclick="togglePassword('password', this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" id="eye-password" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" id="eye-off-password" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <label class="label !py-1 hidden error-password">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>

            <!-- Confirm Password -->
            <div class="form-control">
                <label class="label !py-1">
                    <span class="label-text font-medium">Konfirmasi Kata Sandi</span>
                </label>
                <div class="join w-full">
                    <input type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="input input-bordered join-item w-full bg-base-100" 
                        required>
                    <button type="button" class="btn join-item bg-base-100 hover:bg-base-200" onclick="togglePassword('password_confirmation', this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" id="eye-password_confirmation" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" id="eye-off-password_confirmation" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full">
                Reset Kata Sandi
            </button>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Script -->
<script>
function formatPhoneNumber(input) {
    let number = input.value.replace(/\D/g, '');
    if (number.startsWith('0')) {
        number = number.substring(1);
    } else if (number.startsWith('62')) {
        number = number.substring(2);
    }
    if (number.length > 0 && !number.startsWith('8')) {
        number = '8' + number.substring(1);
    }
    input.value = number;
}

function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const eyeIcon = document.getElementById('eye-' + inputId);
    const eyeOffIcon = document.getElementById('eye-off-' + inputId);
    
    if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.classList.add('hidden');
        eyeOffIcon.classList.remove('hidden');
    } else {
        input.type = 'password';
        eyeIcon.classList.remove('hidden');
        eyeOffIcon.classList.add('hidden');
    }
}

// Timer untuk OTP
let otpTimer;
let otpTimeLeft;

function startOtpTimer() {
    clearInterval(otpTimer);
    otpTimeLeft = 300; // 5 menit dalam detik
    const timerDisplay = document.getElementById('otpTimer');
    const resendButton = document.getElementById('resendButton');
    
    resendButton.disabled = true;
    
    otpTimer = setInterval(() => {
        const minutes = Math.floor(otpTimeLeft / 60);
        const seconds = otpTimeLeft % 60;
        
        timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        
        if (otpTimeLeft <= 0) {
            clearInterval(otpTimer);
            resendButton.disabled = false;
            timerDisplay.textContent = '00:00';
        }
        
        otpTimeLeft--;
    }, 1000);
}

// Handle form submission
document.getElementById('forgotPasswordForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const phone_number = formData.get('country_code') + formData.get('phone_number');
    
    try {
        // Kirim OTP
        const response = await fetch('/api/otp/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: phone_number,
                type: 'reset_password'
            })
        });

        const result = await response.json();
        
        if (!response.ok) {
            const errorElement = document.querySelector('.error-phone_number');
            errorElement.classList.remove('hidden');
            errorElement.querySelector('span').textContent = result.message;
            return;
        }
        
        // Simpan nomor telepon di session storage
        sessionStorage.setItem('reset_password_phone', phone_number);
        
        // Show OTP modal
        document.getElementById('otpModal').showModal();
        startOtpTimer();
        
    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan coba lagi.');
    }
});

// Handle OTP form submission
document.getElementById('otpForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const phone_number = sessionStorage.getItem('reset_password_phone');
    
    try {
        // Verifikasi OTP
        const response = await fetch('/api/otp/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: phone_number,
                otp: formData.get('otp'),
                type: 'reset_password'
            })
        });

        const result = await response.json();
        
        if (!response.ok) {
            const errorElement = document.querySelector('.error-otp');
            errorElement.classList.remove('hidden');
            errorElement.querySelector('span').textContent = result.message;
            return;
        }

        // Tutup modal OTP
        document.getElementById('otpModal').close();
        
        // Tampilkan modal reset password
        document.getElementById('resetPasswordModal').showModal();
        
    } catch (error) {
        console.error('Error:', error);
        const errorElement = document.querySelector('.error-otp');
        errorElement.classList.remove('hidden');
        errorElement.querySelector('span').textContent = 'Terjadi kesalahan. Silakan coba lagi.';
    }
});

// Handle reset password form submission
document.getElementById('resetPasswordForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const phone_number = sessionStorage.getItem('reset_password_phone');
    
    try {
        // Reset password
        const response = await fetch('{{ route("signin.reset-password") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: phone_number,
                password: formData.get('password'),
                password_confirmation: formData.get('password_confirmation')
            })
        });

        const result = await response.json();
        
        if (!response.ok) {
            const errorElement = document.querySelector('.error-password');
            errorElement.classList.remove('hidden');
            errorElement.querySelector('span').textContent = result.message;
            return;
        }

        // Hapus data dari session storage
        sessionStorage.removeItem('reset_password_phone');
        
        // Redirect ke halaman login
        window.location.href = result.redirect;
        
    } catch (error) {
        console.error('Error:', error);
        const errorElement = document.querySelector('.error-password');
        errorElement.classList.remove('hidden');
        errorElement.querySelector('span').textContent = 'Terjadi kesalahan. Silakan coba lagi.';
    }
});

// Handle resend OTP
document.getElementById('resendButton').addEventListener('click', async function() {
    const phone_number = sessionStorage.getItem('reset_password_phone');
    
    try {
        const response = await fetch('/api/otp/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: phone_number,
                type: 'reset_password'
            })
        });
        
        const result = await response.json();
        
        if (response.ok) {
            startOtpTimer();
            alert('OTP berhasil dikirim ulang');
        } else {
            alert(result.message || 'Gagal mengirim ulang OTP');
        }
        
    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan coba lagi.');
    }
});

// Format OTP input
document.querySelector('input[name="otp"]').addEventListener('input', function(e) {
    this.value = this.value.replace(/\D/g, '').slice(0, 6);
});

// Format phone number input
document.querySelector('input[name="phone_number"]').addEventListener('input', function(e) {
    formatPhoneNumber(this);
});
</script>
@endsection 