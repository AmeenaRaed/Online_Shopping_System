<x-layoutGuest>

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
