<div class="role-btn-container">
    @foreach ($tags as $tag)
        <a href="{{ url('/testimonials?tags[]=' . $tag->id . '&submit=Apply+Filters') }}" class="role-btn">
            @php
                $componentName = strtolower($tag->name);
            @endphp

            @if (view()->exists("components.$componentName"))
                @component("components.$componentName", ['fill' => 'white', 'stroke' => 'white']) @endcomponent
            @else
                <x-all fill="white"/>
            @endif

            {{ $tag->name }}
        </a>
    @endforeach

    <a href="/testimonials" class="role-btn">
        <x-all fill="white"/>
        All Resources
    </a>
</div>
