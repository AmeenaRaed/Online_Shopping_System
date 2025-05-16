<x-layout>
    <div class="max-w-5xl mx-auto p-5 bg-white shadow-md rounded-lg mt-10">
        <div class=" product-card grid grid-cols-1 md:grid-cols-2 gap-10 ">
            <!-- Product Image -->
            <div>
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                    class="w-full h-120 object-cover rounded-md my-4" />
            </div>

            <!-- Product Info -->
            <div class="flex flex-col justify-between">
                <div class="flex-grow flex flex-col justify-center items-center text-center">
                    <div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 ">{{ $product->name }}</h1>
                            <p class="text-xl m-2 text-primary font-semibold text-soft-lilac">
                                {{$product->categories->first()->name}}
                            </p>
                            <p class="text-gray-700 mt-2">{{ $product->description ?? 'No description available.' }}</p>
                        </div>

                        <div class="mt-6 space-y-2">


                            <p class="text-xl text-primary font-semibold product-price text-warm-coral">
                                {{ number_format($product->price, 2) }} BD
                            </p>
                            <p class="text-md text-gray-800">
                                @if ($product->stock_quantity > 0)
                                    <span class="text-green-600 font-medium stock-quantity">{{ $product->stock_quantity }}
                                        available</span>
                                @else
                                    <span class="text-red-600 font-medium">Out of stock</span>
                                @endif
                            </p>
                            <p class="text-gray-500">Supplier: {{$product->supplier->first()->username}}</p>

                            <div class="flex justify-center mt-4">
                                @if ($product->stock_quantity > 0)
                                    <form action="{{ route('cart.add') }}" method="POST"
                                        class=" w-full max-w-xs flex justify-center">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button
                                            class="w-full py-3 mt-10 bg-dusky-blue text-white rounded-md hover:bg-peach-glow transition duration-200">
                                            Add to Cart
                                        </button>
                                    </form>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>