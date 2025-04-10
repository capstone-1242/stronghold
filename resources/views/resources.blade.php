<x-layout :title="'Resources'">
    <main>
        <div>
            {{ Breadcrumbs::render('resources') }}
        </div>

        <section class="resources container pt-24 pb-[422px]">
            <h2>Local Resources</h2>

            <div class="lg:max-w-6xl">
                <div class="bg-white rounded-md p-6 text-black font-bold mb-8">
                    <p>If you're thinking about suicide, text 988</p>
                </div>

                <p class="mb-6">This resource section is designed to provide content to support mental health. Please access the topics you believe will apply to your situation.</p>

                <div class="max-w-[450px]"><x-disclaimer/></div>
            </div>

            <div class="lg:grid lg:grid-cols-2 gap-8">
                <section class="bg-blue-900/35 p-8 my-8 rounded-md">
                    <h3 class="lg:text-5xl! mt-6">Canada Help Lines</h3>

                    <div class="divider mb-12"></div>

                    @if ($phoneResources->isEmpty())
                        <p>No help lines available.</p>
                    @else
                        <ul>
                            @foreach ($phoneResources as $resource)
                                <x-phone-resource name="{{ $resource->title }}" number="{{ $resource->number }}" />
                                <div class="divider"></div>
                            @endforeach
                        </ul>
                    @endif
                </section>

                <section class="bg-blue-900/35 p-8 my-8 rounded-md">
                    <h3 class="lg:text-5xl! mt-6 mb-8">Community Resources</h3>

                    <p>Click one of the links below to get redirected to more specific resources.</p>

                    <div class="divider mb-12"></div>

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
            </div>
        </section>
    </main>
</x-layout>
