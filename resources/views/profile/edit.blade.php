<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0f4c81]">
                Compte
            </p>

            <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">
                Mon profil
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Gérez vos informations personnelles et la sécurité de votre compte.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-5xl space-y-6">

            {{-- Informations du profil --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 bg-slate-50/70 px-5 py-5 sm:px-8">
                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#0f4c81] text-white shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900">
                                Informations du profil
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Modifiez vos informations personnelles.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="p-5 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

            </div>


            {{-- Mot de passe --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 bg-slate-50/70 px-5 py-5 sm:px-8">
                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#0f4c81] text-white shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0119.5 12.75v6A2.25 2.25 0 0117.25 21H6.75a2.25 2.25 0 01-2.25-2.25v-6A2.25 2.25 0 016.75 10.5z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900">
                                Sécurité
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Modifiez votre mot de passe pour sécuriser votre compte.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="p-5 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </div>


            {{-- Suppression du compte --}}
            <div class="overflow-hidden rounded-2xl border border-rose-200 bg-white shadow-sm">

                <div class="border-b border-rose-100 bg-rose-50/60 px-5 py-5 sm:px-8">
                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 7.5h12m-10.5 0v10.125A1.875 1.875 0 009.375 19.5h5.25a1.875 1.875 0 001.875-1.875V7.5m-6-3h3a1.5 1.5 0 011.5 1.5v1.5h-6V6A1.5 1.5 0 0110.5 4.5z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900">
                                Supprimer le compte
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Cette action est définitive.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="p-5 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>