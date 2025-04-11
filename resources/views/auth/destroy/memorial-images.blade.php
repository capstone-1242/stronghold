<x-admin-layout :title="'Delete a Memorial Image'">
    <section class="p-6 md:p-12 container">
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

                    <div class="flex flex-wrap gap-6 py-2">
                        @foreach ($images as $image)
                            @php
                                $isCdn = strpos($image->filename, 'http') === 0;
                                $imageSrc = $isCdn ? $image->filename : Storage::url($image->filename);
                            @endphp

                            <div class="mb-6 flex flex-col items-center gap-4 w-32">
                                <img src="{{ $imageSrc }}" alt="{{ $image->description }}" class="object-cover rounded-md w-full h-32" width="80" height="80">

                                <form action="{{ route('auth.destroy.memorial-images.delete', ['id' => $image->id]) }}" method="POST" onsubmit="return confirmDelete('{{ $memorial->first_name }} {{ $memorial->last_name }}', '{{ $image->description }}');" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="bg-red-600 text-white px-6 py-2 rounded-xl hover:bg-red-700 cursor-pointer w-full">
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
        function confirmDelete(memorialName, imageDescription) {
            return confirm("Are you sure you want to delete the image: " + imageDescription + " for the memorial: " + memorialName + "?");
        }
    </script>
</x-admin-layout>
