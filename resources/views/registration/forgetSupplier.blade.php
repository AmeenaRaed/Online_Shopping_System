<x-layoutGuest>

<div class="flex justify-center">
    <div class="w-[800px] h-[600px] rounded-xl flex flex-col items-center justify-between p-6 text-center">
      
        <h1 class="text-xl font-semibold text-gray-800 mb-4">Did you forget the password?</h1>
        <h2 class="text-lg font-semibold text-gray-800 mb-6">Please enter your information to reset a new password</h2>
  
  
        <img 
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaC6nBUCi93Jzfm1c9YogSr1Wj7hju4_kFFA&s" 
          alt="Shopping cart" 
          class="mb-4 rounded-full shadow-md w-36 h-36" 
        >
  
 
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
<form class="space-y-4" action="{{ route('supplier.reset-password') }}" method="POST">
      @csrf

            <div>
              <label for="email" class="block text-xs font-medium text-gray-900 text-left">Email address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="newpassword" class="block text-xs font-medium text-gray-900">New password</label>    
              </div>
              <div class="mt-2">
                  <input type="password" name="newpassword" id="newpassword" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
              </div>
            </div>
  
            <div>
              <div class="flex items-center justify-between">
                <label for="confirm" class="block text-xs font-medium text-gray-900">Confirm password</label>    
              </div>
              <div class="mt-2">
                  <input type="password" name="confirm" id="confirm"  required class="block w-full rounded-md bg-white px-3 py-2 text-sm text-gray-900 border border-black placeholder:text-gray-400 focus:border-black focus:outline-none">
              </div>
            </div>
  
            <div class="flex flex-col space-y-4 w-full px-6">
              
              <button type="submit" class="py-2 bg-dusky-blue text-white font-semibold rounded-md hover:bg-peach-glow transition text-sm">Save</button>
  
            </div>
          </form>
        </div>
  
      </div>
</div>

</x-layoutGuest>
