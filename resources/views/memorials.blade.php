@php
    use App\Models\Tag;
    $tags = \App\Models\Tag::all(); 
    $selectedTags = request()->input('tags', []);
@endphp

<x-layout>
    <div>
        {{ Breadcrumbs::render('memorials') }}
    </div>

    <section>
        <h2>Memorials</h2>
        <p>Honor the lives of first responders, celebrating their courage and legacy, with a space for remembrance and healing.</p>
        <p>“Lost but not forgotten”</p>
    </section>

    <div>
        <x-filter-dropdown :tags="$tags" :selectedTags="$selectedTags" />
        <x-selected-filters :tags="$tags" :selectedTags="$selectedTags" />

        @if ($selectedTags)
            <div>
                <a href="{{ url()->current() }}" class="bg-gray-500 text-white p-3">Clear all filters</a>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($memorials as $memorial)
            <div class="overflow-hidden relative">
                @if($memorial->memorialImages->count() > 0)
                    <a href="{{ route('memorial', ['id' => $memorial->id]) }}" class="block w-full">
                        <div class="relative w-full">
                            <img src="{{ $memorial->memorialImages->first()->filename }}" alt="Memorial Image" class="object-cover w-full h-64 md:h-80 lg:h-96">
                        </div>
                    </a>
                @endif

                <div class="absolute bottom-4 left-4 right-4 flex flex-col items-baseline">
                    @if($memorial->tag)
                        <div class="mb-2">
                            <img src="{{ asset('images/' . $memorial->tag->name . '.svg') }}" alt="{{ $memorial->tag->name }} icon" class="w-12 h-12 object-contain">
                        </div>
                    @else
                        <p>No Icon Available</p>
                    @endif

                    <a href="{{ route('memorial', ['id' => $memorial->id]) }}">
                        {{ $memorial->first_name }} {{ $memorial->last_name }}
                    </a>                       
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $memorials->appends(request()->query())->links('pagination::semantic-ui') }}
    </div>
</x-layout>
