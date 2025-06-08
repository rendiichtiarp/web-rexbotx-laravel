@extends('layouts.app')

@section('title', 'Dashboard - RexbotX')

@section('content')
<div class="min-h-[calc(100vh-4rem)] py-6 lg:py-8">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-base-content/70">Kelola bot WhatsApp Anda dengan mudah di sini</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Total Pesan -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Total Pesan</div>
                    <div class="stat-value">{{ number_format(0) }}</div>
                    <div class="stat-desc">↗︎ Meningkat 10% (30 hari)</div>
                </div>
            </div>

            <!-- Pengguna Aktif -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Pengguna Aktif</div>
                    <div class="stat-value">{{ number_format(0) }}</div>
                    <div class="stat-desc">↗︎ Meningkat 5% (30 hari)</div>
                </div>
            </div>

            <!-- Koin -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Koin</div>
                    <div class="stat-value text-primary">{{ number_format(Auth::user()->coin) }}</div>
                    <div class="stat-desc">Diperbarui hari ini</div>
                </div>
            </div>

            <!-- Level -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Level</div>
                    <div class="stat-value">{{ Auth::user()->level }}</div>
                    <div class="stat-desc">{{ number_format(0) }} XP menuju level berikutnya</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>
                    Chat AI
                </a>
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>
                    Sticker
                </a>
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                    Grup
                </a>
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                    </svg>
                    Media
                </a>
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    Premium
                </a>
                <a href="#" class="btn btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    Settings
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div>
            <h2 class="text-xl font-semibold mb-4">Aktivitas Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Tipe</th>
                            <th>Detail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-base-content/70">{{ now()->format('d M Y H:i') }}</td>
                            <td>
                                <span class="badge badge-ghost">Login</span>
                            </td>
                            <td>Login berhasil via web</td>
                            <td>
                                <span class="badge badge-success">Sukses</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
