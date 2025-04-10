@php
    use App\Models\Video;

    $searchQuery = request('search', '');

    $videos = Video::with('author')
        ->where(function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $searchQuery . '%')
                  ->orWhereHas('author', function($authorQuery) use ($searchQuery) {
                      $authorQuery->where('first_name', 'like', '%' . $searchQuery . '%')
                                  ->orWhere('last_name', 'like', '%' . $searchQuery . '%');
                  });
        })
        ->get();
@endphp

<x-layout :title="'Insightful Videos'">
    <div>
        {{ Breadcrumbs::render('videos') }}
    </div>

    <section class="videos container pt-24 pb-[422px]">
        <h2>Insightful Videos</h2>

        <form action="{{ url()->current() }}" method="GET" class="flex">
            <label for="search" class="hidden">Search</label>
            <input type="text" name="search" placeholder="Search..." id="search" value="{{ request('search', '') }}">

            <button type="submit" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>

        @if($videos->isEmpty())
            <p>No videos found matching your search criteria.</p>
        @else
            <div>
                @foreach ($videos->groupBy('author_id') as $authorId => $authorVideos)
                    @php
                        $author = $authorVideos->first()->author;
                    @endphp

                    <section class="author-info">
                        <div>
                            <h3>{{ $author->first_name }} {{ $author->last_name }}</h3>
                            <a href="{{ route('author.videos', ['author_id' => $authorId]) }}" class="see-all-link">See All</a>
                        </div>
                        <p>{{ $author->description }}</p>

                        <div class="author-videos">
                            @foreach ($authorVideos as $video)
                                @php
                                    $videoId = null;
                                    $youtubePattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                                    $isMatch = preg_match($youtubePattern, $video->url, $matches);
                                    if ($isMatch) {
                                        $videoId = $matches[1];
                                    }
                                @endphp

                                <div class="video-container">
                                    <div class="video-wrapper">
                                        <a href="{{ route('video', ['video' => $video->id]) }}">
                                            @if ($videoId)
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ $videoId }}?controls=0"
                                                    width="100%"
                                                    height="auto"
                                                    title="{{ $video->title }}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin"
                                                    allowfullscreen>
                                                </iframe>
                                            @else
                                                <a href="{{ $video->url }}" target="_blank">Watch {{ $video->title }}</a>
                                            @endif
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('video', ['video' => $video->id]) }}">
                                            {{ $video->title }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
