<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RexbotX - Bot WhatsApp Terbaik</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <!-- Prevent Flash of Wrong Theme (FOWT) -->
    <script>
        // Immediately set the theme before the page loads
        const theme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-theme', theme);
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Outfit dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        /* Kustomisasi font weight */
        .font-light {
            font-weight: 300;
        }
        .font-normal {
            font-weight: 400;
        }
        .font-medium {
            font-weight: 500;
        }
        .font-semibold {
            font-weight: 600;
        }
        .font-bold {
            font-weight: 700;
        }

        /* Animasi Chat */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        .chat-message {
            opacity: 0;
        }

        .chat-message.animate {
            animation: slideIn 0.3s ease forwards;
        }

        .chat-message:nth-child(1).animate {
            animation-delay: 0.2s;
        }

        .chat-message:nth-child(2).animate {
            animation-delay: 1s;
        }

        .chat-message:nth-child(3).animate {
            animation-delay: 1.8s;
        }

        .chat-message:nth-child(4).animate {
            animation-delay: 2.6s;
        }

        .typing-indicator {
            display: inline-flex;
            align-items: center;
            gap: 2px;
        }

        .typing-dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: currentColor;
            opacity: 0.7;
        }

        .typing-dot:nth-child(1) { animation: typing-dot 1s infinite; }
        .typing-dot:nth-child(2) { animation: typing-dot 1s infinite 0.2s; }
        .typing-dot:nth-child(3) { animation: typing-dot 1s infinite 0.4s; }

        @keyframes typing-dot {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }

        .gradient-text {
            background: linear-gradient(45deg, hsl(var(--primary)), hsl(var(--secondary)));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .blur-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
        }

        .collapse-arrow .collapse-title:after {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
        }

        .collapse-arrow input[type="checkbox"]:checked ~ .collapse-title:after {
            transform: translateY(-50%) rotate(-180deg);
        }
        
        @media (min-width: 768px) {
            .collapse-arrow .collapse-title:after {
                right: 1.5rem;
            }
        }

        /* Animasi untuk konten */
        .collapse-content {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-base-100 min-h-screen relative overflow-x-hidden">
    <!-- Drawer wrapper -->
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        
        <!-- Page content -->
        <div class="drawer-content">
            <!-- Include Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
            <div class="pt-16">
                <!-- Hero Section -->
                <div class="min-h-[calc(100vh-4rem)] flex items-center py-12 lg:py-0">
                    <div class="container mx-auto px-4">
                        <!-- Grid Layout -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                            <!-- Hero Content -->
                            <div class="text-center lg:text-left">
                                <div class="grid gap-6 max-w-2xl mx-auto lg:mx-0">
                                    <!-- Badge -->
                                    <div class="justify-self-center lg:justify-self-start">
                                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-200">
                                            <span class="text-primary text-xl">🤖</span>
                                            <span class="text-[13px] font-medium tracking-wide">Bot WhatsApp Terbaik</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Heading -->
                                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-[1.15]">
                                        <span class="font-medium">Hidup mudah dengan bantuan</span>
                                        <span class="text-primary block mt-3 font-bold">RexbotX</span>
                                    </h1>
                                    
                                    <!-- Description -->
                                    <p class="text-[15px] sm:text-lg text-base-content/70 leading-relaxed max-w-xl mx-auto lg:mx-0 font-normal">
                                        RexbotX sudah digunakan oleh lebih dari 2000 pengguna,
                                        membantu Anda untuk melakukan perintah yang Anda inginkan
                                        dengan cepat dan mudah.
                                    </p>
                                    
                                    <!-- Rating -->
                                    <div class="justify-self-center lg:justify-self-start">
                                        <div class="flex items-center gap-4 p-4 bg-base-200 rounded-xl">
                                            <div class="rating rating-sm">
                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-warning" checked />
                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-warning" checked />
                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-warning" checked />
                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-warning" checked />
                                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-warning" checked />
                                            </div>
                                            <div>
                                                <span class="font-semibold text-xl">4.6</span>
                                                <span class="text-[13px] text-base-content/60 ml-1.5 font-normal">(65 penilaian)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CTA Buttons -->
                                    <div class="justify-self-center lg:justify-self-start">
                                        <div class="flex flex-row gap-3">
                                            <a href="https://whatsapp.com/channel/0029Vb1aqIYCMY0EmiUODK00" class="btn btn-primary" target="_blank">
                                                <span class="text-[14px] font-medium">Saluran RexbotX</span>
                                            </a>
                                            <a href="https://wa.me/6281585030507?text=.menu" class="btn btn-outline" target="_blank">
                                                <span class="text-[14px] font-medium">Coba RexbotX</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Chat Preview Column -->
                            <div class="hidden lg:grid gap-8">
                                <!-- Chat Preview -->
                                <div class="bg-base-200 rounded-2xl p-6">
                                    <!-- Chat Header -->
                                    <div class="flex items-center gap-4 mb-6">
                                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center overflow-hidden">
                                            <img src="/logo-color.webp" alt="RexbotX Logo" class="w-full h-full object-contain rounded-full">
                                        </div>
                                        <div>
                                            <div class="font-semibold text-lg tracking-wide">RexbotX</div>
                                            <div class="flex items-center gap-2">
                                                <span class="w-2 h-2 bg-success rounded-full"></span>
                                                <span class="text-[13px] text-base-content/60 font-normal">Online</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Chat Messages -->
                                    <div class="space-y-4" id="chat-container">
                                        <div class="chat chat-end chat-message">
                                            <div class="chat-bubble bg-base-300 text-base-content text-[14px]">.ai Siapa nama kamu?</div>
                                        </div>
                                        <div class="chat chat-start chat-message">
                                            <div class="chat-bubble bg-primary text-primary-content text-[14px] relative">
                                                <span class="typing-animation">Hai! Saya RexbotX, saya dibuat oleh Rendichtiar!</span>
                                            </div>
                                        </div>
                                        <div class="chat chat-end chat-message">
                                            <div class="chat-bubble bg-base-300 text-base-content text-[14px]">.brat RexbotX terbaik le 😜😜</div>
                                        </div>
                                        <div class="chat chat-start chat-message">
                                            <div class="chat-bubble bg-primary text-primary-content p-0 overflow-hidden">
                                                <img src="/rexbotx-terbaik-le.webp" alt="RexbotX Terbaik" class="w-full h-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <section class="py-12 md:py-24 bg-base-100">
                    <div class="container mx-auto px-4">
                        <!-- Section Header -->
                        <div class="text-center mb-8 md:mb-16">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                                <span class="text-primary text-xs md:text-[13px] font-medium">Fitur Lengkap</span>
                            </div>
                            <h2 class="text-2xl md:text-4xl font-bold mb-3 md:mb-4">
                                Jelajahi Kemampuan <span class="text-primary">RexbotX</span>
                            </h2>
                        </div>

                        <!-- Features Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                            <!-- AI Chat & Image -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">AI Chat & Image</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Berbagai model AI untuk chat dan generate gambar</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">ChatGPT, Gemini, Claude, Bard, dll</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">DALL-E, Stable Diffusion, Dream AI</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Image editing & enhancement</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">AI Canvas & Image to Prompt</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Downloader -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">Downloader</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Download media dari berbagai platform</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">YouTube video & audio</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Instagram post & stories</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">TikTok video no watermark</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Twitter, Facebook, Threads</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Spotify, SoundCloud, Douyin</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Game & Fun -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">Game & Fun</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Game seru dan fitur hiburan</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">28+ game quiz & tebak-tebakan</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Random anime & waifu images</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Kuis Islami & kemerdekaan</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Ramalan & cerita lucu</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">SimSimi chat bot</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Group Management -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">Group Management</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Kelola grup WhatsApp dengan mudah</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Add, kick & link grup</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Promote & demote admin</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Set name, desc & photo</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Hidetag & tagall member</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Mute & unmute chat</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Sticker & Maker -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">Sticker & Maker</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Buat dan edit stiker WhatsApp</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Stiker gambar & animasi</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Stiker dengan watermark</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Emoji mix & text sticker</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Quote & meme maker</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Blue Archive logo maker</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tools & Search -->
                            <div class="group p-5 md:p-6 rounded-xl border border-base-300 hover:border-primary transition-all duration-300">
                                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3 group-hover:text-primary transition-colors duration-300">Tools & Search</h3>
                                <p class="text-sm md:text-base text-base-content/70 mb-4 md:mb-6">Berbagai alat dan pencarian</p>
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">25+ platform search engine</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Translate & text to speech</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Al-Quran & Alkitab digital</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Weather & jadwal sholat</span>
                                    </li>
                                    <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                        <div class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-primary"></div>
                                        <span class="group-hover:translate-x-1 transition-transform duration-200">Image enhance & colorize</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Pricing Section -->
                <section class="py-12 md:py-24 bg-base-100">
                    <div class="container mx-auto px-4">
                        <!-- Section Header -->
                        <div class="text-center mb-8 md:mb-16">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                                <span class="text-primary text-xs md:text-[13px] font-medium">Harga Terjangkau</span>
                            </div>
                            <h2 class="text-2xl md:text-4xl font-bold">
                                Pilih Paket <span class="text-primary">Anda</span>
                            </h2>
                        </div>

                        <!-- Pricing Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 max-w-6xl mx-auto">
                            <!-- Free Plan -->
                            <div class="group relative rounded-xl border border-base-300 p-6 md:p-8 hover:border-primary transition-all duration-300 flex flex-col h-full">
                                <div class="flex-grow">
                                    <div class="space-y-3 md:space-y-4">
                                        <h3 class="text-xl md:text-2xl font-bold">Gratis</h3>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-2xl md:text-3xl font-bold">Rp 0</span>
                                        </div>
                                        <p class="text-sm md:text-base text-base-content/70">Akses fitur dasar RexbotX</p>
                                    </div>

                                    <div class="mt-6 md:mt-8 space-y-4">
                                        <ul class="space-y-2 md:space-y-3">
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Delay 6-10 detik</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Cooldown 25 detik</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Fitur terbatas</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Harus bergabung ke Komunitas</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-6 md:mt-8">
                                    <a href="https://whatsapp.com/channel/0029Vb1aqIYCMY0EmiUODK00" class="btn btn-outline btn-block btn-sm md:btn-md" target="_blank">
                                        Saluran RexbotX
                                    </a>
                                </div>
                            </div>

                            <!-- Premium Plan -->
                            <div class="group relative rounded-xl border-2 border-primary bg-base-100 p-6 md:p-8 flex flex-col h-full">
                                <div class="absolute -top-3 md:-top-5 right-0">
                                    <span class="badge badge-primary badge-sm md:badge-md">Terpopuler</span>
                                </div>

                                <div class="flex-grow">
                                    <div class="space-y-3 md:space-y-4">
                                        <h3 class="text-xl md:text-2xl font-bold">Premium</h3>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-2xl md:text-3xl font-bold">Rp 5.000</span>
                                            <span class="text-sm md:text-base text-base-content/70">per bulan</span>
                                        </div>
                                        <p class="text-sm md:text-base text-base-content/70">Fitur lengkap tanpa batasan</p>
                                    </div>

                                    <div class="mt-6 md:mt-8 space-y-4">
                                        <ul class="space-y-2 md:space-y-3">
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Tanpa delay</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Tanpa cooldown</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Prioritas respon</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Akses fitur premium</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Dukungan premium 24/7</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Tidak harus bergabung ke Komunitas</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-6 md:mt-8">
                                    <a href="https://wa.me/6281284900651" class="btn btn-primary btn-block btn-sm md:btn-md" target="_blank">
                                        Hubungi Admin
                                    </a>
                                </div>
                            </div>

                            <!-- Sewa Plan -->
                            <div class="group relative rounded-xl border border-base-300 p-6 md:p-8 hover:border-primary transition-all duration-300 flex flex-col h-full">
                                <div class="flex-grow">
                                    <div class="space-y-3 md:space-y-4">
                                        <h3 class="text-xl md:text-2xl font-bold">Sewa</h3>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-2xl md:text-3xl font-bold">Rp 30.000</span>
                                        </div>
                                        <p class="text-sm md:text-base text-base-content/70">Bot pribadi untuk Anda</p>
                                    </div>

                                    <div class="mt-6 md:mt-8 space-y-4">
                                        <ul class="space-y-2 md:space-y-3">
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Menggunakan nomor WhatsApp Anda</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Free hosting</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Setup & instalasi</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Maintenance gratis</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Dukungan prioritas 24/7</span>
                                            </li>
                                            <li class="flex items-center gap-2 md:gap-3 text-sm md:text-[15px]">
                                                <svg class="w-4 h-4 md:w-5 md:h-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Update fitur otomatis</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-6 md:mt-8">
                                    <a href="https://wa.me/6281284900651" class="btn btn-outline btn-block btn-sm md:btn-md" target="_blank">
                                        Hubungi Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimonial Section -->
                <section class="py-12 md:py-24 bg-base-100 overflow-hidden">
                    <div class="container mx-auto px-4">
                        <!-- Section Header -->
                        <div class="text-center mb-8 md:mb-16">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                                <span class="text-primary text-xs md:text-[13px] font-medium">Testimoni Pengguna</span>
                            </div>
                            <h2 class="text-2xl md:text-4xl font-bold">
                                Apa Kata <span class="text-primary">Mereka</span>
                            </h2>
                            <p class="text-sm md:text-base text-base-content/70 mt-3">
                                Ulasan dari pengguna setia RexbotX
                            </p>
                        </div>

                        <!-- Testimonials Slider -->
                        <div class="relative">
                            <div class="testimonial-container overflow-x-auto pb-4 md:pb-0 hide-scrollbar">
                                <div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 max-w-6xl mx-auto">
                                    <!-- Testimonial Cards - Original Set -->
                                    <div class="w-[300px] md:w-auto flex-shrink-0 p-5 md:p-6 rounded-xl border border-base-300">
                                        <div class="flex gap-1 mb-3">
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                        <p class="text-sm md:text-[15px] mb-4">"bagusss sukakk lopyu buat atmin yang udah buat bot 👆💕"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                                <span class="text-primary font-medium">S</span>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium">sasaa</h4>
                                                <p class="text-xs text-base-content/60">1 suka</p>
                                            </div>
                                            <div class="ml-auto text-xs text-base-content/60">
                                                1 Mei 2025
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-[300px] md:w-auto flex-shrink-0 p-5 md:p-6 rounded-xl border border-base-300">
                                        <div class="flex gap-1 mb-3">
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                        <p class="text-sm md:text-[15px] mb-4">"RexBotX ailoaf rekbot miaw miaw ❤️"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                                <span class="text-primary font-medium">C</span>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium">Challasa</h4>
                                                <p class="text-xs text-base-content/60">1 suka</p>
                                            </div>
                                            <div class="ml-auto text-xs text-base-content/60">
                                                5 Mei 2025
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-[300px] md:w-auto flex-shrink-0 p-5 md:p-6 rounded-xl border border-base-300">
                                        <div class="flex gap-1 mb-3">
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                        <p class="text-sm md:text-[15px] mb-4">"RexBotX"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                                <span class="text-primary font-medium">A</span>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium">Ashley</h4>
                                                <p class="text-xs text-base-content/60">1 suka</p>
                                            </div>
                                            <div class="ml-auto text-xs text-base-content/60">
                                                5 Mei 2025
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Duplicate Cards for Infinite Scroll Effect -->
                                    <!-- Copy the same 3 testimonial cards here -->
                                </div>
                            </div>

                            <!-- Navigation Buttons - Only visible on desktop -->
                            <div class="hidden md:flex justify-center gap-2 mt-8">
                                <button class="btn btn-circle btn-sm btn-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button class="btn btn-circle btn-sm btn-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FAQ Section -->
    <section class="py-12 md:py-24 bg-base-100">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-8 md:mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                    <span class="text-primary text-xs md:text-[13px] font-medium">Bantuan</span>
                </div>
                <h2 class="text-2xl md:text-4xl font-bold">
                    Pertanyaan <span class="text-primary">Umum</span>
                </h2>
                <p class="text-sm md:text-base text-base-content/70 mt-3">
                    Temukan jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>

            <!-- FAQ List -->
            <div class="max-w-3xl mx-auto space-y-2 md:space-y-4">
                <!-- FAQ Item 1 -->
                <div class="collapse collapse-arrow border border-base-300 rounded-lg md:rounded-xl bg-base-100">
                    <input type="checkbox" /> 
                    <div class="collapse-title text-sm md:text-base font-medium p-4 md:p-6 flex items-center relative">
                        Apa itu RexbotX?
                    </div>
                    <div class="collapse-content px-4 md:px-6 pb-4">
                        <p class="text-xs md:text-sm text-base-content/70">
                            RexbotX adalah bot WhatsApp yang dilengkapi dengan berbagai fitur canggih. Bot ini dapat membantu Anda dalam berbagai hal seperti download video/audio, membuat stiker, konversi media, dan banyak lagi.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="collapse collapse-arrow border border-base-300 rounded-lg md:rounded-xl bg-base-100">
                    <input type="checkbox" />
                    <div class="collapse-title text-sm md:text-base font-medium p-4 md:p-6 flex items-center relative">
                        Bagaimana cara menggunakan RexbotX?
                    </div>
                    <div class="collapse-content px-4 md:px-6 pb-4">
                        <p class="text-xs md:text-sm text-base-content/70">
                            1. Tambahkan nomor RexbotX ke WhatsApp Anda<br>
                            2. Kirim pesan ".menu" untuk melihat daftar perintah<br>
                            3. Pilih fitur yang ingin digunakan<br>
                            4. Ikuti instruksi yang diberikan oleh bot
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="collapse collapse-arrow border border-base-300 rounded-lg md:rounded-xl bg-base-100">
                    <input type="checkbox" />
                    <div class="collapse-title text-sm md:text-base font-medium p-4 md:p-6 flex items-center relative">
                        Apakah RexbotX benar-benar gratis?
                    </div>
                    <div class="collapse-content px-4 md:px-6 pb-4">
                        <p class="text-xs md:text-sm text-base-content/70">
                            Ya, RexbotX memiliki versi gratis yang dapat Anda gunakan. Namun, terdapat beberapa batasan seperti delay 6-10 detik dan cooldown 25 detik. Untuk penggunaan tanpa batasan, Anda dapat berlangganan versi Premium.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="collapse collapse-arrow border border-base-300 rounded-lg md:rounded-xl bg-base-100">
                    <input type="checkbox" />
                    <div class="collapse-title text-sm md:text-base font-medium p-4 md:p-6 flex items-center relative">
                        Apa perbedaan versi Gratis dan Premium?
                    </div>
                    <div class="collapse-content px-4 md:px-6 pb-4">
                        <p class="text-xs md:text-sm text-base-content/70">
                            Versi Premium menawarkan:<br>
                            - Tanpa delay<br>
                            - Tanpa cooldown<br>
                            - Prioritas respon<br>
                            - Akses fitur premium<br>
                            - Dukungan premium 24/7<br>
                            - Tidak harus bergabung ke Komunitas
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="collapse collapse-arrow border border-base-300 rounded-lg md:rounded-xl bg-base-100">
                    <input type="checkbox" />
                    <div class="collapse-title text-sm md:text-base font-medium p-4 md:p-6 flex items-center relative">
                        Bagaimana dengan keamanan data?
                    </div>
                    <div class="collapse-content px-4 md:px-6 pb-4">
                        <p class="text-xs md:text-sm text-base-content/70">
                            Kami memprioritaskan keamanan data pengguna. RexbotX tidak menyimpan pesan, media, atau data pribadi pengguna. Semua interaksi bersifat end-to-end encrypted melalui WhatsApp.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

                <style>
                    /* Hide scrollbar but keep functionality */
                    .hide-scrollbar {
                        -ms-overflow-style: none;  /* IE and Edge */
                        scrollbar-width: none;  /* Firefox */
                    }
                    .hide-scrollbar::-webkit-scrollbar {
                        display: none;  /* Chrome, Safari and Opera */
                    }

                    /* Add smooth scroll behavior */
                    .testimonial-container {
                        scroll-behavior: smooth;
                        -webkit-overflow-scrolling: touch;
                    }

                    @media (max-width: 768px) {
                        .testimonial-container {
                            scroll-snap-type: x mandatory;
                            scroll-padding: 1rem;
                        }
                        .testimonial-container > div > div {
                            scroll-snap-align: start;
                        }
                    }
                </style>

                <script>
                    // Auto scroll for mobile
                    document.addEventListener('DOMContentLoaded', function() {
                        const container = document.querySelector('.testimonial-container');
                        if (window.innerWidth < 768) { // Only for mobile
                            let scrollInterval;
                            
                            function startAutoScroll() {
                                scrollInterval = setInterval(() => {
                                    if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                                        container.scrollLeft = 0;
                                    } else {
                                        container.scrollLeft += 300; // Width of one card
                                    }
                                }, 3000); // Scroll every 3 seconds
                            }

                            function stopAutoScroll() {
                                clearInterval(scrollInterval);
                            }

                            // Start auto scroll
                            startAutoScroll();

                            // Pause on touch/interaction
                            container.addEventListener('touchstart', stopAutoScroll);
                            container.addEventListener('touchend', startAutoScroll);
                        }
                    });
                </script>
            </div>
        </div>

        <!-- Include Sidebar -->
        @include('components.sidebar')
    </div>

    <!-- Scroll to top button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
            class="fixed bottom-4 right-4 btn btn-circle btn-primary btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <!-- Script untuk animasi chat -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan kelas animate ke semua chat message saat halaman dimuat
            const messages = document.querySelectorAll('.chat-message');
            messages.forEach(msg => {
                msg.classList.add('animate');
            });
        });
    </script>

    <!-- Include Footer -->
    @include('components.footer')
</body>
</html>