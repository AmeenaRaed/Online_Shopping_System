<x-layout>
    <div class="min-h-screen bg-gradient-to-b from-very-light-pink via-white to-very-light-pink px-6 py-5">
        <div class="max-w-4xl mx-auto text-center animate-fade-in">
            <h1 class="text-5xl font-extrabold text-dusky-blue drop-shadow mb-10">Meet the Team!</h1>
            <p class="text-muted-rose mb-10 text-xl font-medium">
                We are a group of creative and slightly sleep-deprived UOB students trying to survive our thirds year
                with code and caffeine :>
            </p>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 max-w-7xl mx-auto px-4">
                @php
                    $team = [
                        ['name' => 'Ameena Raed', 'id' => '202207518', 'img' => 'Ameena.jpg'],
                        ['name' => 'Bashayer Khalifa', 'id' => '202204435', 'img' => 'Bashayer.jpeg'],
                        ['name' => 'Qunoot S.Mahdi', 'id' => '202209102', 'img' => 'Qunoot.jpeg'],
                        ['name' => 'Taqwa S.Mahdi', 'id' => '202208441', 'img' => 'taqwa.jpg'],
                    ];
                @endphp

                @foreach ($team as $member)
                    <div
                        class="bg-white rounded-2xl shadow-xl p-6 text-center border border-peach-glow hover:scale-105 hover:shadow-2xl transition-all duration-300 ease-in-out animate-fade-in">
                        <img src="{{ asset('images/team/' . $member['img']) }}" alt="{{ $member['name'] }}"
                            class="w-24 h-24 mx-auto rounded-full mb-4 border-4 border-dusky-blue object-cover shadow-md hover:shadow-lg transition">
                        <h3 class="text-2xl font-bold text-dusky-blue">{{ $member['name'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2">ID: {{ $member['id'] }}</p>
                    </div>
                @endforeach


            </div>
            <div
                class="mt-20 max-w-4xl mx-auto bg-gradient-to-br from-[#ffe5ec]/10 to-[#d0bcff]/10 backdrop-blur-lg rounded-2xl shadow-2xl p-8 text-center relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-peach-glow/10 to-dusky-blue/10 opacity-30 pointer-events-none">
                </div>

                <h2 class="text-4xl font-extrabold text-dusky-blue drop-shadow mb-6 z-10 relative">About This Project
                </h2>

                <ul class="text-lg leading-relaxed space-y-2 text-dusky-blue z-10 relative font-medium">
                    <li><span class="text-peach-glow font-semibold">Project:</span> Online Shopping System</li>
                    <li><span class="text-peach-glow font-semibold">Course:</span> ITCS489 – Software Two</li>
                    <li><span class="text-peach-glow font-semibold">Semester:</span> II, Academic Year 2024–2025</li>
                    <li><span class="text-peach-glow font-semibold">Instructor:</span> Dr. Taher Saleh</li>
                    <li><span class="text-peach-glow font-semibold">Institution:</span> University of Bahrain</li>
                    <li><span class="text-peach-glow font-semibold">Github Repo:</span> University of Bahrain</li>

                </ul>
            </div>
        </div>
    </div>
</x-layout>