@props([
    'compact' => false,
    'dark' => false,
])

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-3']) }}>
    {{-- Icône : fichier logo officiel --}}
    <img
        src="{{ asset('images/logo.png') }}"
        alt="Logo MaintenanceConnect"
        class="h-10 w-auto shrink-0 object-contain"
    >

    {{-- Texte : nom + sous-titre --}}
    <span class="flex flex-col leading-tight">
        <span class="{{ $dark ? 'text-white' : 'text-black' }} text-base font-bold tracking-tight">
            MaintenanceConnect
        </span>

        @if (!$compact)
            <span class="{{ $dark ? 'text-slate-400' : 'text-slate-500' }} text-[11px] font-medium">
                Maintenance industrielle
            </span>
        @endif
    </span>
</span>