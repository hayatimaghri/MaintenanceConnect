@props([
    'eyebrow' => null,
    'title',
    'description' => null,
])

<section {{ $attributes->merge(['class' => 'mc-form-section']) }}>
    <div class="mb-5">
        @if ($eyebrow)
            <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-sky-700">{{ $eyebrow }}</p>
        @endif
        <h3 class="mt-1 text-lg font-extrabold text-slate-950">{{ $title }}</h3>
        @if ($description)
            <p class="mt-1.5 max-w-2xl text-sm leading-6 text-slate-500">{{ $description }}</p>
        @endif
    </div>

    {{ $slot }}
</section>
