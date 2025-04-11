<x-admin-layout :title="'Memorials'">
    <section class="p-6 md:p-12 container">
        <h2 class="font-semibold text-4xl my-12">Memorials</h2>
    
        <div class="flex flex-wrap justify-evenly my-18 gap-6">
            <a href="{{ route('auth.create.memorial') }}" class="p-6 border-2 border-yellow-400 bg-yellow-200 flex items-center gap-2 rounded-xl hover:bg-yellow-400 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>                 
                <span>Create Memorial</span>
            </a>
    
            <a href="{{ route('auth.edit.memorial') }}" class="p-6 border-2 border-blue-400 bg-blue-200 flex items-center gap-2 rounded-xl hover:bg-blue-400 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>                 
                <span>Edit Memorial</span>
            </a>
    
            <a href="{{ route('auth.destroy.memorial') }}" class="p-6 border-2 border-red-400 flex items-center gap-2 rounded-xl bg-red-200 hover:bg-red-400 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>                  
                <span>Delete Memorial</span>
            </a>
        </div>
    
        <div class="table-container">
            <table>
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 text-left">First Name</th>
                        <th class="px-6 text-left">Last Name</th>
                        <th class="px-6 text-left">Birth Year</th>
                        <th class="px-6 text-left">Death Year</th>
                        <th class="px-6 text-left">Biography</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memorials as $memorial)
                        <tr class="border-b">
                            <td class="p-6">{{ $memorial->first_name }}</td>
                            <td class="p-6">{{ $memorial->last_name }}</td>
                            <td class="p-6">{{ $memorial->birth_year ?: '-' }}</td>
                            <td class="p-6">{{ $memorial->death_year ?: '-' }}</td>
                            <td class="p-6">{{ Str::limit($memorial->biography, 50) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div>
                {{ $memorials->appends(request()->query())->links('pagination::semantic-ui') }}
            </div>
        </div>
    </section>
</x-admin-layout>
