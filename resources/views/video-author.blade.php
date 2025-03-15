<x-layout>
    <div>
        {{ Breadcrumbs::render('video-author', $author->id) }}
    </div>

    <h1>{{ $author->first_name }} {{ $author->last_name }} - All Videos</h1>

    <p>{{ $author->description }}</p>

    <div>
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
                <div>
                    @if ($videoId)
                        <iframe 
                            src="https://www.youtube.com/embed/{{ $videoId }}" 
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
                    <a href="{{ route('video', ['video' => $video->id]) }}">
                        <h3>{{ $video->title }}</h3>
                    </a>
                    <p title="{{ $video->description }}">{{ ($video->description) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $videos->appends(request()->query())->links('pagination::semantic-ui') }}
    </div>
</x-layout>
