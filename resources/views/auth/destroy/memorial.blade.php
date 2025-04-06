<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Delete a Memorial</h2>
        
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p- mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="table-container mt-18">
            <table>
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 text-left">First Name</th>
                        <th class="px-6 text-left">Last Name</th>
                        <th class="px-6 text-left">Biography</th>
                        <th class="px-6 text-left">Birth Year</th>
                        <th class="px-6 text-left">Death Year</th>
                        <th class="px-6 text-left">Tag</th>
                        <th class="px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memorials as $memorial)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $memorial->first_name }}</td>
                            <td class="px-6 py-4">{{ $memorial->last_name }}</td>
                            <td class="px-6 py-4">{{ Str::limit($memorial->biography, 50) }}</td>
                            <td class="px-6 py-4">{{ $memorial->birth_year ?: '-' }}</td>
                            <td class="px-6 py-4">{{ $memorial->death_year ?: '-' }}</td>
                            <td class="px-6 py-4">
                                {{ $memorial->tag ? $memorial->tag->name : 'No tag' }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('auth.destroy.memorial.delete', $memorial->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-500 text-white px-6 py-4 rounded-xl hover:bg-red-700 cursor-pointer" onclick="return confirmDelete('{{ $memorial->first_name }} {{ $memorial->last_name }}')" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div>
                {{ $memorials->appends(request()->query())->links('pagination::semantic-ui') }}
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(memorialName) {
            return confirm("Are you sure you want to delete the memorial: " + memorialName + "?");
        }
    </script>
</x-admin-layout>
