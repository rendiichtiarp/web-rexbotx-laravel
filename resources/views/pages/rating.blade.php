@extends('layouts.app')

@section('title', 'Rating Pengguna')

@section('content')
<section class="py-12 md:py-24 bg-base-100">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-8 md:mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-base-300 mb-3 md:mb-4">
                <span class="text-primary text-xs md:text-[13px] font-medium">Rating Pengguna</span>
            </div>
            <h2 class="text-2xl md:text-4xl font-bold mb-3 md:mb-4">
                Berikan Penilaian <span class="text-primary">Anda</span>
            </h2>
            <p class="text-sm md:text-base text-base-content/70">
                Bagikan pengalaman Anda menggunakan RexBot
            </p>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Rating Form Column -->
            <div class="lg:col-span-1">
                <div class="bg-base-100 border border-base-300 rounded-xl p-6">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Berikan Rating</h3>
                    <form class="space-y-4">
                        <!-- Star Rating -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium">Rating</label>
                            <div class="flex gap-1">
                                <button type="button" class="rating-star text-2xl transition-colors duration-200 text-base-300" data-rating="1" onclick="setRating(1)">★</button>
                                <button type="button" class="rating-star text-2xl transition-colors duration-200 text-base-300" data-rating="2" onclick="setRating(2)">★</button>
                                <button type="button" class="rating-star text-2xl transition-colors duration-200 text-base-300" data-rating="3" onclick="setRating(3)">★</button>
                                <button type="button" class="rating-star text-2xl transition-colors duration-200 text-base-300" data-rating="4" onclick="setRating(4)">★</button>
                                <button type="button" class="rating-star text-2xl transition-colors duration-200 text-base-300" data-rating="5" onclick="setRating(5)">★</button>
                                <input type="hidden" name="rating" id="ratingInput" required>
                            </div>
                        </div>

                        <!-- Review -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium">Ulasan (Opsional)</label>
                            <textarea name="review" rows="3" 
                                class="w-full rounded-lg border border-base-300 bg-base-100 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20"
                                placeholder="Bagikan pengalaman Anda menggunakan RexBot..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">
                            Kirim Rating
                        </button>
                    </form>

                    <!-- Rating Stats -->
                    <div class="mt-6 pt-6 border-t border-base-300">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-3xl font-bold text-warning">4.5</div>
                                <div class="text-sm text-base-content/70">Rata-rata dari 65 rating</div>
                            </div>
                            <div class="flex gap-1 text-xl text-warning">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
                            </div>
                        </div>
                        
                        <!-- Rating Distribution -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <div class="w-12 text-sm">5 star</div>
                                <div class="flex-1 h-2 bg-base-300 rounded-full overflow-hidden">
                                    <div class="h-full bg-warning" style="width: 70%"></div>
                                </div>
                                <div class="w-12 text-sm text-right">45</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-12 text-sm">4 star</div>
                                <div class="flex-1 h-2 bg-base-300 rounded-full overflow-hidden">
                                    <div class="h-full bg-warning" style="width: 20%"></div>
                                </div>
                                <div class="w-12 text-sm text-right">13</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-12 text-sm">3 star</div>
                                <div class="flex-1 h-2 bg-base-300 rounded-full overflow-hidden">
                                    <div class="h-full bg-warning" style="width: 5%"></div>
                                </div>
                                <div class="w-12 text-sm text-right">3</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-12 text-sm">2 star</div>
                                <div class="flex-1 h-2 bg-base-300 rounded-full overflow-hidden">
                                    <div class="h-full bg-warning" style="width: 3%"></div>
                                </div>
                                <div class="w-12 text-sm text-right">2</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-12 text-sm">1 star</div>
                                <div class="flex-1 h-2 bg-base-300 rounded-full overflow-hidden">
                                    <div class="h-full bg-warning" style="width: 2%"></div>
                                </div>
                                <div class="w-12 text-sm text-right">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews List Column -->
            <div class="lg:col-span-2">
                <div class="grid gap-4">
                    <!-- Review 1 -->
                    <div class="bg-base-100 border border-base-300 rounded-xl p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-primary font-medium">SA</span>
                                </div>
                                <div>
                                    <div class="font-medium">Sasaa</div>
                                    <div class="text-sm text-base-content/70">2 jam yang lalu</div>
                                </div>
                            </div>
                            <div class="flex gap-1 text-warning">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>
                        <p class="text-base-content/80">bagusss sukakk lopyu buat atmin yang udah buat bot 👆💕</p>
                    </div>

                    <!-- Review 2 -->
                    <div class="bg-base-100 border border-base-300 rounded-xl p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-primary font-medium">CH</span>
                                </div>
                                <div>
                                    <div class="font-medium">Challasa</div>
                                    <div class="text-sm text-base-content/70">5 jam yang lalu</div>
                                </div>
                            </div>
                            <div class="flex gap-1 text-warning">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>
                        <p class="text-base-content/80">RexBotX ailoaf rekbot miaw miaw ❤️</p>
                    </div>

                    <!-- Review 3 -->
                    <div class="bg-base-100 border border-base-300 rounded-xl p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-primary font-medium">AS</span>
                                </div>
                                <div>
                                    <div class="font-medium">Ashley</div>
                                    <div class="text-sm text-base-content/70">1 hari yang lalu</div>
                                </div>
                            </div>
                            <div class="flex gap-1 text-warning">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>
                        <p class="text-base-content/80">RexBotX</p>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-4">
                        <div class="join">
                            <button class="join-item btn btn-sm">«</button>
                            <button class="join-item btn btn-sm btn-active">1</button>
                            <button class="join-item btn btn-sm">2</button>
                            <button class="join-item btn btn-sm">3</button>
                            <button class="join-item btn btn-sm">»</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function setRating(rating) {
    // Update hidden input
    document.getElementById('ratingInput').value = rating;
    
    // Update star colors
    const stars = document.querySelectorAll('.rating-star');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.add('text-warning');
            star.classList.remove('text-base-300');
        } else {
            star.classList.remove('text-warning');
            star.classList.add('text-base-300');
        }
    });
}
</script>
@endpush 