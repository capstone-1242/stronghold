<x-admin-layout>
    <h2>Delete a Presenter</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-6">
        <table class="min-w-full text-left table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">First Name</th>
                    <th class="p-4">Last Name</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr class="border-b">
                        <td class="p-4">{{ $author->first_name }}</td>
                        <td class="p-4">{{ $author->last_name }}</td>
                        <td class="p-4">{{ Str::limit($author->description, 50) }}</td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.presenters.delete', $author->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $author->first_name }} {{ $author->last_name }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $authors->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(authorName) {
            return confirm("Are you sure you want to delete the author: " + authorName + "?");
        }
    </script>
</x-admin-layout>
