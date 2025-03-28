<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Delete a User</h2>

    @if(session('success'))
        <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">First Name</th>
                    <th class="p-4 text-left">Last Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Actions</th>
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
                            <form action="{{ route('auth.destroy.user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $user->first_name }} {{ $user->last_name }}')" />
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
