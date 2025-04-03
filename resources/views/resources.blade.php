<x-layout>
    <div>
        {{ Breadcrumbs::render('resources') }}
    </div>

    <section class="resources">
        <h2>Local Resources</h2>

        <div>
            <p>If you're thinking about suicide, text 988</p>
        </div>

        <p>This resource section is designed to provide content to support mental health. Please access the topics you believe will apply to your situation.</p>
        
        <x-disclaimer/>

        <section>
            <h3>Canada Help Lines</h3>
        
            @if ($phoneResources->isEmpty())
                <p>No help lines available.</p>
            @else
                <ul>
                    @foreach ($phoneResources as $resource)
                        <x-phone-resource name="{{ $resource->title }}" number="{{ $resource->number }}" />
                    @endforeach
                </ul>
            @endif
        </section>

        <section>
            <h3>Community Resources</h3>

            @if ($linkResources->isEmpty())
                <p>No community resources available.</p>
            @else
                <ul>
                    @foreach ($linkResources as $resource)
                        <x-link-item title="{{ $resource->title }}" url="{{ $resource->url }}" />
                    @endforeach
                </ul>
            @endif
        </section>
    </section>
</x-layout>