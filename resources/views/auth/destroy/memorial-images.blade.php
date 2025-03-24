<x-admin-layout>
    <h2>Delete a Memorial Image</h2>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-6">
        @foreach ($memorialImages->groupBy('memorial_id') as $memorialId => $images)
            @php
                $memorial = $images->first()->memorial;
            @endphp

            <div class="mb-6">
                <h3 class="text-2xl font-bold">{{ $memorial->first_name }} {{ $memorial->last_name }}</h3>
                <hr class="my-2">

                <div class="flex flex-wrap space-x-4">
                    @foreach ($images as $image)
                        <div class="w-32 h-32 mb-4 flex flex-col items-center">
                            <img src="{{ asset('storage/' . $image->filename) }}" alt="{{ $image->description }}" class="w-full h-full object-cover rounded-md">

                            <form action="{{ route('auth.destroy.memorial-images.delete', ['id' => $image->id]) }}" method="POST" onsubmit="return confirmDelete('{{ $memorial->first_name }} {{ $memorial->last_name }}', '{{ $image->filename }}');" class="mt-2 w-full">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 w-full">
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

    <script>
        function confirmDelete(memorialName, imageName) {
            return confirm("Are you sure you want to delete the image: " + imageName + " for the memorial: " + memorialName + "?");
        }
    </script>
</x-admin-layout>
