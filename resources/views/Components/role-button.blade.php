<div class="role-btn-container grid grid-cols-2 gap-4 lg:flex lg:gap-4">
    @foreach ($tags as $tag)
        <a href="{{ url('/testimonials?tags[]=' . $tag->id . '&submit=Apply+Filters') }}" class="role-btn cursor-pointer {{ strtolower($tag->name) }}">
            @php
                $componentName = strtolower($tag->name);
            @endphp

            @if (view()->exists("components.$componentName"))
                @component("components.$componentName") @endcomponent
            @else
                <x-all/>
            @endif

            {{ $tag->name }}
        </a>
    @endforeach

    <a href="/testimonials" class="role-btn cursor-pointer all">
        <x-all/>
        All Resources
    </a>
</div>
