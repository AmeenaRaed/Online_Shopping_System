<x-layout>
    <div class="max-w-5xl mx-auto p-8 bg-white shadow-md rounded-lg mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Product Image -->
            <div>
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-md shadow" />
            </div>

            <!-- Product Info -->
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="text-gray-700 mt-4">{{ $product->description ?? 'No description available.' }}</p>

                    <div class="mt-6 space-y-2">
                        <p class="text-xl text-primary font-semibold">Price: {{ number_format($product->price, 2) }} BD</p>
                        <p class="text-md text-gray-800">Stock: 
                            @if ($product->stock_quantity > 0)
                                <span class="text-green-600 font-medium">{{ $product->stock_quantity }} available</span>
                            @else
                                <span class="text-red-600 font-medium">Out of stock</span>
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                @if ($product->stock_quantity > 0)
                    <div class="mt-8">
                        <button class="w-full py-3 bg-primary text-white rounded-md hover:bg-primary-dark transition duration-200">
                            Add to Cart
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
