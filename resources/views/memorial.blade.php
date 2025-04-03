<x-layout>
    <div>
        {{ Breadcrumbs::render('memorial', $memorial->id) }}
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="back-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back
        </a>
    </div>

    <section>
        <h2>Memorial</h2>
    
        @if($memorial->memorialImages->count() > 0)
            <div class="gallery-container">
                <div class="main-image-container">
                    @php
                        $mainImage = $memorial->memorialImages->first()->filename;
                        $isCdn = strpos($mainImage, 'http') === 0;
                    @endphp
    
                    <img id="main-image" src="{{ $isCdn ? $mainImage : Storage::url($mainImage) }}" alt="Memorial Image" class="object-cover">
                </div>
    
                <div class="thumbnail-container flex justify-start mt-4 space-x-4">
                    @foreach($memorial->memorialImages as $image)
                        @php
                            $isCdn = strpos($image->filename, 'http') === 0;
                        @endphp
    
                        <div class="thumbnail relative w-24 h-24">
                            <img src="{{ $isCdn ? $image->filename : Storage::url($image->filename) }}" alt="Memorial Thumbnail" class="object-cover cursor-pointer" onclick="changeMainImage('{{ $isCdn ? $image->filename : Storage::url($image->filename) }}')">
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>No images available.</p>
        @endif
    
        <section class="flex items-center justify-between">
            <div>
                <h3>{{ $memorial->first_name }} {{ $memorial->last_name }}</h3>
                <p>
                    {{ \Carbon\Carbon::parse($memorial->birth_year)->format('Y') }} - 
                    {{ \Carbon\Carbon::parse($memorial->death_year)->format('Y') }}
                </p>
            </div>
    
            @if($memorial->tag)
                <div class="w-12 h-12">
                    <img src="{{ asset('images/' . $memorial->tag->name . '.svg') }}" alt="{{ $memorial->tag->name }} icon" class="w-full h-full object-contain">
                </div>
            @else
                <p>No Icon Available</p>
            @endif
        </section>
    
        <p>{{ $memorial->biography }}</p>
    </section>

    <div class="flex justify-between">
        @if($previousMemorial)
            <a href="{{ route('memorial', ['id' => $previousMemorial->id]) }}" class="hover:underline">Previous Memorial</a>
        @else
            <span></span>
        @endif

        @if($nextMemorial)
            <a href="{{ route('memorial', ['id' => $nextMemorial->id]) }}" class="hover:underline">Next Memorial</a>
        @else
            <span></span>
        @endif
    </div>
</x-layout>

<script>
    function changeMainImage(imageUrl) {
        document.getElementById("main-image").src = imageUrl;
    }
</script>
