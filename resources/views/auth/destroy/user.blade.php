<x-admin-layout>
    <h2>Delete a User</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-6">
        <table class="min-w-full text-left table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">First Name</th>
                    <th class="p-4">Last Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="p-4">{{ $user->first_name }}</td>
                        <td class="p-4">{{ $user->last_name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ ucfirst($user->role) }}</td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.user.delete', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $user->first_name }} {{ $user->last_name }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $users->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(userName) {
            return confirm("Are you sure you want to delete the user: " + userName + "?");
        }
    </script>
</x-admin-layout>
