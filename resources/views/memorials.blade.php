<x-layout>
    <div>
        {{ Breadcrumbs::render('memorials') }}
    </div>

    <section>
        <h1>Memorials</h1>
        <p>Honor the lives of first responders, celebrating their courage and legacy, with a space for remembrance and healing.</p>
    </section>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($memorials as $memorial)
            <div class="overflow-hidden relative">
                @foreach($memorial->memorialImages as $image)
                    <a href="{{ route('memorial', ['id' => $memorial->id]) }}" class="block w-full">
                        <div class="relative w-full">
                            <img src="{{ $image->filename }}" alt="Memorial Image" class="object-cover w-full h-64 md:h-80 lg:h-96">
                        </div>
                    </a>
                @endforeach
                
                @if($memorial->tag)
                    <div class="absolute top-2 right-2 w-12 h-12">
                        <img src="{{ asset('images/' . $memorial->tag->name . '.svg') }}" alt="{{ $memorial->tag->name }} icon" class="w-full h-full object-contain">
                    </div>
                @else
                    <p>No Icon Available</p>
                @endif

                <div class="absolute bottom-0 left-0 p-4 w-full bg-gradient-to-t from-black via-transparent to-transparent">
                    <h2>
                        <a href="{{ route('memorial', ['id' => $memorial->id]) }}">
                            {{ $memorial->first_name }} {{ $memorial->last_name }}
                        </a>                      
                    </h2>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $memorials->links('pagination::semantic-ui') }}
    </div>
</x-layout>
