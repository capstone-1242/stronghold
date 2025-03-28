<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Delete a Presenter</h2>

    <p class="my-8"><strong>Note:</strong> Deleting a presenter will also remove all associated videos and links from the database and the website.</p>
    
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
                    <th class="p-4 text-left">Description</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr class="border-b">
                        <td class="p-4">{{ $author->first_name }}</td>
                        <td class="p-4">{{ $author->last_name }}</td>
                        <td class="p-4">{{ Str::limit($author->description, 50) }}</td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.presenters.delete', $author->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $author->first_name }} {{ $author->last_name }}')" />
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
