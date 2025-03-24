<x-admin-layout>
    <h2>Create a User</h2>
    
    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-4">
            <label for="first_name" class="block">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="border p-2 w-full" required>
            <small class="text-gray-600">Enter the users first name.</small>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="border p-2 w-full" required>
            <small class="text-gray-600">Enter the users last name.</small>
        </div>

        <input type="hidden" name="role" value="site manager" />

        <div class="mb-4">
            <label for="email" class="block">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="border p-2 w-full" required>
            <small class="text-gray-600">Provide a valid email address.</small>
        </div>

        <div class="mb-4">
            <label for="password" class="block">Password:</label>
            <input type="password" id="password" name="password" class="border p-2 w-full" required autocomplete="new-password">
            <small class="text-gray-600">Choose a strong password. Minimum 8 characters.</small>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="border p-2 w-full" required>
            <small class="text-gray-600">Confirm the password by entering it again.</small>
        </div>

        <div class="mb-6">
            <input type="submit" value="Register" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 cursor-pointer">
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
</x-admin-layout>
