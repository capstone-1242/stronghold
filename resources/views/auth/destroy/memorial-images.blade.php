<x-admin-layout>
    <section class="p-6 md:p-12">
        <h2 class="font-semibold text-4xl my-12">Delete a Memorial Image</h2>
    
        @if(session('success'))
            <div class="bg-green-700 text-white text-center rounded-xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="mt-18">
            @foreach ($memorialImages->groupBy('memorial_id') as $memorialId => $images)
                @php
                    $memorial = $images->first()->memorial;
                @endphp
    
                <div class="mb-6 h-80">
                    <h3 class="text-2xl font-bold">{{ $memorial->first_name }} {{ $memorial->last_name }}</h3>
                    <hr class="my-2">
    
                    <div class="flex space-x-4 py-2">
                        @foreach ($images as $image)
                            <div class="mb-6 flex flex-col items-center gap-6 w-32 h-32">
                                <img src="{{ asset('storage/' . $image->filename) }}" alt="{{ $image->description }}" class="object-cover rounded-md">
    
                                <form action="{{ route('auth.destroy.memorial-images.delete', ['id' => $image->id]) }}" method="POST" onsubmit="return confirmDelete('{{ $memorial->first_name }} {{ $memorial->last_name }}', '{{ $image->filename }}');" class="mt-2 w-full">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-500 text-white px-6 py-4 rounded-xl hover:bg-red-700 cursor-pointer w-full">
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
    
            <div>
                {{ $memorialImages->appends(request()->query())->links('pagination::semantic-ui') }}
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(memorialName, imageName) {
            return confirm("Are you sure you want to delete the image: " + imageName + " for the memorial: " + memorialName + "?");
        }
    </script>
</x-admin-layout>
