<div class="role-btn-filter-container">
    <form action="{{ url()->current() }}" method="GET" id="filter-form">
        @foreach ($tags as $tag)
            <label class="role-btn cursor-pointer">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}" class="hidden"
                    @if(in_array($tag->id, $selectedTags)) checked @endif
                    onclick="this.form.submit()">
                
                @php
                    $componentName = strtolower($tag->name);
                @endphp

                @if (view()->exists("components.$componentName"))
                    @component("components.$componentName", ['fill' => 'white', 'stroke' => 'white']) @endcomponent
                @else
                    <x-all fill="white"/>
                @endif

                {{ $tag->name }}
            </label>
        @endforeach

        <a href="/testimonials" class="role-btn">
            <x-all fill="white"/>
            All Resources
        </a>
    </form>
</div>
