<x-layout :title="$author->first_name . ' ' . $author->last_name . ' Videos'">
    <div>
        {{ Breadcrumbs::render('video-author', $author->id) }}
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="back-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back
        </a>
    </div>

    <section class="author-single">
        <h2>{{ $author->first_name }} {{ $author->last_name }}</h2>
    
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
                    <div>
                        <h3>
                            <a href="{{ route('video', ['video' => $video->id]) }}">
                                {{ $video->title }}
                            </a>
                        </h3>
                        <p title="{{ $video->description }}">{{ ($video->description) }}</p>
                    </div>
            @endforeach
        </div>
    </section>

    <div>
        {{ $videos->appends(request()->query())->links('pagination::semantic-ui') }}
    </div>
</x-layout>