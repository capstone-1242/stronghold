<x-layout>
    <div>
        <p>
            <span>"Enter the</span> 
            <span>STRONGHOLD</span> 
            <span>where hope is</span> 
            <span>an anchor."</span>
        </p>
    </div>

    <div class="bg-white border-y">
        {{ Breadcrumbs::render('home') }}
    </div>
    
    <section>
        <x-slot:heading>Welcome to your STRONGHOLD</x-slot:heading>
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

        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/c21QZnQtGqo?si=PZD_LxU44sae7wTN&amp;start=35" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/c21QZnQtGqo?si=PZD_LxU44sae7wTN&amp;start=35" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/c21QZnQtGqo?si=PZD_LxU44sae7wTN&amp;start=35" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>

    <section>
        <h2>Resources for Your Role</h2>

        <div class="grid grid-cols-2 gap-4 mt-4 max-w-md">
            <x-role-button link="/police" color="blue" icon="police.svg" altText="police" title="Police" />
            <x-role-button link="/military" color="red" icon="military.svg" altText="military" title="Military" />
            <x-role-button link="/firefighter" color="green" icon="firefighter.svg" altText="firefighter" title="Firefighter" />
            <x-role-button link="/paramedic" color="teal" icon="paramedic.svg" altText="paramedic" title="Paramedic" />
            <x-role-button link="/hospital" color="yellow" icon="hospital.svg" altText="hospital" title="Hospital" />
            <x-role-button link="/dispatcher" color="indigo" icon="dispatcher.svg" altText="dispatcher" title="Dispatcher" />
            <x-role-button link="/families" color="purple" icon="families.svg" altText="families" title="Families" />
            <x-role-button link="/all" color="orange" icon="all.svg" altText="heart" title="All" />
        </div>
    </section>          
</x-layout>