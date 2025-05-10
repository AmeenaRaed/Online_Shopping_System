<x-layout>
    <div class="flex min-h-screen px-10 py-10 ">
        {{-- Profile Section --}}
        <div class="w-full max-w-md rounded-2xl p-8 mr-8 shadow-lg border border-dusky-blue">
            {{-- Profile Picture --}}
            <div class="flex justify-center mb-6">
                <img 
                    src="{{ asset('images/pinkprofile2.jpg') }}" 
                    alt="Profile Picture" 
                    class="w-32 h-32 rounded-full object-cover shadow-md border-1 border-dusky-blue"
                >
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
                <button id="slide-1" class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm mr-2">Dashboard</button>
                <button id="slide-2" class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm mr-2">Orders</button>
                <button id="slide-3" class="px-4 py-2 text-sm bg-dusky-blue text-white rounded-full border border-peach-glow hover:bg-warm-coral transition-all duration-300 shadow-sm">Settings</button>
            </div>

            <!-- Slide Content -->
            <div class="slide-content text-center">
                <div id="slide-1-content" class="slide-item mb-4 p-4 rounded-lg text-muted-rose">
                    <p class="text-sm font-medium">dashboard overview: liked items, number of orders, and more insights.</p>
                </div>
                <div id="slide-2-content" class="slide-item hidden mb-4 p-4 rounded-lg  text-muted-rose">
                    <p class="text-sm font-medium">recent orders</p>
                </div>
                <div id="slide-3-content" class="slide-item hidden mb-4 p-4 rounded-lg text-muted-rose">
                    <p class="text-sm font-medium">account settings and preferences.</p>
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
