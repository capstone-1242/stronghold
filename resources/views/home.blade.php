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
        <h1>Welcome to your STRONGHOLD</h1>
        <p>—a nonprofit, video-based mental health resource for first responders. Here, you’ll find support, stories, and strategies to help you stay strong in mind and body. You’re not alone—welcome to your safehaven.</p>

        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NOGemNxtQcA?si=ZbrJtHsfiCdlYqlI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
            
        <x-disclaimer/>
    </section>

    <section>
        <h2>Presenter Videos</h2>
        <p>Browse our mental health video collection for support on everything from depression to overall well-being.</p>
    
        <x-video-embed videoId="Ya1HfNY7898" videoParams="39z-T-9vQr2IXVgw" title="Signs of a Panic Attack" description="Panic attacks are often described as feeling like dying followed by intense fear that it will happen again. Learn about symptoms and how to manage future panic attacks." />
        <x-video-embed videoId="ivyLkTcvanQ" videoParams="PpZUnxxBW_gASgMF" title="What is OCD?" description="People with OCD experience obsessions, which are specific thoughts that are intense and intrusive. Treatment options may include ERP and medication." />
        <x-video-embed videoId="2KXtlIX_yUs" videoParams="1Ri6cI6jZIOiE18S" title="What is PTSD?" description="Almost everyone lives through something traumatic at some point in life. Most people have a lot of distress right after a trauma happens but begin to feel better over time. For other people, the distress continues, and they begin to have symptoms that really impact their lives." />
        <x-video-embed videoId="ydJoPkmDEos" videoParams="jccg1TVgA-oM4J7Y" title="Having Trouble Sleeping" description="Although poor sleep is common, difficulty sleeping can be an indication of insomnia. Sleep issues can be a symptom of a mental health condition or medical condition." />
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
        <h2>Resources for Your Role</h2>
    
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
