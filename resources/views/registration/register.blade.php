<x-layoutGuest>

    <div class="flex justify-center">
        <div class="w-[800px] rounded-xl p-6">

            <div class="text-center mb-4">
                <h1 class="text-xl font-semibold text-gray-800">Welcome to our family</h1>
                <p class="text-gray-600">Please fill your information to join us</p>
            </div>

            <div class="flex justify-center mb-6">
                <img src="https://img.freepik.com/premium-photo/colorful-shopping-bags_1302875-23952.jpg?w=360"
                    alt="Shopping" class="rounded-full shadow-md w-36 h-36">
            </div>

            <form action="#" method="POST" class="space-y-4">

                <div class="flex items-center space-x-4">
                    <label for="firstname" class="w-32 text-sm font-medium text-gray-700 text-right">First name</label>
                    <input type="text" name="firstname" id="firstname" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="lastname" class="w-32 text-sm font-medium text-gray-700 text-right">Last name</label>
                    <input type="text" name="lastname" id="lastname" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="date" class="w-32 text-sm font-medium text-gray-700 text-right">Date of birth</label>
                    <input type="date" name="date" id="date" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="phone" class="w-32 text-sm font-medium text-gray-700 text-right">Phone number</label>
                    <div class="flex flex-1 rounded-md overflow-hidden border border-gray-300 bg-white">
                        <span
                            class="flex items-center px-3 text-sm text-gray-500 bg-gray-100 border-r border-gray-300">+973</span>
                        <input type="tel" id="phone" name="phone" placeholder="30000000" required pattern="^\d{8}$"
                            class="w-full px-3 py-2 text-sm focus:outline-none" />
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <label for="email" class="w-32 text-sm font-medium text-gray-700 text-right">Email address</label>
                    <input type="email" name="email" id="email" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="userName" class="w-32 text-sm font-medium text-gray-700 text-right">Username</label>
                    <input type="text" name="userName" id="userName" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="password" class="w-32 text-sm font-medium text-gray-700 text-right">Password</label>
                    <input type="password" name="password" id="password" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex justify-center pt-4 ">
                    <button type="submit"
                        class="px-6 py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-blue-500 text-sm">
                        Register
                    </button>

                </div>
                <div class="flex justify-center">
                    <p class="">Already have an account? <a href="/login"
                        class="font-semibold text-indigo-600 hover:text-indigo-500">Login!</a> </p>

                </div>


            </form>
        </div>
    </div>

</x-layoutGuest>