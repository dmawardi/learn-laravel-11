@props(['active' => false, 'type' => 'a'])

@php
    $classes = $active ?? false ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

{{-- attributes inputs all attributes from input: ie. class, href, id, etc. --}}
@if ($type == 'a')
    <a {{ $attributes }} class="{{ $classes }} block rounded-md px-3 py-2 text-base font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
@else
    <button {{ $attributes }} class="{{ $classes }} block rounded-md px-3 py-2 text-base font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</button>
@endif
{{-- <a {{ $attributes }} class="{{ $classes }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a> --}}
