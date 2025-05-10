<x-layout>
    <div class="max-w-6xl mx-auto">
        <!-- Slideshow Wrapper -->
        <div class="flex justify-center relative mb-10">
            <div x-data="{
                currentSlide: 0,
                slides: [
                    {
                        img: 'images/home9.jpg',
                        title: 'Elevate Your Shopping Experience',
                        desc: 'Explore premium products from top-tier brands, curated just for you.'
                    },
                    {
                        img: 'images/home10.avif',
                        title: 'Exclusive Deals. Limited Time.',
                        desc: 'Unlock unbeatable offers and seasonal discounts before they are gone.'
                    }
                ]
            }"
            x-init="setInterval(() => currentSlide = (currentSlide + 1) % slides.length, 5000)"
            class="relative w-full max-w-4xl aspect-[3/2] rounded-xl shadow-lg overflow-hidden">

                <template x-for="(slide, index) in slides" :key="index">
                    <div
                        x-show="true"
                        x-transition:enter="transition-opacity duration-1000 ease-in-out"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity duration-1000 ease-in-out"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full"
                        x-bind:class="currentSlide === index ? 'z-20' : 'z-10 opacity-0 pointer-events-none'"
                    >
                        <!-- Image -->
                        <img :src="slide.img" alt="Slide Image"
                            class="absolute inset-0 w-full h-full object-cover filter brightness-75" />

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-r from-muted-rose via-soft-lilac to-dusky-blue opacity-70"></div>

                        <!-- Content -->
                        <div class="relative z-30 flex flex-col items-center justify-center h-full text-white text-center px-6">
                            <h1 class="text-3xl md:text-5xl font-extrabold mb-4 drop-shadow-lg" x-text="slide.title"></h1>
                            <p class="mb-6 text-base md:text-xl font-light" x-text="slide.desc"></p>
                            <a href="/products"
                                class="bg-peach-glow text-white px-6 py-2 rounded-full font-medium hover:bg-warm-coral transition shadow-md">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-items-center">
            @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->id) }}">

                <div class="flex flex-col items-center text-center">
                    <!-- Image Circle -->
                    <div class="w-40 h-40 rounded-full shadow hover:shadow-lg transition duration-300 bg-cover bg-center"
                         style="background-image: url('{{ asset($category->image_url) }}')">
                    </div>
            
                    <!-- Name & Description -->
                    <h3 class="mt-3 text-lg font-semibold">
                            {{ $category->name }}
                    </h3>
                    <p class="text-xs text-gray-600 mt-1 px-2">{{ $category->description }}</p>
                </div>
            </a>

            @endforeach
        </div>
        
        
        
    </div>
</x-layout>
