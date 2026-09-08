<x-guest-layout>
    <div class="mb-6 rounded-xl bg-slate-50 p-4 text-sm leading-6 text-slate-600">
        Indiquez votre adresse email et nous vous enverrons un lien pour choisir un nouveau mot de passe.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Adresse email" />
            <x-text-input id="email" class="mt-2" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button x-bind:disabled="submitting"><span x-show="!submitting">Envoyer le lien de réinitialisation</span><span x-cloak x-show="submitting">Envoi en cours...</span></x-primary-button>
        </div>
    </form>
</x-guest-layout>
