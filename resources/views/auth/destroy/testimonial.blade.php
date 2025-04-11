<x-admin-layout :title="'Delete a Testimonial'">
    <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Delete a Testimonial</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="table-container mt-18">
            <table>
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 text-left">Title</th>
                        <th class="px-6 text-left">Description</th>
                        <th class="px-6 text-left">URL</th>
                        <th class="px-6 text-left">Tag</th>
                        <th class="px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonialVideos as $testimonial)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $testimonial->title }}</td>
                            <td class="px-6 py-4">{{ Str::limit($testimonial->description, 50) }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ $testimonial->url }}" target="_blank" class="text-blue-600">{{ $testimonial->url }}</a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $testimonial->tag ? $testimonial->tag->name : 'No tag' }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('auth.destroy.testimonial.delete', $testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-600 text-white px-6 py-4 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $testimonial->title }}')" />
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
    </section>

    <script>
        function confirmDelete(testimonialTitle) {
            return confirm("Are you sure you want to delete the testimonial: " + testimonialTitle + "?");
        }
    </script>
</x-admin-layout>
