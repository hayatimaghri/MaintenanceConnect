<x-guest-layout>
    <div class="mb-6 rounded-xl bg-slate-50 p-4 text-sm leading-6 text-slate-600">
        Merci pour votre inscription. Vérifiez votre adresse email en cliquant sur le lien envoyé.
    </div>

    @if (session('status') == 'verification-link-sent')
            <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
                Un nouveau lien de vérification a été envoyé à votre adresse email.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button x-bind:disabled="submitting"><span x-show="!submitting">Renvoyer l’email de vérification</span><span x-cloak x-show="submitting">Envoi en cours...</span></x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Se déconnecter
            </button>
        </form>
    </div>
</x-guest-layout>
