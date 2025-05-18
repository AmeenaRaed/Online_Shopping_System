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
        <div class="w-[800px] rounded-xl p-6">

            <div class="text-center mb-4">
                <h1 class="text-xl font-semibold text-gray-800">Welcome to our family</h1>
                <p class="text-gray-600">Please fill your information to join us</p>
            </div>

            <div class="flex justify-center mb-6">
                <img src="https://img.freepik.com/premium-photo/colorful-shopping-bags_1302875-23952.jpg?w=360"
                    alt="Shopping" class="rounded-full shadow-md w-36 h-36">
            </div>

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-5 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{route('register.store')}}" method="POST" class="space-y-4" enctype="multipart/form-data">

                @csrf

                <div class="flex items-center space-x-4">
                    <label for="first_name" class="w-32 text-sm font-medium text-gray-700 text-right">First name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="last_name" class="w-32 text-sm font-medium text-gray-700 text-right">Last name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="dob" class="w-32 text-sm font-medium text-gray-700 text-right">Date of birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="phone" class="w-32 text-sm font-medium text-gray-700 text-right">Phone number</label>
                    <div class="flex flex-1 rounded-md overflow-hidden border border-gray-300 bg-white">
                        <span
                            class="flex items-center px-3 text-sm text-gray-500 bg-gray-100 border-r border-gray-300">+973</span>
                        <input type="tel" id="phone" name="phone" placeholder="30000000" required pattern="^\d{8}$"
                            value="{{ old('phone') }}" class="w-full px-3 py-2 text-sm focus:outline-none" />
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <label for="email" class="w-32 text-sm font-medium text-gray-700 text-right">Email address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="username" class="w-32 text-sm font-medium text-gray-700 text-right">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="password" class="w-32 text-sm font-medium text-gray-700 text-right">Password</label>
                    <input type="password" name="password" id="password" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="password_confirmation" class="w-32 text-sm font-medium text-gray-700 text-right">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                {{-- Avatar upload --}}
                <div class="flex items-center space-x-4">
                    <label for="avatar" class="w-32 text-sm font-medium text-gray-700 text-right">Avatar</label>
                    <input type="file" name="avatar_url" id="avatar_url" accept="image/*"
                    class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm file:bg-gray-100 file:border-0
                    file:px-2 file:py-1">
                </div>

                <div class="flex items-center space-x-4">
                    <label for="address" class="w-32 text-sm font-medium text-gray-700 text-right">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address') }}" required
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm">
                </div>

                <div class="flex justify-center pt-4 ">
                    <button type="submit"
                        class="px-6 py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow text-sm">
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