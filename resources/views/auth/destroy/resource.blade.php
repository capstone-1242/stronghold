<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Delete a Resource</h2>
        
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
                        <th class="p-4 text-left">Phone Number</th>
                        <th class="p-4 text-left">Tag</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                        <tr class="border-b">
                            <td class="p-4">{{ $resource->title }}</td>
                            <td class="p-4">{{ Str::limit($resource->description, 50) }}</td>
                            <td class="p-4">
                                <a href="{{ $resource->url }}" target="_blank" class="text-blue-500">{{ $resource->url ?? '-' }}</a>
                            </td>
                            <td class="p-4">{{ $resource->number ?? '-' }}</td> 
                            <td class="p-4">
                                {{ $resource->tag ? $resource->tag->name : '-' }}
                            </td>
                            <td class="p-6">
                                <form action="{{ route('auth.destroy.resource.delete', $resource->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-500 text-white px-6 py-4 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $resource->title }}')" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div>
                {{ $resources->appends(request()->query())->links('pagination::semantic-ui') }}
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(resourceTitle) {
            return confirm("Are you sure you want to delete the resource: " + resourceTitle + "?");
        }
    </script>
</x-admin-layout>
