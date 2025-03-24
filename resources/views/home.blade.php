<x-layout>
    <div>
        <p>
            <span>"Enter the</span> 
            <span>STRONGHOLD</span> 
            <span>where hope is</span> 
            <span>an anchor."</span>
        </p>
    </div>

    <div>
        {{ Breadcrumbs::render('home') }}
    </div>
    
    <section>
        <h2>Welcome to the STRONGHOLD</h2>
        <p>—a nonprofit, video-based mental health resource for first responders. Here, you'll find support, stories, and strategies to help you stay strong in mind and body. You're not alone—welcome to your safehaven.</p>

        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NOGemNxtQcA?si=ZbrJtHsfiCdlYqlI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
            
        <x-disclaimer/>
    </section>

    <section>
        <h2>Presenter Videos</h2>
        <p>Browse our mental health video collection for support on everything from depression to overall well-being.</p>
    
        @foreach ($presenterVideos as $video)
            <div>
                <h3>{{ $video->title }}</h3>
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
                    <p>Video not available.</p>
                @endif
            </div>
        @endforeach
    </section>
    
    <section>
        <h2>Testimonials</h2>
        <p>Listen to real stories from real first responders who share how they navigated and overcame their mental health battles.</p>

        @foreach($testimonialVideos as $testimonialVideo)
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
    </section>

    <section>
        <h2>Career Based Testimonials</h2>
    
        <div class="grid grid-cols-2 gap-4">
            @foreach($tags as $tag)
                <x-role-button 
                    link="{{ url()->current() . '/testimonials?tags%5B%5D=' . $tag->id . '&submit=Apply+Filters' }}" 
                    icon="{{ $tag->name }}" 
                    altText="{{ $tag->name }}" 
                    title="{{ $tag->name }}" 
                />
            @endforeach
        </div>
    </section>
</x-layout>
