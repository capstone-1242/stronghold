<x-admin-layout>
    <h2>Delete a Memorial</h2>
    
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
                    <th class="p-4">Biography</th>
                    <th class="p-4">Birth Year</th>
                    <th class="p-4">Death Year</th>
                    <th class="p-4">Tag</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memorials as $memorial)
                    <tr class="border-b">
                        <td class="p-4">{{ $memorial->first_name }}</td>
                        <td class="p-4">{{ $memorial->last_name }}</td>
                        <td class="p-4">{{ Str::limit($memorial->biography, 50) }}</td>
                        <td class="p-4">{{ $memorial->birth_year }}</td>
                        <td class="p-4">{{ $memorial->death_year }}</td>
                        <td class="p-4">
                            {{ $memorial->tag ? $memorial->tag->name : 'No tag' }}
                        </td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.memorial.delete', $memorial->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $memorial->first_name }} {{ $memorial->last_name }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $memorials->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(memorialName) {
            return confirm("Are you sure you want to delete the memorial: " + memorialName + "?");
        }
    </script>
</x-admin-layout>
