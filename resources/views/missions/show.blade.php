<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Détail de la mission</p>
                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">{{ $mission->titre }}</h2>
            </div>
            <a href="{{ route('missions.index') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-700">Retour aux missions</a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2">
                @if (session('status'))
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('status') }}</div>
                @endif
                @if (session('error'))
                    <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-800">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <article class="mc-panel p-6 sm:p-8">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-bold text-sky-700">{{ $mission->statut }}</span>
                        <span class="text-sm text-slate-500">{{ $mission->localisation }}</span>
                    </div>
                    @if (auth()->user()->role === 'Admin' || (auth()->user()->role === 'Entreprise' && $mission->id_utilisateur === auth()->id()))
                        <div class="mt-6 flex flex-wrap gap-3 border-b border-slate-100 pb-6">
                            <button type="button" onclick="document.getElementById('mission-edit-form').classList.toggle('hidden')" class="rounded-lg border border-indigo-200 px-3 py-2 text-sm font-semibold text-indigo-700 hover:bg-indigo-50">Modifier la mission</button>
                            <form method="POST" action="{{ route('missions.destroy', $mission) }}" onsubmit="return confirm('Voulez-vous supprimer cette mission ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg border border-rose-200 px-3 py-2 text-sm font-semibold text-rose-700 hover:bg-rose-50">Supprimer la mission</button>
                            </form>
                        </div>
                        <form id="mission-edit-form" x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('missions.update', $mission) }}" class="mc-panel mt-6 hidden space-y-6 bg-slate-50 p-5 sm:p-6">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="edit-titre" class="mc-label mc-required">Titre</label>
                                    <input id="edit-titre" name="titre" type="text" value="{{ old('titre', $mission->titre) }}" required class="mc-input mt-2">
                                    @error('titre')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="edit-description" class="mc-label mc-required">Description</label>
                                    <textarea id="edit-description" name="description" rows="4" required class="mc-input mt-2">{{ old('description', $mission->description) }}</textarea>
                                    @error('description')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-localisation" class="mc-label mc-required">Localisation</label>
                                    <input id="edit-localisation" name="localisation" type="text" value="{{ old('localisation', $mission->localisation) }}" required class="mc-input mt-2">
                                    @error('localisation')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-budget" class="mc-label mc-required">Budget (DH)</label>
                                    <input id="edit-budget" name="budget" type="number" min="0" step="0.01" value="{{ old('budget', $mission->budget) }}" required class="mc-input mt-2">
                                    @error('budget')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-priorite" class="mc-label mc-required">Priorité</label>
                                    <select id="edit-priorite" name="priorite" required class="mc-input mt-2"><option value="Faible" @selected(old('priorite', $mission->priorite) === 'Faible')>Faible</option><option value="Moyenne" @selected(old('priorite', $mission->priorite) === 'Moyenne')>Moyenne</option><option value="Haute" @selected(old('priorite', $mission->priorite) === 'Haute')>Haute</option></select>
                                    @error('priorite')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-statut" class="mc-label mc-required">Statut</label>
                                    <select id="edit-statut" name="statut" required class="mc-input mt-2"><option value="Publiée" @selected(old('statut', $mission->statut) === 'Publiée')>Publiée</option><option value="En attente" @selected(old('statut', $mission->statut) === 'En attente')>En attente</option><option value="Affectée" @selected(old('statut', $mission->statut) === 'Affectée')>Affectée</option><option value="En cours" @selected(old('statut', $mission->statut) === 'En cours')>En cours</option><option value="Terminée" @selected(old('statut', $mission->statut) === 'Terminée')>Terminée</option><option value="Annulée" @selected(old('statut', $mission->statut) === 'Annulée')>Annulée</option></select>
                                    @error('statut')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-date-publication" class="mc-label mc-required">Date de publication</label>
                                    <input id="edit-date-publication" name="date_publication" type="datetime-local" value="{{ old('date_publication', $mission->date_publication) }}" required class="mc-input mt-2">
                                    @error('date_publication')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="edit-date-limite" class="mc-label mc-required">Date limite</label>
                                    <input id="edit-date-limite" name="date_limite" type="datetime-local" value="{{ old('date_limite', $mission->date_limite) }}" required class="mc-input mt-2">
                                    @error('date_limite')<p class="mc-error">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <button type="submit" :disabled="submitting" class="inline-flex min-h-11 items-center rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-800 disabled:cursor-not-allowed disabled:opacity-60"><span x-show="!submitting">Enregistrer les modifications</span><span x-cloak x-show="submitting">Enregistrement...</span></button>
                        </form>
                    @endif
                    <div class="mt-6 grid gap-5 sm:grid-cols-3">
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Budget</p><p class="mt-1 text-lg font-semibold text-slate-900">{{ number_format($mission->budget, 2, ',', ' ') }} DH</p></div>
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Publication</p><p class="mt-1 text-sm text-slate-700">{{ $mission->date_publication }}</p></div>
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Date limite</p><p class="mt-1 text-sm text-slate-700">{{ $mission->date_limite }}</p></div>
                    </div>
                    <div class="mt-8 border-t border-slate-100 pt-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Description</h3>
                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $mission->description }}</p>
                    </div>
                </article>

                <section class="mc-panel p-6 sm:p-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Offres reçues</h3>
                            <p class="mt-1 text-sm text-slate-500">{{ $mission->offres->count() }} offre(s) associée(s)</p>
                        </div>
                    </div>
                    <div class="mt-6 space-y-4">
                        @forelse ($mission->offres as $offre)
                            <div class="rounded-xl border border-slate-200 bg-slate-50/50 p-5">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div>
                                        <p class="text-base font-semibold text-slate-900">{{ number_format($offre->prix, 2, ',', ' ') }} DH</p>
                                        <p class="mt-1 text-sm text-slate-500">Délai : {{ $offre->delai }} jour(s) · {{ $offre->statut }}</p>
                                    </div>
                                    @if (auth()->user()->role === 'Entreprise' && $mission->id_utilisateur === auth()->id())
                                        <form method="POST" action="{{ route('offres.accept', $offre) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="rounded-lg bg-emerald-600 px-3 py-2 text-sm font-bold text-white hover:bg-emerald-700">Accepter l'offre</button>
                                        </form>
                                    @endif
                                </div>
                                <p class="mt-4 text-sm leading-6 text-slate-600">{{ $offre->message }}</p>
                                @if ($offre->pre_diagnostic)
                                    <div class="mt-4 rounded-lg bg-slate-50 p-3 text-sm text-slate-600"><span class="font-semibold text-slate-700">Pré-diagnostic :</span> {{ $offre->pre_diagnostic }}</div>
                                @endif
                            </div>
                        @empty
                            <p class="rounded-xl bg-slate-50 px-4 py-5 text-sm text-slate-500">Aucune offre n'a encore été envoyée.</p>
                        @endforelse
                    </div>
                </section>

                @include('evaluations.evaluation', ['mission' => $mission])
            </div>

            @if (auth()->user()->role === 'Technicien')
                    <aside class="mc-panel h-fit p-6 sm:p-8">
                    @include('offres._form', ['mission' => $mission])
                </aside>
            @endif
        </div>
    </div>
</x-app-layout>
