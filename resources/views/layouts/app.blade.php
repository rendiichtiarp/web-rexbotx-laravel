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
    
    <!-- Prevent Flash of Wrong Theme (FOWT) -->
    <script>
        const theme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-theme', theme);
    </script>
    
    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="bg-base-100 min-h-screen">
    <!-- Drawer wrapper -->
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        
        <!-- Page content -->
        <div class="drawer-content">
            <!-- Include Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
            <div class="pt-16">
                @yield('content')
            </div>

            <!-- Scroll to top button -->
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                    class="fixed bottom-4 right-4 btn btn-circle btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            </button>
        </div>

        <!-- Include Sidebar -->
        @include('components.sidebar')
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html> 