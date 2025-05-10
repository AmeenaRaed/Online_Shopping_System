<x-layoutGuest>

    <div class="flex justify-center">
        <div
            class="w-[800px] h-[600px] rounded-xl flex flex-col items-center justify-between p-6 text-center">

            <h1 class="text-xl font-semibold text-gray-800 mb-4">Have a great shopping experience with us!</h1>

            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoQlX3YAdnF7tHjfrzC1jfP4TPBR6gcKaBbyxK0OcOKf4k4rCG"
                alt="Shopping cart" class="mb-4 rounded-full shadow-md w-36 h-36">

            <h2 class="text-lg font-semibold text-gray-800 mb-6">Please enter your information to Sign in</h2>

            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">

                @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
                <form class="space-y-4" action="{{route('loginCustomer.attempt')}}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-xs font-medium text-gray-900 text-left">Email
                            address</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" value="{{old('email')}}" required
                                class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-medium text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="/login/customer/forgetpass"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="current-password" 
                                required
                                class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 w-full px-6">

                        <button type="submit"
                            class="py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow transition text-sm">Sign
                            in</button>


                        <h1 class="text-lg font-semibold text-gray-800 mb-4">__________or___________</h1>
                        <a href="/register"
                            class="py-2 bg-gray-800 text-white font-semibold rounded-md hover:bg-peach-glow transition text-sm">
                            Create Account
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
</x-layoutGuest>