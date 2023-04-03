@props(['name', 'route', 'isActive'])

@php
    $classes = $isActive ? 
    'inline-block px-8 pb-2 border-b-2 text-primary-400 border-b-primary-400' :
    'inline-block px-8 pb-2 hover:text-primary-400 border-b-2 border-transparent hover:border-b-primary-400';
@endphp

<li>
    <a href="{{ route($route) }}" class="{{ $classes }} transition-colors duration-300" :class="isScroll ? 'text-slate-600' : '' ">
        {{ $name }}
    </a>
</li>