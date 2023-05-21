@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-3 rounded bg-slate-200 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center p-3 rounded text-sm font-medium leading-5 text-gray-500  hover:text-gray-700  focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
