<x-layout>
    <div class=" max-w-6xl mx-auto">
        {{-- Welcome pic --}}
        <div class=" ">
            <div class="mb-10 flex justify-center">
                <img src="images/home2.jpg" alt="Welcome Image" 
                     class="w-full max-w-[700px] h-auto rounded-lg shadow-md object-cover max-h-[700px]" />
            </div>

        </div>
        

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-items-center">
            @foreach ($categories as $category)
                <div class="w-40 h-40 flex flex-col items-center justify-center bg-warm-coral opacity-40 rounded-full text-center shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
                    <p class="text-xs text-gray-600 mt-1 px-2">{{ $category->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

