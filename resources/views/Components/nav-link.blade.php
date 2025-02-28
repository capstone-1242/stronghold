@props(['active' => false])

<li>
   <a class="{{ $active ? 'underline font-medium text-white p-2 block' : 'font-medium text-white p-2 block' }}" 
      aria-current="{{ $active ? 'page' : 'false' }}" 
      {{ $attributes }}>
      {{ $slot }}
   </a>
</li>
