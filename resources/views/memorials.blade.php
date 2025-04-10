@php
    use App\Models\Tag;
    $tags = Tag::all();
    $selectedTags = request()->input('tags', []);
    $allCareersUrl = '/memorials';
@endphp

<x-layout :title="'Memorials'">
   <main class="memorials">
        <div>
            {{ Breadcrumbs::render('memorials') }}
        </div>

        <div class="container pt-48 px-6">
            <section class="heading-section">
                <h2>Memorials</h2>
                <p>Honor the lives of first responders, celebrating their courage and legacy, with a space for remembrance and healing.</p>
                <p class="font-light text-2xl p-12">“Lost but not forgotten”</p>
            </section>

            <section>
                <h3>Filter by Career</h3>
                <x-filter-dropdown :tags="$tags" :selectedTags="$selectedTags" :allCareersUrl="$allCareersUrl"/>
            </section>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-[1.6rem]">
                @foreach($memorials as $memorial)
                    <div class="overflow-hidden relative">
                        @if($memorial->memorialImages->count() > 0)
                            <a href="{{ route('memorial', ['id' => $memorial->id]) }}" class="block w-full">
                                <div class="relative w-full">
                                    <img src="{{ $memorial->memorialImages->first()->filename }}" alt="Memorial Image" class="object-cover w-full h-64 md:h-80 lg:h-96 rounded-sm" loading="lazy">
                                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black to-transparent opacity-50 rounded-sm"></div>
                                </div>
                            </a>
                        @endif

                        <div class="icon absolute bottom-4 left-4 right-4 flex flex-col gap-2 items-baseline">
                            @if($memorial->tag)
                                @php
                                    $componentName = strtolower($memorial->tag->name);
                                @endphp

                                @if (view()->exists("components.$componentName"))
                                    @component("components.$componentName") @endcomponent
                                @else
                                    <x-all/>
                                @endif
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

            <div class="pb-[422px]">
                {{ $memorials->appends(request()->query())->links('pagination::semantic-ui') }}
            </div>
        </div>
   </main>
</x-layout>
