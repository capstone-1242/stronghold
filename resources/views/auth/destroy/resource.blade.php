<x-admin-layout>
    <h2>Delete a Resource</h2>
    
    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
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
                    <th class="p-4">Phone Number</th>
                    <th class="p-4">Tag</th>
                    <th class="p-4">Actions</th>
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
                        <td class="p-4">
                            <form action="{{ route('auth.destroy.resource.delete', $resource->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 cursor-pointer" onclick="return confirmDelete('{{ $resource->title }}')" />
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

    <script>
        function confirmDelete(resourceTitle) {
            return confirm("Are you sure you want to delete the resource: " + resourceTitle + "?");
        }
    </script>
</x-admin-layout>
