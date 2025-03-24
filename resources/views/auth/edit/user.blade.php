<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('auth.edit.user') }}">
        <div class="mb-4">
            <label for="select-user" class="block">Select User</label>
            <select id="select-user" name="user_id" class="border p-2 w-full" onchange="this.form.submit()">
                <option value="">Select a User</option>
                @foreach ($users as $userOption)
                    <option value="{{ $userOption->id }}" {{ $user && $user->id == $userOption->id ? 'selected' : '' }}>
                        {{ $userOption->first_name }} {{ $userOption->last_name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-600">Select a user from the list to edit their details.</small>
        </div>
    </form>

    @if ($user)
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Enter the user's first name.</small>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Enter the user's last name.</small>
            </div>

            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full" required>
                <small class="text-gray-600">Provide a valid email address for the user.</small>
            </div>

            <div class="mb-4">
                <label for="role" class="block">Role</label>
                <select id="role" name="role" class="border p-2 w-full" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="site manager" {{ old('role', $user->role) == 'site manager' ? 'selected' : '' }}>Site Manager</option>
                </select>
                <small class="text-gray-600">Select the role for this user.</small>
            </div>

            <div class="mb-4">
                <label for="password" class="block">Password</label>
                <input type="password" id="password" name="password" class="border p-2 w-full" autocomplete="new-password">
                <small class="text-gray-600">Leave this field empty if you do not wish to change the password.</small>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border p-2 w-full">
                <small class="text-gray-600">Confirm the new password (if changed).</small>
            </div>

            <div class="mb-6">
                <input type="submit" value="Update User" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 cursor-pointer">
            </div>
        </form>
    @endif

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
