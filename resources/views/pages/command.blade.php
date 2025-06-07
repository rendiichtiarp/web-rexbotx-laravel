@extends('layouts.app')

@section('title', 'Daftar Perintah')

@section('content')
<section class="py-12 md:py-24 bg-base-100">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-8 md:mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                <span class="text-primary text-xs md:text-[13px] font-medium">Daftar Perintah</span>
            </div>
            <h2 class="text-2xl md:text-4xl font-bold mb-3 md:mb-4">
                Perintah <span class="text-primary">RexbotX</span>
            </h2>
            <p class="text-sm md:text-base text-base-content/70">
                Temukan semua perintah yang tersedia di RexbotX. Dari AI chat hingga tools yang berguna,
                semua ada di sini untuk membantu aktivitas Anda.
            </p>
        </div>

        <!-- Command List Component -->
        @include('components.commandlist')
    </div>
</section>
@endsection 