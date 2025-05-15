<x-layoutGuest>

<div class="flex justify-center">
    <div class="w-[800px] h-[600px] rounded-xl flex flex-col items-center justify-between p-6 text-center">
      
        <h1 class="text-xl font-semibold text-gray-800 mb-4">Supplier Login Page</h1>
  
        <img 
          src="https://i.pinimg.com/originals/b2/20/4d/b2204d4fe721c0549a942be769714652.jpg" 
          alt="supplier" 
          class="mb-4 rounded-full shadow-md w-36 h-36" 
        >
  
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
            
              @if (session('status'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-5 text-sm">
                    {{ session('status') }}
                </div>
            @endif
            
          <form class="space-y-4" action="{{route('loginSupplier.attempt')}}" method="POST">
            @csrf
            <div>
              <label for="email" class="block text-xs font-medium text-gray-900 text-left">Email address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" value="{{old('email')}}" required class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-medium text-gray-900">Password</label>
                <div class="text-sm">
                  <a href="/login/admin/forgetpass" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                  <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
              </div>
            </div>
  
            <div class="flex flex-col space-y-4 w-full px-6">
              <button type="submit" class="py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow transition text-sm">Sign in</button>
  
            </div>
          </form>
        </div>
  
      </div>
</div>
</x-layoutGuest>
