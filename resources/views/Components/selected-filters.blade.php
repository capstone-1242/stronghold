<div id="selected-filters" class="flex flex-wrap gap-2">
    @foreach ($selectedTags as $tagId)
        @php
            $selectedTag = $tags->firstWhere('id', $tagId);
        @endphp
        
        @if ($selectedTag)
            <div class="bg-gray-500 text-white p-1 flex mb-2">
                {{ $selectedTag->name }}
                
                <form action="{{ url()->current() }}" method="GET">
                    @foreach ($selectedTags as $existingTagId)
                        @if ($existingTagId !== $tagId)
                            <input type="hidden" name="tags[]" value="{{ $existingTagId }}" id="{{ $existingTagId }}">
                        @endif
                    @endforeach
                    
                    <button type="submit" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    @endforeach
</div>
