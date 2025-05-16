<x-layout>
    {{-- product details --}}
    <div class="max-w-5xl mx-auto p-5 bg-white shadow-md rounded-lg mt-10">
        <div class=" product-card grid grid-cols-1 md:grid-cols-2 gap-10 ">
            <!-- Product Image -->
            <div>
                <img src="{{ asset($product->image_url)  }}" alt="{{ $product->name }}"
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



    {{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}


    {{-- input area --}}
    <div class="max-w-5xl mx-auto p-5 rounded-lg mt-10 comment-input ">
        <form action="{{route('addReview', $product->id)}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="flex flex-col px-3 py-3 rounded-lg bg-white border border-gray-300 shadow-sm">
                <!-- User Avatar -->
                <div class="flex items-center flex-col text-center mb-4">
                    <h1 class="mb-3 text-2xl font-bold text-muted-rose">Add a Review!!</h1>

                    <div class="flex space-x-1" id="starRating">
                        @for ($i = 1; $i <= 3; $i++)
                            <label class="cursor-pointer">
                                <input type="radio" name="rating" value="{{ $i }}" class="hidden"
                                    onclick="highlightStars({{ $i }})">
                                <svg class="w-6 h-6 text-gray-400 star" data-value="{{ $i }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462
                                                    c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292
                                                    c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034
                                                    c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98
                                                    8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </label>
                        @endfor
                    </div>
                </div>

                <div class="relative flex items-center w-full space-x-4">
                    <img src="{{ Auth::user()->avatar_url ? asset(Auth::user()->avatar_url) : asset('images/pinkprofile2.jpg') }}"
                        alt="" class="w-20 h-20 rounded-full">


                    <textarea id="chat" rows="3" name="comment"
                        class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-muted-rose resize-none placeholder-gray-400"
                        placeholder="Add a review..."></textarea>

                    <button type="submit"
                        class="absolute right-2 p-10 inline-flex justify-center p-3 text-muted-rose rounded-full cursor-pointer transition duration-200">
                        <svg class="w-6 h-6 rotate-90 rtl:-rotate-90" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8
                            18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </div>
        </form>
    </div>



    {{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}


    {{-- Review Area --}}
    <div class="max-w-5xl mx-auto p-5 rounded-lg mt-10 flex gap-10">
        @if($product->reviews->isEmpty())
            <h1 class="text-2xl text-center font-bold text-muted-rose">No reviews yet. Be the first to add one!!</h1>
        @else
            @foreach ($product->reviews as $review)
                <div class="bg-white rounded-lg p-8 text-center md:w-1/3">
                    <div class="flex justify-center m-2">
                        <img src="{{ $review->user->avatar_url ? asset($review->user->avatar_url) : asset('images/pinkprofile2.jpg') }}"
                        alt="" class="w-20 h-20 text-center rounded-full">
                    </div>
                    
                    <p class="font-bold uppercase">{{$review->user->username}}</p>
                    <p class="text-xl font-light italic text-gray-700">{{$review->comment}}</p>
                    <div class="flex items-center justify-center space-x-2 mt-4">
                        @for ($i = 1; $i <= $review->rating; $i++)
                            <svg class="text-yellow-500 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        @endfor
                    </div>
                </div>
            @endforeach
        @endif
    </div>


    <script>


        function highlightStars(value) {
            let stars = document.querySelectorAll(".star");

            stars.forEach(star => {
                let starValue = parseInt(star.getAttribute("data-value"));
                if (starValue <= value) {
                    star.classList.add("text-yellow-500"); // Highlight selected stars
                } else {
                    star.classList.remove("text-yellow-500"); // Reset unselected stars
                }
            });
        }
    </script>

</x-layout>