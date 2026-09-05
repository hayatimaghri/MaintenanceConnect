<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-indigo-600">MaintenanceConnect</p>
                <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Missions disponibles</h2>
            </div>
            @if (in_array(auth()->user()->role, ['Admin', 'Entreprise']))
                <a href="{{ route('missions.create') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
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

            @if ($missions->isEmpty())
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900">Aucune mission disponible</h3>
                    <p class="mt-2 text-sm text-slate-500">Les missions publiées apparaîtront ici.</p>
                </div>
            @else
                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($missions as $mission)
                        <article class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <div class="flex items-start justify-between gap-4">
                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">{{ $mission->statut }}</span>
                                <span class="text-sm font-semibold text-slate-900">{{ number_format($mission->budget, 2, ',', ' ') }} €</span>
                            </div>
                            <h3 class="mt-5 text-lg font-semibold text-slate-900">{{ $mission->titre }}</h3>
                            <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $mission->description }}</p>
                            <div class="mt-5 space-y-2 text-sm text-slate-500">
                                <p><span class="font-medium text-slate-700">Localisation :</span> {{ $mission->localisation }}</p>
                                <p><span class="font-medium text-slate-700">Date limite :</span> {{ $mission->date_limite }}</p>
                            </div>
                            <a href="{{ route('missions.show', $mission) }}" class="mt-6 inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-indigo-600 hover:text-indigo-700">Voir la mission</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
