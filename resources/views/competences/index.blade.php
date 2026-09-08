<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Profil professionnel</p>
            <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Mes compétences</h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mc-panel mx-auto max-w-4xl p-6 sm:p-8">
            @if (session('status'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-4 sm:grid-cols-2">
                @forelse ($competences as $competence)
                    <article class="flex items-start justify-between gap-4 rounded-xl border border-slate-200 bg-slate-50/70 p-5 transition hover:border-sky-200">
                        <div>
                            <p class="text-base font-semibold text-slate-900">{{ $competence->nom }}</p>
                            @if ($competence->description)
                                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $competence->description }}</p>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('competences.destroy', $competence) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" aria-label="Retirer {{ $competence->nom }}" class="rounded-lg border border-rose-200 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-50">Retirer</button>
                        </form>
                    </article>
                @empty
                    <p class="sm:col-span-2 rounded-xl bg-slate-50 px-4 py-5 text-sm text-slate-500">Aucune compétence associée à votre profil.</p>
                @endforelse
            </div>
            <div class="mt-8 border-t border-slate-100 pt-6">
                <h3 class="text-lg font-semibold text-slate-900">Ajouter une compétence existante</h3>
                <p class="mt-1 text-sm text-slate-500">Ajoutez une compétence déjà présente dans le catalogue MaintenanceConnect.</p>
                <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('competences.store') }}" class="mt-4 flex flex-col gap-3 sm:flex-row">
                    @csrf
                    <label for="id_competence" class="sr-only">Compétence</label>
                    <select id="id_competence" name="id_competence" required class="mc-input block flex-1">
                        <option value="">Choisir une compétence</option>
                        @foreach ($competencesDisponibles as $competenceDisponible)
                            <option value="{{ $competenceDisponible->id_competence }}">{{ $competenceDisponible->nom }}</option>
                        @endforeach
                    </select>
                    <button type="submit" :disabled="submitting" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-800 disabled:cursor-not-allowed disabled:opacity-60"><span x-show="!submitting">Ajouter</span><span x-cloak x-show="submitting">Ajout...</span></button>
                </form>
                @error('id_competence') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>
</x-app-layout>
