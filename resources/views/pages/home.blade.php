@extends('layouts.app')

@section('title', 'Bot WhatsApp Terbaik')

@section('content')
    <!-- Hero Section -->
    @include('components.home.hero')

    <!-- Features Section -->
    @include('components.home.features')

    <!-- Pricing Section -->
    @include('components.home.pricing')

    <!-- Testimonial Section -->
    @include('components.home.testimonials')

    <!-- FAQ Section -->
    @include('components.home.faq')
@endsection

@push('scripts')
<script>
    // Auto scroll for mobile testimonials
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

    // Chat animation
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan kelas animate ke semua chat message saat halaman dimuat
        const messages = document.querySelectorAll('.chat-message');
        messages.forEach(msg => {
            msg.classList.add('animate');
        });
    });
</script>
@endpush 