@props(['name', 'route', 'isActive'])

@php
    $classes = $isActive ? 
    'inline-block px-4 pb-2 text-primary-400 ' :
    'inline-block px-4 pb-2';
@endphp

<li>
    <a href="{{ route($route) }}" class="{{ $classes }} transition-colors duration-300 border-b w-full" :class="isScroll ? 'text-slate-600' : '' ">
        {{ $name }}
    </a>
</li>