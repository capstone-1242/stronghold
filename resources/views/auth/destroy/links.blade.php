<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Delete a Link</h2>

    @if(session('success'))
        <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">URL</th>
                    <th class="p-4 text-left">Author</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    <tr class="border-b">
                        <td class="p-4">{{ $link->title }}</td>
                        <td class="p-4">
                            <a href="{{ $link->url }}" target="_blank" class="text-blue-500">{{ $link->url }}</a>
                        </td>
                        <td class="p-4">
                            {{ $link->author->first_name }} {{ $link->author->last_name }}
                        </td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.links.delete', $link->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $link->title }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $links->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(linkTitle) {
            return confirm("Are you sure you want to delete the link: " + linkTitle + "?");
        }
    </script>
</x-admin-layout>
