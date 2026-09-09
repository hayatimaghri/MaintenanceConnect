<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">MaintenanceConnect</p>
                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Missions disponibles</h2>
            </div>
            @if (auth()->user()->role === 'Entreprise')
                <a href="{{ route('missions.create') }}" class="inline-flex items-center justify-center rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-sky-800">
                    Publier une mission
                </a>
            @endif
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            @if (session('status'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-800">{{ session('error') }}</div>
            @endif

            <form method="GET" action="{{ route('missions.index') }}" class="mc-panel mb-6 flex flex-col gap-3 p-4 sm:flex-row">
                <label for="search" class="sr-only">Rechercher une mission</label>
                <input id="search" name="search" type="search" value="{{ $search ?? '' }}" placeholder="Rechercher par spécialité, titre ou localisation" class="mc-input flex-1">
                <button type="submit" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white hover:bg-sky-800">Rechercher</button>
                @if (!empty($search))
                    <a href="{{ route('missions.index') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:border-sky-600 hover:text-sky-700">Effacer</a>
                @endif
            </form>

            @if ($missions->isEmpty())
                <div class="mc-panel border-dashed px-6 py-16 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">Aucune mission disponible</h3>
                    <p class="mt-2 text-sm text-slate-500">Les missions publiées apparaîtront ici.</p>
                </div>
            @else
                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($missions as $mission)
                        <article class="mc-panel flex flex-col p-6 transition hover:-translate-y-0.5 hover:border-sky-200 hover:shadow-md">
                            <div class="flex items-start justify-between gap-4">
                                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-bold text-sky-700">{{ $mission->statut }}</span>
                                <span class="text-sm font-semibold text-slate-900">{{ number_format($mission->budget, 2, ',', ' ') }} DH</span>
                            </div>
                            <h3 class="mt-5 text-lg font-extrabold text-slate-950">{{ $mission->titre }}</h3>
                            <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $mission->description }}</p>
                            <div class="mt-5 space-y-2 text-sm text-slate-500">
                                <p><span class="font-medium text-slate-700">Localisation :</span> {{ $mission->localisation }}</p>
                                <p><span class="font-medium text-slate-700">Date limite :</span> {{ $mission->date_limite }}</p>
                            </div>
                            <a href="{{ route('missions.show', $mission) }}" class="mt-6 inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition hover:border-sky-600 hover:text-sky-700">Voir la mission</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
