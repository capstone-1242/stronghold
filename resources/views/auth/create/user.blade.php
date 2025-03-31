<x-admin-layout>
   <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Create a User</h2>
        
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
    
            <div class="mb-6">
                <label for="first_name" class="block w-full">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>Enter the users first name.</small>
            </div>
    
            <div class="mb-6">
                <label for="last_name" class="block w-full">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>Enter the users last name.</small>
            </div>
    
            <input type="hidden" name="role" value="site manager" />
    
            <div class="mb-6">
                <label for="email" class="block w-full">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>Provide a valid email address.</small>
            </div>
    
            <div class="mb-6">
                <label for="password" class="block w-full">Password</label>
                <input type="password" id="password" name="password" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required autocomplete="new-password">
                <small>Choose a strong password. Minimum 8 characters.</small>
            </div>
    
            <div class="mb-6">
                <label for="password_confirmation" class="block w-full">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                <small>Confirm the password by entering it again.</small>
            </div>
    
            <div class="mb-6">
                <input type="submit" value="Register User" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
            </div>
        </form>
    
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   </section>
</x-admin-layout>
