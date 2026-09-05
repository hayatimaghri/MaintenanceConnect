<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-indigo-600">Détail de la mission</p>
                <h2 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $mission->titre }}</h2>
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

                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">{{ $mission->statut }}</span>
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
                        <form id="mission-edit-form" method="POST" action="{{ route('missions.update', $mission) }}" class="mt-6 hidden space-y-5 rounded-xl bg-slate-50 p-5">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="edit-titre" class="block text-sm font-medium text-slate-700">Titre</label>
                                    <input id="edit-titre" name="titre" type="text" value="{{ old('titre', $mission->titre) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="edit-description" class="block text-sm font-medium text-slate-700">Description</label>
                                    <textarea id="edit-description" name="description" rows="4" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $mission->description) }}</textarea>
                                </div>
                                <div>
                                    <label for="edit-localisation" class="block text-sm font-medium text-slate-700">Localisation</label>
                                    <input id="edit-localisation" name="localisation" type="text" value="{{ old('localisation', $mission->localisation) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="edit-budget" class="block text-sm font-medium text-slate-700">Budget (€)</label>
                                    <input id="edit-budget" name="budget" type="number" min="0" step="0.01" value="{{ old('budget', $mission->budget) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="edit-priorite" class="block text-sm font-medium text-slate-700">Priorité</label>
                                    <input id="edit-priorite" name="priorite" type="text" value="{{ old('priorite', $mission->priorite) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="edit-statut" class="block text-sm font-medium text-slate-700">Statut</label>
                                    <input id="edit-statut" name="statut" type="text" value="{{ old('statut', $mission->statut) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="edit-date-publication" class="block text-sm font-medium text-slate-700">Date de publication</label>
                                    <input id="edit-date-publication" name="date_publication" type="datetime-local" value="{{ old('date_publication', $mission->date_publication) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="edit-date-limite" class="block text-sm font-medium text-slate-700">Date limite</label>
                                    <input id="edit-date-limite" name="date_limite" type="datetime-local" value="{{ old('date_limite', $mission->date_limite) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">Enregistrer les modifications</button>
                        </form>
                    @endif
                    <div class="mt-6 grid gap-5 sm:grid-cols-3">
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Budget</p><p class="mt-1 text-lg font-semibold text-slate-900">{{ number_format($mission->budget, 2, ',', ' ') }} €</p></div>
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Publication</p><p class="mt-1 text-sm text-slate-700">{{ $mission->date_publication }}</p></div>
                        <div><p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Date limite</p><p class="mt-1 text-sm text-slate-700">{{ $mission->date_limite }}</p></div>
                    </div>
                    <div class="mt-8 border-t border-slate-100 pt-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Description</h3>
                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $mission->description }}</p>
                    </div>
                </article>

                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Offres reçues</h3>
                            <p class="mt-1 text-sm text-slate-500">{{ $mission->offres->count() }} offre(s) associée(s)</p>
                        </div>
                    </div>
                    <div class="mt-6 space-y-4">
                        @forelse ($mission->offres as $offre)
                            <div class="rounded-xl border border-slate-200 p-5">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div>
                                        <p class="text-base font-semibold text-slate-900">{{ number_format($offre->prix, 2, ',', ' ') }} €</p>
                                        <p class="mt-1 text-sm text-slate-500">Délai : {{ $offre->delai }} jour(s) · {{ $offre->statut }}</p>
                                    </div>
                                    @if (auth()->user()->role === 'Entreprise' && $mission->id_utilisateur === auth()->id())
                                        <form method="POST" action="{{ route('offres.accept', $offre) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Accepter l'offre</button>
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
                <aside class="h-fit rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    @include('offres._form', ['mission' => $mission])
                </aside>
            @endif
        </div>
    </div>
</x-app-layout>
