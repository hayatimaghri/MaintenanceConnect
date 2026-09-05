<div>
    <h3 class="text-lg font-semibold text-slate-900">Envoyer une offre</h3>
    <p class="mt-1 text-sm leading-6 text-slate-500">Présentez votre proposition pour cette mission.</p>

    <form method="POST" action="{{ route('offres.store') }}" class="mt-6 space-y-5">
        @csrf
        <input type="hidden" name="id_mission" value="{{ $mission->id_mission }}">

        <div>
            <label for="prix" class="block text-sm font-medium text-slate-700">Prix (€)</label>
            <input id="prix" name="prix" type="number" min="0" step="0.01" value="{{ old('prix') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('prix') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-slate-700">Message</label>
            <textarea id="message" name="message" rows="4" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('message') }}</textarea>
            @error('message') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="pre_diagnostic" class="block text-sm font-medium text-slate-700">Pré-diagnostic</label>
            <textarea id="pre_diagnostic" name="pre_diagnostic" rows="3" class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('pre_diagnostic') }}</textarea>
            @error('pre_diagnostic') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-1">
            <div>
                <label for="delai" class="block text-sm font-medium text-slate-700">Délai (jours)</label>
                <input id="delai" name="delai" type="number" min="1" value="{{ old('delai') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('delai') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="date_offre" class="block text-sm font-medium text-slate-700">Date de l'offre</label>
                <input id="date_offre" name="date_offre" type="datetime-local" value="{{ old('date_offre', now()->format('Y-m-d\\TH:i')) }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('date_offre') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <input type="hidden" name="statut" value="en_attente">
        <button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">Envoyer mon offre</button>
    </form>
</div>
