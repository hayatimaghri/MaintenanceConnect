@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-lg bg-sky-50 px-3 py-2 text-sm font-semibold leading-5 text-sky-800 transition focus:outline-none'
            : 'inline-flex items-center rounded-lg px-3 py-2 text-sm font-semibold leading-5 text-slate-500 transition hover:bg-slate-50 hover:text-slate-900 focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
