@extends('layouts.app')

@section('title', 'Masuk - RexbotX')

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
                    <span class="text-[13px] font-medium tracking-wide">Selamat Datang Kembali</span>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3 leading-[1.15]">Masuk ke Akun</h1>
                <p class="text-[14px] sm:text-[15px] lg:text-lg text-base-content/70 leading-relaxed max-w-lg mx-auto">
                    Masuk ke akun RexbotX Anda dan nikmati fitur WhatsApp yang lebih powerful
                </p>
            </div>

            <!-- Form -->
            <div class="bg-base-200/50 rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8">
                <form action="{{ route('signin.authenticate') }}" method="POST" class="space-y-3 sm:space-y-4" id="signinForm">
                    @csrf
                    
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
                                required>
                        </div>
                        @error('phone_number')
                            <label class="label !py-1">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
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
                                autocomplete="current-password">
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
                        @error('password')
                            <label class="label !py-1">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-[13px] sm:text-[14px]">
                        <label class="label cursor-pointer justify-start gap-2 p-0">
                            <input type="checkbox" name="remember" class="checkbox checkbox-primary checkbox-sm sm:checkbox-md">
                            <span class="label-text">Ingat saya</span>
                        </label>
                        <a href="{{ route('signin.forgot-password') }}" class="text-primary hover:underline">Lupa kata sandi?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-full text-[14px] font-medium h-10 sm:h-11 min-h-[2.5rem] sm:min-h-[2.75rem]">
                        Masuk Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Register Link -->
                    <p class="text-center text-[13px] text-base-content/70 mt-4">
                        Belum punya akun? 
                        <a href="{{ route('signup') }}" class="text-primary hover:underline font-medium">Daftar di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk validasi dan format -->
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
</script>
@endsection
