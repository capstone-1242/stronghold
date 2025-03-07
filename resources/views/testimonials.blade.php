@php
    use App\Models\Tag;
    $tags = \App\Models\Tag::all(); 
    $selectedTags = request()->input('tags', []);
@endphp

<x-layout>
    <div>
        {{ Breadcrumbs::render('testimonials') }}
    </div>

    <section>
        <h1>Testimonials</h1>
        <p>Listen to real stories from real first responders who share how they navigated and overcame their mental health battles.</p>
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
        @foreach ($testimonialVideos as $testimonialVideo)
            @php
                $videoId = null;
                $youtubePattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                $isMatch = preg_match($youtubePattern, $testimonialVideo->url, $matches);

                if ($isMatch) {
                    $videoId = $matches[1]; // This gets the last part of the video URL which is just the id part
                }
            @endphp

            <div>
                @if ($videoId)
                    <iframe 
                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                        width="100%" 
                        height="315" 
                        title="{{ $testimonialVideo->title }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>
                @else
                    <a href="{{ $testimonialVideo->url }}" target="_blank">Watch {{ $testimonialVideo->title }}</a>
                @endif
            </div>
        @endforeach
    </div>

    <div>
        {{ $testimonialVideos->appends(request()->query())->links('pagination::semantic-ui') }}
    </div>
</x-layout>
