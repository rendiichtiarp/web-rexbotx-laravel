<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'RexbotX') }} - @yield('title', 'Bot WhatsApp Terbaik')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Typing animation */
        .typing-animation {
            display: inline-block;
            position: relative;
        }
        .typing-animation::after {
            content: '|';
            position: absolute;
            right: -4px;
            width: 1px;
            animation: blink 1s step-start infinite;
        }
        @keyframes blink {
            50% { opacity: 0; }
        }

        /* Chat message animation */
        .chat-message {
            opacity: 0;
            transform: translateY(10px);
        }
        .chat-message.animate {
            animation: slideIn 0.3s ease forwards;
        }
        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scroll to top button */
        .scroll-to-top {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }
    </style>

    <!-- Scripts -->
    @stack('scripts')
</head>
<body class="bg-base-100 min-h-screen">
    <!-- Drawer Structure -->
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        
        <!-- Drawer Content -->
        <div class="drawer-content flex flex-col min-h-screen">
            <!-- Include Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
            <main class="flex-grow">
                @yield('content')
            </main>

            <!-- Include Footer -->
            @if(!View::hasSection('hide_footer'))
                @include('components.footer')
            @endif

            <!-- Scroll to Top Button -->
            <button id="scrollToTop" class="scroll-to-top btn btn-circle btn-primary fixed bottom-4 right-4 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            </button>
        </div>
        
        <!-- Drawer Sidebar -->
        @include('components.sidebar')
    </div>

    <!-- Theme Toggle Script -->
    <script>
        // Theme toggle
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }

        // Scroll to top
        const scrollToTopButton = document.getElementById('scrollToTop');

        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopButton.classList.add('show');
            } else {
                scrollToTopButton.classList.remove('show');
            }
        };

        scrollToTopButton.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>
</html> 