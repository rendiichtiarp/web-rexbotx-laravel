<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | RexbotX</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <!-- Prevent Flash of Wrong Theme (FOWT) -->
    <script>
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
    </style>
</head>
<body class="bg-base-100 min-h-screen">
    <!-- Include Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-24">
                <!-- Error Content -->
                <div class="text-center lg:text-left max-w-md">
                    <h1 class="text-7xl lg:text-9xl font-bold text-primary mb-4">404</h1>
                    <h2 class="text-2xl lg:text-3xl font-semibold mb-4">Halaman Tidak Ditemukan</h2>
                    <p class="text-base-content/70 text-lg mb-8">
                        Maaf, halaman yang Anda cari tidak dapat ditemukan. 
                        Mungkin halaman telah dipindahkan atau dihapus.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                        <a href="/" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Kembali ke Beranda
                        </a>
                        <a href="https://wa.me/6281284900651" class="btn btn-outline" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                            Hubungi Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 