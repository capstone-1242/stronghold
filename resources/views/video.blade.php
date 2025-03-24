<x-layout>
    <div>
        {{ Breadcrumbs::render('video-single', $video->id) }}
    </div>

    <div class="flex">
        <a href="{{ url()->previous() }}">Back</a>
        <h2>{{ $video->title }}</h2>
    </div>

    <div>
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
                <iframe 
                    src="https://www.youtube.com/embed/{{ $videoId }}?controls=1" 
                    width="100%" 
                    height="315" 
                    title="{{ $video->title }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            @else
                <a href="{{ $video->url }}" target="_blank">Watch {{ $video->title }}</a>
            @endif
        </div>

        <div>
            <h3>Presented by {{ $author->first_name }} {{ $author->last_name }}</h3>
            <p>{{ $author->description }}</p>
        </div>

        <div>
            <h3>Description</h3>
            <p>{{ $video->description }}</p>
        </div>

        <div class="flex justify-between">
            @if ($previousVideo)
                <a href="{{ route('video', ['video' => $previousVideo->id]) }}">Previous Video</a>
            @endif

            @if ($nextVideo)
                <a href="{{ route('video', ['video' => $nextVideo->id]) }}">Next Video</a>
            @endif
        </div>

        <div>
            <h3>More Videos by {{ $author->first_name }} {{ $author->last_name }}</h3>
            <div class="flex flex-wrap gap-6">
                @foreach ($author->videos->take(6) as $relatedVideo)
                    <div>
                        @php
                            $relatedVideoId = null;
                            $isMatch = preg_match($youtubePattern, $relatedVideo->url, $matches);
                            if ($isMatch) {
                                $relatedVideoId = $matches[1];
                            }
                        @endphp

                        <div>
                            @if ($relatedVideoId)
                                <iframe 
                                    src="https://www.youtube.com/embed/{{ $relatedVideoId }}?controls=0" 
                                    width="auto" 
                                    height="200" 
                                    title="{{ $relatedVideo->title }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" 
                                    allowfullscreen>
                                </iframe>
                            @else
                                <a href="{{ $relatedVideo->url }}" target="_blank">Watch {{ $relatedVideo->title }}</a>
                            @endif
                        </div>
                        <div>
                            <h3>{{ $relatedVideo->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
