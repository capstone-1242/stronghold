<a href="{{ $link }}" class="bg-{{ $color }}-300 text-white p-4 rounded text-center flex flex-col items-center">
    <img src="{{ URL::to('/') }}/images/{{ $icon }}" alt="{{ $altText }} icon">
    {{ $title }}
</a>
