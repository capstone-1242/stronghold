<x-admin-layout>
    <h2 class="font-semibold text-4xl my-12">Delete a Video</h2>
    
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
                    <th class="p-4 text-left">Description</th>
                    <th class="p-4 text-left">URL</th>
                    <th class="p-4 text-left">Author</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                    <tr class="border-b">
                        <td class="p-4">{{ $video->title }}</td>
                        <td class="p-4">{{ Str::limit($video->description, 50) }}</td>
                        <td class="p-4">
                            <a href="{{ $video->url }}" target="_blank" class="text-blue-500">{{ $video->url }}</a>
                        </td>
                        <td class="p-4">
                            {{ $video->author->first_name }} {{ $video->author->last_name }}
                        </td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.video.delete', $video->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $video->title }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $videos->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(videoTitle) {
            return confirm("Are you sure you want to delete the video: " + videoTitle + "?");
        }
    </script>
</x-admin-layout>
