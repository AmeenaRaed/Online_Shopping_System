<x-layout>
    <div class="flex min-h-screen px-10 py-10 ">
        {{-- Profile Section --}}
        <div class="w-full max-w-md rounded-2xl p-8 mr-8 shadow-lg border border-dusky-blue">
            {{-- Profile Picture --}}
            <div class="flex justify-center mb-6">
                <img src="{{ $user->avatar_url ? asset($user->avatar_url) : asset('images/pinkprofile2.jpg') }}"
                    alt="Profile Picture"
                    class="w-32 h-32 rounded-full object-cover shadow-md border-1 border-dusky-blue">
            </div>


            {{-- User Name and Email --}}
            <div class="text-center mb-6">
                <h1 class="text-3xl font-extrabold text-muted-rose tracking-wide">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h1>
                <p class="text-sm text-dusky-blue mt-1 font-medium">
                    {{ Auth::user()->email }}
                </p>
            </div>

            {{-- User Details --}}
            <div class="space-y-3 text-sm text-center transition-transform duration-200">
                <div class="bg-white/80 p-2 rounded-lg border border-soft-lilac shadow">
                    <span class="text-muted-rose font-semibold">Username:</span>
                    <span class="text-gray-800">{{ Auth::user()->username }}</span>
                </div>
                <div class="bg-white/80 p-2 rounded-lg border border-soft-lilac shadow">
                    <span class="text-muted-rose font-semibold">Phone:</span>
                    <span class="text-gray-800">{{ Auth::user()->phone }}</span>
                </div>
                <div class="bg-white/80 p-2 rounded-lg border border-soft-lilac shadow">
                    <span class="text-muted-rose font-semibold">Date of Birth:</span>
                    <span class="text-gray-800">{{ Auth::user()->dob }}</span>
                </div>
                <div class="bg-soft-lilac p-2 rounded-lg border border-dusky-blue shadow text-white font-semibold">
                    Role: {{ Auth::user()->role }}
                </div>
            </div>
        </div>

        {{-- Dashboard Section --}}
        <div class="flex-1 bg-very-light-pink p-8 rounded-2xl shadow-xl border border-soft-lilac">
            <h2 class="text-2xl font-bold text-dusky-blue mb-6 text-center">
                Welcome, <span class="text-muted-rose">{{ Auth::user()->username }}</span>!
            </h2>

            <!-- Navigation Buttons -->
            <div class="mb-6 text-center">
                <button id="slide-1"
                    class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm mr-2">Dashboard</button>
                <button id="slide-2"
                    class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm mr-2">Orders</button>
                <button id="slide-3"
                    class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm">Settings</button>
            </div>

            <!-- Slide Content -->
            <div class="slide-content text-center">
                <div id="slide-1-content" class="slide-item mb-4 p-6 rounded-lg text-muted-rose">
                    <p class="text-xl font-semibold text-center mb-6">Dashboard Overview</p>

                    <!-- Display summary of orders -->
                    <div class="flex flex-col justify-center items-center gap-6">
                        <!-- Total Orders Card -->
                        <div
                            class="bg-gradient-to-r from-soft-lilac to-rose-100 p-5 rounded-full border border-soft-lilac shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out text-center w-64">
                            <strong class="text-lg font-medium text-dusky-blue">Total Orders</strong>
                            <div class="text-xl text-muted-rose font-bold">{{ $totalOrders }}</div>
                        </div>

                        <!-- Items in Cart Card -->
                        <div
                            class="bg-gradient-to-r from-soft-lilac to-rose-100 p-5 rounded-full border border-soft-lilac shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out text-center w-64">
                            <strong class="text-lg font-medium text-dusky-blue">Items in Cart</strong>
                            <div class="text-xl text-muted-rose font-bold">{{ $cartItemsCount }}</div>
                        </div>
                    </div>
                </div>


                {{-- orders --}}
                <div id="slide-2-content" class="slide-item hidden mb-4 p-4 rounded-lg text-muted-rose">
                    <p class="text-xl font-semibold text-center mb-6">Orders Summary</p>

                    @if($orders->count())
                        <ul class="space-y-3">
                            @foreach($orders as $order)
                                <li class="bg-white/80 p-3 rounded-lg border border-soft-lilac shadow text-left">
                                    <div><strong>Order ID:</strong> {{ $order->id }}</div>
                                    <div><strong>Status:</strong> {{ ucfirst($order->order_status) }}</div>
                                    <div><strong>Total:</strong> ${{ number_format($order->total, 2) }}</div>
                                    <div><strong>Placed on:</strong> {{ $order->created_at->format('M d, Y H:i') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">You haven't placed any orders yet.</p>
                    @endif
                </div>


                {{-- settings --}}
                <div id="slide-3-content" class="slide-item hidden mb-4 p-4 rounded-lg text-muted-rose">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                        class="space-y-4 text-left " id="profile-form">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label for="first_name" class="block font-semibold">First Name</label>
                                <input type="text" name="first_name" id="first_name"
                                    value="{{ old('first_name', Auth::user()->first_name) }}"
                                    class="w-full p-2 border rounded">
                            </div>

                            <div>
                                <label for="last_name" class="block font-semibold">Last Name</label>
                                <input type="text" name="last_name" id="last_name"
                                    value="{{ old('last_name', Auth::user()->last_name) }}"
                                    class="w-full p-2 border rounded">
                            </div>

                            <div>
                                <label for="email" class="block font-semibold">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', Auth::user()->email) }}" class="w-full p-2 border rounded">
                            </div>

                            <div>
                                <label for="phone" class="block font-semibold">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}" class="w-full p-2 border rounded">
                            </div>

                            <div>
                                <label for="dob" class="block font-semibold">Date of Birth</label>
                                <input type="date" name="dob" id="dob" value="{{ old('dob', Auth::user()->dob) }}"
                                    class="w-full p-2 border rounded">
                            </div>

                            <div>
                                <label for="avatar_url" class="block font-semibold">Profile Picture</label>
                                <input type="file" name="avatar_url" id="avatar_url" class="w-full p-2 border rounded" accept="image/*">
                            </div>
                        </div>

                        <div class="flex justify-center mt-10">
                            <button type="submit" id="save-profile-changes-btn"
                                class="bg-dusky-blue text-white px-4 py-2 rounded hover:bg-warm-coral transition-all">Save
                                Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('button');
        const slides = document.querySelectorAll('.slide-item');

        buttons.forEach(button => {
            button.addEventListener('click', (event) => {
                slides.forEach(slide => slide.classList.add('hidden'));
                buttons.forEach(btn => btn.classList.remove('ring', 'ring-offset-2'));
                const slideId = event.target.id + '-content';
                document.getElementById(slideId).classList.remove('hidden');
                event.target.classList.add('ring', 'ring-offset-2');
            });
        });
    </script>
</x-layout>