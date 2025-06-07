<!-- Navbar -->
<div class="navbar fixed top-0 z-50 bg-base-100 border-b border-base-200">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between w-full">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <label for="my-drawer" class="btn btn-ghost btn-sm lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
                <a href="/" class="flex items-center gap-2">
                    <img src="/logo-light.webp" alt="RexbotX Logo" class="w-8 h-8 dark:hidden">
                    <img src="/logo-dark.webp" alt="RexbotX Logo" class="w-8 h-8 hidden dark:block">
                    <span class="font-semibold text-lg">RexbotX</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="/" class="text-base hover:text-primary transition-colors font-medium">Beranda</a>
                <a href="/perintah" class="text-base hover:text-primary transition-colors font-medium">Perintah</a>
                <a href="/giveaway" class="text-base hover:text-primary transition-colors font-medium">Giveaway</a>
                <a href="/rating" class="text-base hover:text-primary transition-colors font-medium">Rating</a>
            </nav>

            <!-- Right Menu -->
            <div class="flex items-center gap-4">
                <label class="swap swap-rotate btn btn-ghost btn-sm btn-circle">
                    <input type="checkbox" class="theme-controller" value="dark" />
                    <svg class="swap-on w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                    <svg class="swap-off w-5 h-5 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
                </label>
                <div class="hidden lg:flex items-center gap-2">
                    <a href="/login" class="btn btn-ghost btn-sm text-base font-medium px-4">Masuk</a>
                    <a href="/register" class="btn btn-primary btn-sm text-base font-medium px-4">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div> 