<section>

    <header>
        <h2 class="text-lg font-bold text-slate-900">
            Informations personnelles
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Mettez à jour votre nom et votre adresse email.
        </p>
    </header>


    <form
        x-data="{ submitting: false }"
        @submit="submitting = true"
        method="post"
        action="{{ route('profile.update') }}"
        class="mt-6 space-y-6"
    >

        @csrf
        @method('patch')


        {{-- Nom --}}
        <div>

            <x-input-label
                for="name"
                value="Nom complet"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full rounded-xl border-slate-300 focus:border-[#0f4c81] focus:ring-[#0f4c81]"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>


        {{-- Email --}}
        <div>

            <x-input-label
                for="email"
                value="Adresse email"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full rounded-xl border-slate-300 focus:border-[#0f4c81] focus:ring-[#0f4c81]"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

        </div>


        {{-- Bouton --}}
        <div class="flex items-center gap-4">

            <x-primary-button
                x-bind:disabled="submitting"
                class="rounded-xl bg-[#0f4c81] px-5 py-2.5 font-semibold hover:bg-[#0b3b65] focus:bg-[#0b3b65] active:bg-[#0b3b65]"
            >
                <span x-show="!submitting">
                    Enregistrer
                </span>

                <span x-cloak x-show="submitting">
                    Enregistrement...
                </span>
            </x-primary-button>


            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-600"
                >
                    Modifications enregistrées.
                </p>

            @endif

        </div>

    </form>

</section>