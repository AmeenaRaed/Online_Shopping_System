<x-layoutGuest>
<div class=" flex-col justify-center items-center gap-4 mx-4 p-2">
            <div class=" flex justify-between items-center mx-10">
                <!-- Left-aligned logo -->
                <div class="flex">
                    <img src="{{ asset('images/shoplogo.png') }}" alt="Logo" class="w-full max-w-[100px] h-auto" />
                </div>
                <!-- Right-aligned icon -->
                <div class="flex gap-7 items-center mx-5">
                </div>
              </div>
            <hr class="border-b-1 m-4 border-gray-200" />
            <div class="mb-5 flex justify-between items-center mx-10">
                <!-- Left-aligned navigation -->
                <nav class="flex gap-10 flex-wrap">
                  <ul class="flex space-x-4">
                    <li><a href="/" class="px-4 py-2 rounded-md hover:bg-peach-glow">Home</a></li>
                  </ul>
                </nav>
        </div>
        </div>
    <div class="flex justify-center">
        <div class="w-[800px] h-[600px] rounded-xl flex flex-col items-center justify-center p-8 text-center">

            <h1 class="text-2xl font-bold text-gray-800 mb-8">Welcome</h1>

            <img src="https://i.pinimg.com/736x/5d/b6/dd/5db6ddb1b5e73a367a7ced08aa9fbbfc.jpg"
                alt="Role Illustration" class="mb-8 rounded-full shadow-md w-60 h-60">

            <h1 class="text-2xl font-bold text-gray-800 mb-8">Login as</h1>

            <div class="flex flex-col space-y-4 w-full px-6">
                <a href="/login/customer"
                    class="py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow transition text-lg">
                    Customer
                </a>
                <a href="/login/admin"
                    class="py-2 bg-gray-800 text-white font-semibold rounded-md hover:bg-peach-glow transition text-lg">
                    Admin
                </a>
                 <a href="/login/supplier"
                    class="py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow transition text-lg">
                    Supplier
                </a>
            </div>
        </div>

    </div>

</x-layoutGuest>
