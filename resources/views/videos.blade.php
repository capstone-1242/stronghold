@php
    use App\Models\Video;

    $videos = \App\Models\Video::query()
        ->where('title', 'like', '%' . $searchQuery . '%')
        ->orWhere('description', 'like', '%' . $searchQuery . '%')
        ->get();
@endphp

<x-layout>
    <div>
        {{ Breadcrumbs::render('videos') }}
    </div>

    <h2>All Videos</h2>

    <form action="{{ url()->current() }}" method="GET" class="flex">
        <label for="search" class="hidden">Search</label>
        <input type="text" name="search" placeholder="Search..." id="search" value="{{ request('search', '') }}">

        <input type="submit" name="submit" value="Submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>          
    </form>    

    @foreach ($videos->groupBy('author_id') as $authorId => $authorVideos)
        @php
            $author = $authorVideos->first()->author;
        @endphp

        <section class="mb-8">
            <div class="flex">
                <h3>{{ $author->first_name }} {{ $author->last_name }}</h3>
                <a href="{{ route('author.videos', ['author_id' => $authorId]) }}">See All</a>
            </div>
            <p>{{ $author->description }}</p>

            <div class="flex overflow-x-auto space-x-6">
                @foreach ($authorVideos as $video)
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
                            <a href="{{ route('video', ['video' => $video->id]) }}">
                                @if ($videoId)
                                    <iframe 
                                        src="https://www.youtube.com/embed/{{ $videoId }}?controls=0" 
                                        width="auto" 
                                        height="315" 
                                        title="{{ $video->title }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin" 
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <a href="{{ $video->url }}" target="_blank" class="text-blue-500 hover:underline">Watch {{ $video->title }}</a>
                                @endif
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('video', ['video' => $video->id]) }}">
                                {{ $video->title }}
                            </a>
                            <p title="{{ $video->description }}">{{ Str::limit($video->description, 50) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
</x-layout>
