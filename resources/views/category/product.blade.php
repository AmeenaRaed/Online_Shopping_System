<x-layout>
    <div class="max-w-5xl mx-auto p-8 bg-white shadow-md rounded-lg mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Product Image -->
            <div>
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                     class="w-full h-auto object-cover rounded-md shadow" />
            </div>

            <!-- Product Info -->
            <div class="flex flex-col justify-between">
                <!-- Centered Product Info -->
                <div class="flex-grow flex flex-col justify-center items-center text-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <p class="text-gray-700 mt-4">{{ $product->description ?? 'No description available.' }}</p>

                        <div class="mt-6 space-y-2">
                            <p class="text-xl text-primary font-semibold">
                                Price: {{ number_format($product->price, 2) }} BD
                            </p>
                            <p class="text-md text-gray-800">
                                Stock:
                                @if ($product->stock_quantity > 0)
                                    <span class="text-green-600 font-medium">{{ $product->stock_quantity }} available</span>
                                @else
                                    <span class="text-red-600 font-medium">Out of stock</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bottom-Aligned Add to Cart Button -->
                @if ($product->stock_quantity > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-6 w-full max-w-xs self-center">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button
                            class="w-full py-3 bg-dusky-blue text-white rounded-md hover:bg-peach-glow transition duration-200">
                            Add to Cart
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layout>
