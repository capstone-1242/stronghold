<x-admin-layout>
    <h2>Delete a Video</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-6">
        <table class="min-w-full text-left table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Title</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">URL</th>
                    <th class="p-4">Author</th>
                    <th class="p-4">Actions</th>
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
                            <form action="{{ route('auth.destroy.video.delete', $video->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $video->title }}')" />
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
