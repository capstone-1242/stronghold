<x-layout>
    <div class="banner">
        <p>
            <span>Enter the</span> 
            <span>STRONGHOLD</span> 
            <span>where <strong>hope</strong> is an anchor.</span>
        </p>

        <div>
            <p>Scroll to Enter</p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
    
    <section class="welcome">
        <h2><span>Welcome </span>to the <span>STRONGHOLD</span></h2>
        <p>— a nonprofit, video-based mental health resource for first responders. Here, you’ll find support, stories, and strategies to help you stay strong in mind and body. You’re not alone—welcome to your safehaven.</p>

        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/NOGemNxtQcA?si=ZbrJtHsfiCdlYqlI" title="YouTube video player"
            width="100%"
            height="auto"
             frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>        
            
        <x-disclaimer/>
    </section>

    <section class="home-videos">
        <div>
            <h2>Explore Insightful Videos</h2>
            <p>Browse our mental health video collection for support on everything from depression to overall well-being.</p>
        </div>
    
        @foreach ($presenterVideos as $video)
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
                src="https://www.youtube.com/embed/{{ $videoId }}" 
                width="100%"
                height="auto"
                title="{{ $video->title }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>
                @else
                    <p>Video not available.</p>
                @endif

                <h3>{{ $video->title }}</h3>
            </div>
        @endforeach

        <a href="/videos" :active="request()->is('videos')" class="button">Explore More Videos</a>
    </section>
    
    <section class="home-testimonial">
        <h2>Our Testimonials of Triumph</h2>

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
                        height="auto" 
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

    <section class="home-testimonial">
        <h2>Career-Based Testimonials</h2>
    
        <div>
            <x-role-button/>
        </div>
    </section>
</x-layout>
