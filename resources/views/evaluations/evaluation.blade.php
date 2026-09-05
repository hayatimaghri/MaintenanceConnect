@if ($mission->statut === 'Terminée' && $mission->evaluation)
    <section class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm sm:p-8">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-emerald-700">Retour d'expérience</p>
                <h3 class="mt-1 text-lg font-extrabold text-slate-950">Évaluation de la mission</h3>
            </div>
            <span class="rounded-full bg-white px-3 py-1 text-sm font-bold text-emerald-700">{{ $mission->evaluation->note }}/5</span>
        </div>
        @if ($mission->evaluation->commentaire)
            <p class="mt-5 text-sm leading-7 text-slate-700">{{ $mission->evaluation->commentaire }}</p>
        @endif
    </section>
@elseif (auth()->user()->role === 'Entreprise' && $mission->id_utilisateur === auth()->id() && $mission->statut === 'Terminée')
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-sky-700">Mission terminée</p>
        <h3 class="mt-1 text-lg font-extrabold text-slate-950">Évaluer la mission</h3>
        <p class="mt-2 text-sm text-slate-500">Partagez votre retour sur l'intervention du technicien.</p>
        <form method="POST" action="{{ route('evaluations.store', $mission) }}" class="mt-5 space-y-5">
            @csrf
            <div>
                <label for="note" class="block text-sm font-medium text-slate-700">Note sur 5</label>
                <input id="note" name="note" type="number" min="1" max="5" value="{{ old('note') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-600 focus:ring-sky-600">
                @error('note') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="commentaire" class="block text-sm font-medium text-slate-700">Commentaire</label>
                <textarea id="commentaire" name="commentaire" rows="4" class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-sky-600 focus:ring-sky-600">{{ old('commentaire') }}</textarea>
                @error('commentaire') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-800">Enregistrer l'évaluation</button>
        </form>
    </section>
@endif
