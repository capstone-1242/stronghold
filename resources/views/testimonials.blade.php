@php
    use App\Models\Tag;
    $tags = \App\Models\Tag::all();
    $selectedTags = request()->input('tags', []);
    $allCareersUrl = '/testimonials';
@endphp

<x-layout :title="'Testimonials'">
    <main class="testimonials">
        <div>
            {{ Breadcrumbs::render('testimonials') }}
        </div>

        <section class="heading-section container pt-24 px-[1.6rem]">
            <h2>Testimonials</h2>
            <p>Listen to real stories from real first responders who share how they navigated and overcame their mental health battles.</p>
        </section>

        <section class="container py-12 px-[1.6rem]">
            <h3>Filter by Career</h3>
            <x-filter-dropdown :tags="$tags" :selectedTags="$selectedTags" :allCareersUrl="$allCareersUrl"/>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 container px-[1.6rem]">
            @foreach ($testimonialVideos as $testimonialVideo)
                @php
                    $videoId = null;
                    $youtubePattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                    $isMatch = preg_match($youtubePattern, $testimonialVideo->url, $matches);

                    if ($isMatch) {
                        $videoId = $matches[1];
                    }
                @endphp

                <div>
                    @if ($videoId)
                        <lite-youtube 
                            videoid="{{ $videoId }}" 
                            width="100%" 
                            height="auto"  
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            title="{{ $testimonialVideo->title }}">
                        </lite-youtube>
                    @else
                        <a href="{{ $testimonialVideo->url }}" target="_blank">Watch {{ $testimonialVideo->title }}</a>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="pb-[422px]">
            {{ $testimonialVideos->appends(request()->query())->links('pagination::semantic-ui') }}
        </div>
    </main>
</x-layout>
