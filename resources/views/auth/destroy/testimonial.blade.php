<x-admin-layout>
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
                    <th class="p-4">Tag</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonialVideos as $testimonial)
                    <tr class="border-b">
                        <td class="p-4">{{ $testimonial->title }}</td>
                        <td class="p-4">{{ Str::limit($testimonial->description, 50) }}</td>
                        <td class="p-4">
                            <a href="{{ $testimonial->url }}" target="_blank" class="text-blue-500">{{ $testimonial->url }}</a>
                        </td>
                        <td class="p-4">
                            {{ $testimonial->tag ? $testimonial->tag->name : 'No tag' }}
                        </td>
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.testimonial.delete', $testimonial->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $testimonial->title }}')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $testimonialVideos->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </div>

    <script>
        function confirmDelete(testimonialTitle) {
            return confirm("Are you sure you want to delete the testimonial: " + testimonialTitle + "?");
        }
    </script>
</x-admin-layout>
