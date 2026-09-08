<x-guest-layout>
    <div class="mb-6 rounded-xl bg-slate-50 p-4 text-sm leading-6 text-slate-600">
        Cette zone est sécurisée. Confirmez votre mot de passe avant de continuer.
    </div>

    <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Mot de passe" />

            <x-text-input id="password" class="mt-2"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button x-bind:disabled="submitting"><span x-show="!submitting">Confirmer</span><span x-cloak x-show="submitting">Confirmation...</span></x-primary-button>
        </div>
    </form>
</x-guest-layout>
