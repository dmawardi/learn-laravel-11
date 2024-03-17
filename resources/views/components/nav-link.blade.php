@props(['active' => false])

@php
    $classes = $active ?? false ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

{{-- attributes inputs all attributes from input: ie. class, href, id, etc. --}}
<a {{ $attributes }} class="{{ $classes }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
