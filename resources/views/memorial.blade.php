<x-layout :title="$memorial->first_name . ' ' . $memorial->last_name">
    <main class="memorials">
        <div class="memorials backdrop-blur-md">
            {{ Breadcrumbs::render('memorial', $memorial->id) }}
        </div>

        <div class="container">
            <a href="{{ url()->previous() }}" class="back-button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back
            </a>
        </div>

        <section class="memorial-single container">
            <h2>Memorial</h2>

            <div class="lg:flex lg:gap-6">
                @if($memorial->memorialImages->count() > 0)
                    <div class="gallery-container lg:min-w-6xl">
                        <div class="main-image-container ">
                            @php
                                $mainImage = $memorial->memorialImages->first()->filename;
                                $isCdn = strpos($mainImage, 'http') === 0;
                            @endphp

                            <img id="main-image" src="{{ $isCdn ? $mainImage : Storage::url($mainImage) }}" alt="Memorial Image" class="object-cover">
                        </div>

                        <div class="thumbnail-container flex justify-start mt-4">
                            @foreach($memorial->memorialImages as $image)
                                @php
                                    $isCdn = strpos($image->filename, 'http') === 0;
                                @endphp

                                <div class="thumbnail relative w-40 h-40 pl-[1.6rem]">
                                    <img src="{{ $isCdn ? $image->filename : Storage::url($image->filename) }}" alt="Memorial Thumbnail" class="object-cover cursor-pointer rounded-sm" onclick="changeMainImage('{{ $isCdn ? $image->filename : Storage::url($image->filename) }}')" loading="lazy">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>No images available.</p>
                @endif

               <div class="info bg-blue-900/15 rounded-md backdrop-blur-xl p-8">
                    <section class="flex justify-between">
                        <div>
                            <h3 class="text-5xl! lg:text-7xl! font-bold! uppercase">{{ $memorial->first_name }} {{ $memorial->last_name }}</h3>
                            <p>
                                @if($memorial->birth_year && $memorial->death_year)
                                    {{ \Carbon\Carbon::parse($memorial->birth_year)->format('Y') }} -
                                    {{ \Carbon\Carbon::parse($memorial->death_year)->format('Y') }}
                                @endif
                            </p>
                        </div>

                        <div class="icon">
                            @if($memorial->tag)
                                @php
                                    $componentName = strtolower($memorial->tag->name);
                                @endphp

                                @if (view()->exists("components.$componentName"))
                                    @component("components.$componentName") @endcomponent
                                @else
                                    <x-all/>
                                @endif
                            @else
                                <p>No Icon Available</p>
                            @endif
                        </div>
                    </section>

                    <div class="divider"></div>
                    <p>{{ $memorial->biography }}</p>
               </div>
            </div>
        </section>

        <div class="video-pag flex justify-around p-[1.6rem] pb-[422px] container">
            @if($previousMemorial)
                <a href="{{ route('memorial', ['id' => $previousMemorial->id]) }}" class="pagination-link flex items-center">
                    <svg class="pagination-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19L8 12L15 5" stroke="#0072C2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Previous
                </a>
            @endif

            @if($nextMemorial)
                <a href="{{ route('memorial', ['id' => $nextMemorial->id]) }}" class="pagination-link flex items-center">
                    Next
                    <svg class="pagination-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L16 12L9 19" stroke="#0072C2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            @endif
        </div>
    </main>
</x-layout>

<script>
    function changeMainImage(imageUrl) {
        document.getElementById("main-image").src = imageUrl;
    }
</script>
