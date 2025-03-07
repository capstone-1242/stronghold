<div>
    <button class="filter-dropdown-btn" aria-expanded="false">
        Filter by Career
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>              
    </button>

    <div class="filter-dropdown-content">
        <form action="{{ url()->current() }}" method="GET" id="filter-form">
            <div class="grid grid-cols-2 gap-4">
                @foreach ($tags as $tag)
                    <label class="cursor-pointer">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}" class="hidden"
                            @if(in_array($tag->id, $selectedTags)) checked @endif 
                        >
                        <span class="block text-center p-3 bg-gray-500 text-white">
                            {{ $tag->name }}
                        </span>
                    </label>
                @endforeach
            </div>

            <div>
                <input type="submit" id="submit" name="submit" value="Apply Filters" class="bg-gray-400 hover:underline w-full p-3 text-white">
            </div>
        </form>
    </div>
</div>
