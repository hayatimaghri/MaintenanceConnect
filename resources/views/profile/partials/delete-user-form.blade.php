<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Supprimer le compte
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            La suppression du compte est définitive. Vérifiez vos informations avant de continuer.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Supprimer le compte</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-slate-950">
                Confirmer la suppression du compte
            </h2>

            <p class="mt-1 text-sm text-slate-600">
                Saisissez votre mot de passe pour confirmer cette action définitive.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Mot de passe" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 w-full"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Supprimer définitivement
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
