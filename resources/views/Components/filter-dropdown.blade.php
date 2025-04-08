<div class="role-btn-filter-container">
    <form action="{{ url()->current() }}" method="GET" id="filter-form" class="grid grid-cols-2 gap-4 lg:flex lg:gap-4 lg:wrap p-4">
        @foreach ($tags as $tag)
            <label class="role-btn military cursor-pointer {{ strtolower($tag->name) }}">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}" class="hidden"
                    @if(in_array($tag->id, $selectedTags)) checked @endif
                    onclick="this.form.submit()">

                @php
                    $componentName = strtolower($tag->name);
                @endphp

                @if (view()->exists("components.$componentName"))
                    @component("components.$componentName") @endcomponent
                @else
                    <x-all/>
                @endif

                {{ $tag->name }}
            </label>
        @endforeach

        <a href="/testimonials" class="role-btn all">
            <x-all/>
            All Careers
        </a>
    </form>
</div>
