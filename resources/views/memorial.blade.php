<x-layout>
    <div>
        {{ Breadcrumbs::render('memorial', $memorial->id) }}
    </div>

    <div>
        <a href="{{ route('memorials') }}" class="hover:underline">Back to Memorials</a>
    </div>

    <h2>Memorial</h2>

    @if($memorial->memorialImages->count() > 0)
        <div>
            @foreach($memorial->memorialImages as $image)
                <div class="relative w-[50rem]">
                    <img src="{{ Storage::url($image->filename) }}" alt="Memorial Image" class="object-cover">

                    @if($memorial->tag)
                        <div class="absolute top-0 right-0 mt-2 mr-2 w-12 h-12">
                            <img src="{{ asset('images/' . $memorial->tag->name . '.svg') }}" alt="{{ $memorial->tag->name }} icon" class="w-full h-full object-contain">
                        </div>
                    @else
                        <p>No Icon Available</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p>No images available.</p>
    @endif

    <section>
        <h3>{{ $memorial->first_name }} {{ $memorial->last_name }}</h3>
    
        <p>
            {{ \Carbon\Carbon::parse($memorial->birth_year)->format('Y') }} - 
            {{ \Carbon\Carbon::parse($memorial->death_year)->format('Y') }}
        </p>
    
        <p>{{ $memorial->biography }}</p>
    </section>

    <div class="flex justify-between">
        @if($previousMemorial)
            <a href="{{ route('memorial', ['id' => $previousMemorial->id]) }}" class="hover:underline">Previous Memorial</a>
        @else
            <span></span>
        @endif

        @if($nextMemorial)
            <a href="{{ route('memorial', ['id' => $nextMemorial->id]) }}" class="hover:underline">Next Memorial</a>
        @else
            <span></span>
        @endif
    </div>
</x-layout>
