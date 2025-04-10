<x-layout :title="$author->first_name . ' ' . $author->last_name . ' Videos'">
    <div>
        {{ Breadcrumbs::render('video-author', $author->id) }}
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="back-button flex items-center gap-2 text-blue-700 hover:underline">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back
        </a>
    </div>

    <section class="author-single container py-12 sm:px-[1.6rem]">
        <h2 class="text-3xl font-bold mb-8">{{ $author->first_name }} {{ $author->last_name }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($videos as $video)
                @php
                    $videoId = null;
                    $youtubePattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                    $isMatch = preg_match($youtubePattern, $video->url, $matches);

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
                            title="{{ $video->title }}">
                        </lite-youtube>
                    @else
                        <a href="{{ $video->url }}" target="_blank">
                            Watch {{ $video->title }}
                        </a>
                    @endif

                    <div>
                        <h3>
                            <a href="{{ route('video', ['video' => $video->id]) }}" class="hover:underline">
                                {{ $video->title }}
                            </a>
                        </h3>
                        <p>{{ $video->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="container pb-16">
        {{ $videos->appends(request()->query())->links('pagination::semantic-ui') }}
    </div>
</x-layout>
