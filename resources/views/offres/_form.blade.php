@if (in_array($mission->statut, ['Publiée', 'En attente']) && auth()->user()->role === 'Technicien') <div> <p class="text-xs font-bold uppercase tracking-[0.16em] text-sky-700">Proposition technique</p> <h3 class="mt-1 text-lg font-extrabold text-slate-950">Envoyer une offre</h3> <p class="mt-1 text-sm leading-6 text-slate-500">
Présentez votre proposition pour cette mission. </p>
    <form x-data="{ submitting: false }"
          @submit="submitting = true"
          method="POST"
          action="{{ route('offres.store') }}"
          class="mt-6 space-y-5">

        @csrf

        <input type="hidden" name="id_mission" value="{{ $mission->id_mission }}">

        <div>
            <label for="prix" class="mc-label mc-required">Prix (DH)</label>
            <input id="prix"
                   name="prix"
                   type="number"
                   min="0"
                   step="0.01"
                   value="{{ old('prix') }}"
                   required
                   placeholder="4500"
                   class="mc-input mt-2">
            @error('prix')
                <p class="mc-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="message" class="mc-label mc-required">Message</label>
            <textarea id="message"
                      name="message"
                      rows="4"
                      required
                      placeholder="Présentez votre approche et vos disponibilités."
                      class="mc-input mt-2">{{ old('message') }}</textarea>
            @error('message')
                <p class="mc-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="pre_diagnostic" class="mc-label">Pré-diagnostic</label>
            <textarea id="pre_diagnostic"
                      name="pre_diagnostic"
                      rows="3"
                      class="mc-input mt-2">{{ old('pre_diagnostic') }}</textarea>
            @error('pre_diagnostic')
                <p class="mc-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-1">
            <div>
                <label for="delai" class="mc-label mc-required">Délai (jours)</label>
                <input id="delai"
                       name="delai"
                       type="number"
                       min="1"
                       value="{{ old('delai') }}"
                       required
                       class="mc-input mt-2">
                @error('delai')
                    <p class="mc-error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_offre" class="mc-label mc-required">Date de l'offre</label>
                <input id="date_offre"
                       name="date_offre"
                       type="datetime-local"
                       value="{{ old('date_offre', now()->format('Y-m-d\\TH:i')) }}"
                       required
                       class="mc-input mt-2">
                @error('date_offre')
                    <p class="mc-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <input type="hidden" name="statut" value="en_attente">

        <button type="submit"
                :disabled="submitting"
                class="inline-flex min-h-11 w-full items-center justify-center rounded-lg bg-sky-700 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-sky-800 disabled:cursor-not-allowed disabled:opacity-60">

            <span x-show="!submitting">Envoyer mon offre</span>
            <span x-cloak x-show="submitting">Envoi en cours...</span>
        </button>
    </form>
</div>
@endif
