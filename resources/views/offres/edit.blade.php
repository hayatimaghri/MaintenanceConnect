<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Gestion des offres</p>
                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Modifier mon offre</h2>
            </div>
            <a href="{{ route('missions.show', $offre->mission) }}" class="text-sm font-semibold text-slate-600 hover:text-sky-700">Retour à la mission</a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('offres.update', $offre) }}" class="mc-panel space-y-5 p-6 sm:p-8">
                @csrf
                @method('PUT')

                <div>
                    <label for="prix" class="mc-label mc-required">Prix (DH)</label>
                    <input id="prix" name="prix" type="number" min="0" step="0.01" value="{{ old('prix', $offre->prix) }}" required class="mc-input mt-2">
                    @error('prix') <p class="mc-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="message" class="mc-label mc-required">Message</label>
                    <textarea id="message" name="message" rows="5" required class="mc-input mt-2">{{ old('message', $offre->message) }}</textarea>
                    @error('message') <p class="mc-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="pre_diagnostic" class="mc-label">Pré-diagnostic</label>
                    <textarea id="pre_diagnostic" name="pre_diagnostic" rows="4" class="mc-input mt-2">{{ old('pre_diagnostic', $offre->pre_diagnostic) }}</textarea>
                    @error('pre_diagnostic') <p class="mc-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="delai" class="mc-label mc-required">Délai (jours)</label>
                    <input id="delai" name="delai" type="number" min="1" value="{{ old('delai', $offre->delai) }}" required class="mc-input mt-2">
                    @error('delai') <p class="mc-error">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="inline-flex min-h-11 w-full items-center justify-center rounded-lg bg-sky-700 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-sky-800">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</x-app-layout>
