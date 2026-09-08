<x-app-layout>
    <x-slot name="header">
        <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Espace entreprise</p><h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Publier une mission</h2></div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800" role="alert">
                    <p class="font-bold">Vérifiez les informations saisies.</p>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('missions.store') }}" class="mc-panel space-y-7 p-6 sm:p-8">
                @csrf
                <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-5">
                    <div><p class="text-[11px] font-bold uppercase tracking-[0.16em] text-sky-700">Nouvelle publication</p><h3 class="mt-1 text-xl font-extrabold text-slate-950">Définir votre mission</h3><p class="mt-1.5 text-sm text-slate-500">Les champs marqués d’un astérisque sont obligatoires.</p></div>
                    <span class="hidden rounded-full bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-700 sm:inline-flex">Entreprise</span>
                </div>

                <x-form-section title="Informations de la mission" description="Présentez clairement le besoin d’intervention aux techniciens.">
                    <div class="space-y-5">
                        <div><label for="titre" class="mc-label mc-required">Titre</label><input id="titre" name="titre" type="text" value="{{ old('titre') }}" required placeholder="Ex. Maintenance préventive d’une ligne de production" class="mc-input mt-2">@error('titre')<p class="mc-error">{{ $message }}</p>@enderror</div>
                        <x-form-textarea name="description" label="Description" :value="old('description')" required rows="5" placeholder="Décrivez les équipements, le contexte et le résultat attendu." help="Une description précise facilite la réception d’offres adaptées." />
                    </div>
                </x-form-section>

                <x-form-section title="Détails" description="Ajoutez les informations pratiques et le niveau de priorité.">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div><label for="localisation" class="mc-label mc-required">Localisation</label><input id="localisation" name="localisation" type="text" value="{{ old('localisation') }}" required placeholder="Ville ou site industriel" class="mc-input mt-2">@error('localisation')<p class="mc-error">{{ $message }}</p>@enderror</div>
                        <div><label for="budget" class="mc-label mc-required">Budget (DH)</label><div class="relative mt-2"><input id="budget" name="budget" type="number" min="0" step="0.01" value="{{ old('budget') }}" required placeholder="4500" class="mc-input pr-12"><span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-xs font-bold text-slate-400">DH</span></div>@error('budget')<p class="mc-error">{{ $message }}</p>@enderror</div>
                        <x-form-select name="priorite" label="Priorité" :options="['' => 'Choisir une priorité', 'Faible' => 'Faible', 'Moyenne' => 'Moyenne', 'Haute' => 'Haute']" required />
                        <x-form-select name="statut" label="Statut" :options="['Publiée' => 'Publiée']" value="Publiée" required />
                    </div>
                </x-form-section>

                <x-form-section title="Planning" description="Indiquez les dates de publication et de clôture de la mission.">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div><label for="date_publication" class="mc-label mc-required">Date de publication</label><input id="date_publication" name="date_publication" type="datetime-local" value="{{ old('date_publication') }}" required class="mc-input mt-2">@error('date_publication')<p class="mc-error">{{ $message }}</p>@enderror</div>
                        <div><label for="date_limite" class="mc-label mc-required">Date limite</label><input id="date_limite" name="date_limite" type="datetime-local" value="{{ old('date_limite') }}" required class="mc-input mt-2">@error('date_limite')<p class="mc-error">{{ $message }}</p>@enderror</div>
                    </div>
                </x-form-section>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('missions.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Annuler</a>
                    <button type="submit" :disabled="submitting" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-sky-700 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60"><span x-show="!submitting">Publier la mission</span><span x-cloak x-show="submitting">Publication en cours...</span></button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
