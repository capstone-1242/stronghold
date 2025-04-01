<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Edit a User</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <form method="GET" action="{{ route('auth.edit.user') }}" class="mb-6">
            <div class="mb-6">
                <label for="select-user" class="block w-full">Select User</label>
                <select id="select-user" name="user_id" class="border border-gray-800 p-2 w-full rounded-xl bg-white" onchange="this.form.submit()">
                    <option value="">Select a User</option>
                    @foreach ($users as $userOption)
                        <option value="{{ $userOption->id }}" {{ $user && $user->id == $userOption->id ? 'selected' : '' }}>
                            {{ $userOption->first_name }} {{ $userOption->last_name }}
                        </option>
                    @endforeach
                </select>
                <small>Select a user from the list to edit their details.</small>
            </div>
        </form>
    
        @if ($user)
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="first_name" class="block w-full">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Enter the user's first name.</small>
                </div>
    
                <div class="mb-6">
                    <label for="last_name" class="block w-full">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Enter the user's last name.</small>
                </div>
    
                <div class="mb-6">
                    <label for="email" class="block w-full">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                    <small>Provide a valid email address for the user.</small>
                </div>
    
                <div class="mb-6">
                    <label for="role" class="block w-full">Role</label>
                    <select id="role" name="role" class="border border-gray-800 p-2 w-full rounded-xl bg-white" required>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="site manager" {{ old('role', $user->role) == 'site manager' ? 'selected' : '' }}>Site Manager</option>
                    </select>
                    <small>Select the role for this user.</small>
                </div>
    
                <div class="mb-6">
                    <label for="password" class="block w-full">Password</label>
                    <input type="password" id="password" name="password" class="border border-gray-800 p-2 w-full rounded-xl bg-white" autocomplete="new-password">
                    <small>Leave this field empty if you do not wish to change the password.</small>
                </div>
    
                <div class="mb-6">
                    <label for="password_confirmation" class="block w-full">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-800 p-2 w-full rounded-xl bg-white">
                    <small>Confirm the new password (if changed).</small>
                </div>
    
                <div class="mb-6">
                    <input type="submit" value="Update User" class="bg-sky-900 text-white p-2 rounded-xl hover:bg-sky-600 w-full">
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
    </section>
</x-admin-layout>
