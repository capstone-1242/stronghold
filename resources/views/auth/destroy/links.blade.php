<x-admin-layout :title="'Delete a Link'">
   <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Delete a Link</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p- mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="table-container mt-18">
            <table>
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 text-left">Title</th>
                        <th class="px-6 text-left">URL</th>
                        <th class="px-6 text-left">Presenter</th>
                        <th class="px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $link->title }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ $link->url }}" target="_blank" class="text-blue-500">{{ $link->url }}</a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $link->author->first_name }} {{ $link->author->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('auth.destroy.links.delete', $link->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-500 text-white px-6 py-4 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $link->title }}')" />
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
   </section>

    <script>
        function confirmDelete(linkTitle) {
            return confirm("Are you sure you want to delete the link: " + linkTitle + "?");
        }
    </script>
</x-admin-layout>
