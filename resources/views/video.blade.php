<x-layout :title="$video->title . ' by ' . $author->first_name . ' ' . $author->last_name">
    <div>
        {{ Breadcrumbs::render('video-single', $video->id) }}
    </div>

    <div class="single-video-top">
        <div>
            <a href="{{ url()->previous() }}" class="back-button flex items-center gap-2 text-blue-700 hover:underline">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back
            </a>
        </div>

        <h2>{{ $video->title }}</h2>
    </div>

    <div class="single-video">
        <div>
            @php
                $videoId = null;
                $youtubePattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                $isMatch = preg_match($youtubePattern, $video->url, $matches);
                if ($isMatch) {
                    $videoId = $matches[1];
                }
            @endphp

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
                <a href="{{ $video->url }}" target="_blank">Watch {{ $video->title }}</a>
            @endif
        </div>

        <div>
            <h3><span>Presented by:</span> {{ $author->first_name }} {{ $author->last_name }}</h3>
            <p>{{ $author->description }}</p>
        </div>

        <div class="video-pag">
            @if ($previousVideo)
                <a href="{{ route('video', ['video' => $previousVideo->id]) }}" class="pagination-link flex items-center gap-2">
                    <svg class="pagination-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Previous
                </a>
            @endif
        
            @if ($nextVideo)
                <a href="{{ route('video', ['video' => $nextVideo->id]) }}" class="pagination-link flex items-center gap-2">
                    Next
                    <svg class="pagination-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L16 12L9 19" stroke="#0072C2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                </a>
            @endif
        </div>        

        <div>
            <h3>Resources by {{ $author->first_name }} {{ $author->last_name }}</h3>
            <ul class="author-links">
                @foreach ($author->links as $link)
                    <li>
                        <a href="{{ $link->url }}" target="_blank" class="underline">{{ $link->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>More from {{ $author->first_name }} {{ $author->last_name }}</h3>
            <div class="related-videos-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($author->videos->take(4) as $relatedVideo)
                    @php
                        $relatedVideoId = null;
                        $isMatch = preg_match($youtubePattern, $relatedVideo->url, $matches);
                        if ($isMatch) {
                            $relatedVideoId = $matches[1];
                        }
                    @endphp

                    <div class="space-y-4">
                        @if ($relatedVideoId)
                            <lite-youtube 
                                videoid="{{ $relatedVideoId }}" 
                                width="100%" 
                                height="auto" 
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen
                                title="{{ $relatedVideo->title }}">
                            </lite-youtube>
                        @else
                            <a href="{{ $relatedVideo->url }}" target="_blank">Watch {{ $relatedVideo->title }}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
