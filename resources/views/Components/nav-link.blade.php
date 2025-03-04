@props(['active' => false])

<li>
   <a aria-current="{{ $active ? 'page' : 'false' }}" 
      {{ $attributes }}>
      {{ $slot }}
   </a>
</li>
