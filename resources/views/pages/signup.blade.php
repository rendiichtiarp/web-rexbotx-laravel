@extends('layouts.app')

@section('title', 'Daftar - RexbotX')

@section('hide_footer', true)

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center py-6 lg:py-16">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Form Container -->
        <div class="max-w-[400px] sm:max-w-xl mx-auto">
            <!-- Badge -->
            <div class="mb-6 sm:mb-8 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-200">
                    <span class="text-primary text-xl">👋</span>
                    <span class="text-[13px] font-medium tracking-wide">Selamat Datang di RexbotX</span>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 leading-[1.15]">Daftar Akun</h1>
                <p class="text-[14px] sm:text-[15px] lg:text-lg text-base-content/70 leading-relaxed max-w-lg mx-auto">
                    Bergabung dengan RexbotX dan nikmati fitur WhatsApp yang lebih powerful
                </p>
            </div>

            <!-- Form -->
            <div class="bg-base-200/50 rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8">
                <form id="signupForm" class="space-y-3 sm:space-y-4">
                    @csrf
                    
                    <!-- Nama Depan & Belakang -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="form-control">
                            <label class="label !py-1">
                                <span class="label-text font-medium">Nama Depan</span>
                            </label>
                            <input type="text" 
                                name="first_name" 
                                class="input input-bordered w-full capitalize bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                value="{{ old('first_name') }}" 
                                placeholder="Rendi" 
                                required 
                                oninput="capitalizeFirstLetter(this); updateFullName();">
                            <label class="label !py-1 hidden error-first_name">
                                <span class="label-text-alt text-error"></span>
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label !py-1">
                                <span class="label-text font-medium">Nama Belakang</span>
                            </label>
                            <input type="text" 
                                name="last_name" 
                                class="input input-bordered w-full capitalize bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                value="{{ old('last_name') }}" 
                                placeholder="Ichtiar Prasetyo" 
                                required 
                                oninput="capitalizeFirstLetter(this); updateFullName();">
                            <label class="label !py-1 hidden error-last_name">
                                <span class="label-text-alt text-error"></span>
                            </label>
                        </div>
                    </div>

                    <!-- Hidden Full Name -->
                    <input type="hidden" name="name" id="fullName" value="{{ old('name') }}">

                    <!-- Username -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Username</span>
                        </label>
                        <div class="join w-full">
                            <span class="join-item flex items-center px-4 bg-base-100 text-base-content/70 border border-base-300 border-r-0 h-10 sm:h-11">@</span>
                            <input type="text" 
                                name="username" 
                                class="input input-bordered join-item w-full lowercase bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                value="{{ old('username') }}" 
                                placeholder="rendi123"
                                pattern="^[a-z0-9_]{5,20}$"
                                title="Username hanya boleh mengandung huruf kecil, angka, dan underscore. Panjang 5-20 karakter."
                                required 
                                oninput="formatUsername(this)">
                        </div>
                        <label class="label !py-1 hidden error-username">
                            <span class="label-text-alt text-error"></span>
                        </label>
                    </div>

                    <!-- No Telepon -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Nomor Telepon</span>
                        </label>
                        <div class="join w-full">
                            <select name="country_code" class="select select-bordered join-item w-[120px] bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" onchange="updatePhoneNumber()">
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
                                value="{{ old('phone_number') }}" 
                                required 
                                oninput="formatPhoneNumber(this)">
                        </div>
                        <label class="label !py-1 hidden error-phone_number">
                            <span class="label-text-alt text-error"></span>
                        </label>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Tanggal Lahir</span>
                        </label>
                        <input type="date" 
                            name="birthdate" 
                            class="input input-bordered w-full bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                            value="{{ old('birthdate') }}" 
                            required>
                        <label class="label !py-1 hidden error-birthdate">
                            <span class="label-text-alt text-error"></span>
                        </label>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Kata Sandi</span>
                        </label>
                        <div class="join w-full">
                            <input type="password" 
                                name="password" 
                                id="password" 
                                class="input input-bordered join-item w-full bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                required
                                autocomplete="new-password">
                            <button type="button" class="btn join-item bg-base-100 hover:bg-base-200 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" onclick="togglePassword('password', this)">
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

                    <!-- Konfirmasi Kata Sandi -->
                    <div class="form-control">
                        <label class="label !py-1">
                            <span class="label-text font-medium">Konfirmasi Kata Sandi</span>
                        </label>
                        <div class="join w-full">
                            <input type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                class="input input-bordered join-item w-full bg-base-100 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" 
                                required
                                autocomplete="new-password">
                            <button type="button" class="btn join-item bg-base-100 hover:bg-base-200 h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" onclick="togglePassword('password_confirmation', this)">
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

                    <!-- Syarat dan Ketentuan -->
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" name="terms" class="checkbox checkbox-primary checkbox-sm sm:checkbox-md" required>
                            <span class="label-text text-[13px] sm:text-[14px]">Saya menyetujui <a href="#" class="text-primary hover:underline">syarat</a> dan <a href="#" class="text-primary hover:underline">ketentuan</a> yang berlaku</span>
                        </label>
                        <label class="label !py-1 hidden error-terms">
                            <span class="label-text-alt text-error"></span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitButton" class="btn btn-primary w-full text-[14px] font-medium h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]" disabled>
                        Daftar Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-[13px] text-base-content/70 mt-4">
                        Sudah punya akun? 
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

<!-- Script untuk validasi dan format -->
<script>
function capitalizeFirstLetter(input) {
    let words = input.value.toLowerCase().split(' ');
    words = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));
    input.value = words.join(' ');
}

function updateFullName() {
    const firstName = document.querySelector('input[name="first_name"]').value;
    const lastName = document.querySelector('input[name="last_name"]').value;
    document.getElementById('fullName').value = (firstName + ' ' + lastName).trim();
}

function formatUsername(input) {
    let value = input.value.toLowerCase().replace(/[^a-z0-9_]/g, '');
    if (value.length > 20) {
        value = value.substring(0, 20);
    }
    input.value = value;
}

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

// Fungsi untuk validasi form
function validateForm() {
    const form = document.getElementById('signupForm');
    const submitButton = document.getElementById('submitButton');
    
    // Ambil semua input yang required
    const firstName = form.querySelector('input[name="first_name"]').value.trim();
    const lastName = form.querySelector('input[name="last_name"]').value.trim();
    const username = form.querySelector('input[name="username"]').value.trim();
    const phoneNumber = form.querySelector('input[name="phone_number"]').value.trim();
    const birthdate = form.querySelector('input[name="birthdate"]').value.trim();
    const password = form.querySelector('input[name="password"]').value;
    const passwordConfirmation = form.querySelector('input[name="password_confirmation"]').value;
    const terms = form.querySelector('input[name="terms"]').checked;
    
    // Validasi panjang username
    const isUsernameValid = username.length >= 5 && username.length <= 20 && /^[a-z0-9_]+$/.test(username);
    
    // Validasi nomor telepon
    const isPhoneValid = /^[8-9][0-9]{7,11}$/.test(phoneNumber);
    
    // Validasi password
    const isPasswordValid = password.length >= 8 && 
                          /[A-Z]/.test(password) && 
                          /[a-z]/.test(password) && 
                          /[0-9]/.test(password) && 
                          /[@$!%*?&#]/.test(password) && 
                          password === passwordConfirmation;
    
    // Cek semua kondisi
    const isFormValid = firstName && lastName && isUsernameValid && 
                       isPhoneValid && birthdate && isPasswordValid && terms;
    
    // Update status tombol
    submitButton.disabled = !isFormValid;
    
    // Update style tombol
    if (isFormValid) {
        submitButton.classList.remove('btn-disabled');
        submitButton.classList.add('btn-primary');
    } else {
        submitButton.classList.add('btn-disabled');
        submitButton.classList.remove('btn-primary');
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
document.getElementById('signupForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    
    try {
        // Kirim data pendaftaran
        const response = await fetch('{{ route("signup.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });
        
        const result = await response.json();
        
        if (!response.ok) {
            // Reset error messages
            document.querySelectorAll('[class*="error-"]').forEach(el => el.classList.add('hidden'));
            
            // Show error messages
            if (result.errors) {
                Object.keys(result.errors).forEach(key => {
                    const errorElement = document.querySelector(`.error-${key}`);
                    if (errorElement) {
                        errorElement.classList.remove('hidden');
                        errorElement.querySelector('span').textContent = result.errors[key][0];
                    }
                });
            }
            return;
        }

        // Kirim OTP melalui API
        const otpResponse = await fetch('/api/otp/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: result.phone_number,
                type: 'signup'
            })
        });

        const otpResult = await otpResponse.json();
        
        if (!otpResponse.ok) {
            alert(otpResult.message || 'Gagal mengirim OTP');
            return;
        }
        
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
    const otp = formData.get('otp');
    
    try {
        // Verifikasi OTP langsung ke endpoint signup
        const signupResponse = await fetch('{{ route("signup.verify-otp") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ otp: otp })
        });

        const signupResult = await signupResponse.json();

        if (!signupResponse.ok) {
            const errorElement = document.querySelector('.error-otp');
            errorElement.classList.remove('hidden');
            errorElement.querySelector('span').textContent = signupResult.message || 'Kode OTP tidak valid';
            return;
        }

        // Redirect on success
        window.location.href = signupResult.redirect;
        
    } catch (error) {
        console.error('Error:', error);
        const errorElement = document.querySelector('.error-otp');
        errorElement.classList.remove('hidden');
        errorElement.querySelector('span').textContent = 'Terjadi kesalahan. Silakan coba lagi.';
    }
});

// Handle resend OTP
document.getElementById('resendButton').addEventListener('click', async function() {
    try {
        const response = await fetch('/api/otp/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                phone_number: document.querySelector('input[name="country_code"]').value + document.querySelector('input[name="phone_number"]').value,
                type: 'signup'
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

// Tambahkan event listener untuk semua input
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupForm');
    const inputs = form.querySelectorAll('input');
    
    inputs.forEach(input => {
        input.addEventListener('input', validateForm);
        input.addEventListener('change', validateForm);
    });
    
    // Validasi awal
    validateForm();
});
</script>
@endsection
