<!-- Drawer Sidebar -->
<div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <div class="w-72 min-h-full bg-base-100 border-r border-base-200">
        <!-- Sidebar Header -->
        <div class="p-6 border-b border-base-200">
            <a href="/" class="flex items-center gap-2">
                <img src="/logo-light.webp" alt="RexbotX Logo" class="w-6 h-6 dark:hidden">
                <img src="/logo-dark.webp" alt="RexbotX Logo" class="w-6 h-6 hidden dark:block">
                <span class="font-semibold text-lg">RexbotX</span>
            </a>
        </div>
        
        <!-- Navigation Links -->
        <nav class="p-6 space-y-2">
            <a href="/" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-base-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="text-sm">Beranda</span>
            </a>
            <a href="/perintah" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-base-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 17l6-6-6-6"></path>
                    <path d="M12 19h8"></path>
                </svg>
                <span class="text-sm">Perintah</span>
            </a>
            <a href="/giveaway" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-base-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 12v10H4V12"></path>
                    <path d="M2 7h20v5H2z"></path>
                    <path d="M12 22V7"></path>
                    <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                    <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                </svg>
                <span class="text-sm">Giveaway</span>
            </a>
            <a href="/rating" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-base-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <span class="text-sm">Rating</span>
            </a>
        </nav>

        <!-- Auth Buttons -->
        <div class="absolute bottom-0 w-full p-6 border-t border-base-200">
            <div class="flex flex-col gap-2">
                <a href="/login" class="btn btn-ghost btn-sm justify-start gap-2 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    <span class="text-sm">Masuk</span>
                </a>
                <a href="/register" class="btn btn-primary btn-sm justify-start gap-2 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                    <span class="text-sm">Daftar</span>
                </a>
            </div>
        </div>
    </div>
</div> 