<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-sky-700">Espace de travail</p>
                <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Tableau de bord</h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden text-sm text-slate-500 sm:inline">{{ now()->format('d/m/Y') }}</span>
                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    {{ auth()->user()->role }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="min-h-[calc(100vh-145px)] bg-[#f4f7fa] px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl space-y-8">
            <section class="relative overflow-hidden rounded-2xl bg-slate-950 px-6 py-8 shadow-[0_18px_45px_rgba(15,23,42,0.16)] sm:px-10 sm:py-10">
                <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full border-[32px] border-sky-500/10"></div>
                <div class="absolute bottom-0 right-20 h-32 w-32 rounded-full bg-orange-500/10 blur-2xl"></div>
                <div class="relative max-w-2xl">
                    <p class="text-sm font-semibold text-sky-300">Bonjour, {{ auth()->user()->name }}</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        @if (auth()->user()->role === 'Admin')
                            Supervision de votre plateforme
                        @elseif (auth()->user()->role === 'Entreprise')
                            Vos opérations, au même endroit
                        @else
                            Développez votre activité technique
                        @endif
                    </h2>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300">
                        @if (auth()->user()->role === 'Admin')
                            Consultez les missions et gardez une vue claire sur l’activité de MaintenanceConnect.
                        @elseif (auth()->user()->role === 'Entreprise')
                            Publiez vos besoins de maintenance et sélectionnez les meilleurs profils pour vos interventions.
                        @else
                            Découvrez des missions, présentez votre expertise et construisez un profil professionnel solide.
                        @endif
                    </p>
                </div>
            </section>

            @if (auth()->user()->role === 'Admin')
                <section>
                    <div class="mb-4 flex items-end justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Pilotage</p>
                            <h2 class="mt-1 text-xl font-extrabold text-slate-950">Vue administrateur</h2>
                        </div>
                    </div>
                    <div class="grid gap-5 lg:grid-cols-2">
                        <a href="{{ route('missions.index') }}" class="group mc-panel relative overflow-hidden p-6 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <div class="flex items-start justify-between">
                                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-50 text-sky-700"><span class="text-lg font-extrabold">M</span></span>
                                <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-sky-600">→</span>
                            </div>
                            <h3 class="mt-6 text-lg font-extrabold text-slate-950">Missions et offres</h3>
                            <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">Consulter les missions publiées et superviser les propositions associées.</p>
                            <span class="mt-6 inline-flex text-sm font-bold text-sky-700">Ouvrir l’espace missions</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="group mc-panel relative overflow-hidden p-6 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <div class="flex items-start justify-between">
                                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700"><span class="text-lg font-extrabold">P</span></span>
                                <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-sky-600">→</span>
                            </div>
                            <h3 class="mt-6 text-lg font-extrabold text-slate-950">Profil administrateur</h3>
                            <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">Mettre à jour vos informations personnelles et les paramètres du compte.</p>
                            <span class="mt-6 inline-flex text-sm font-bold text-sky-700">Gérer le profil</span>
                        </a>
                    </div>
                </section>
            @elseif (auth()->user()->role === 'Entreprise')
                <section>
                    <div class="mb-4">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Gestion opérationnelle</p>
                        <h2 class="mt-1 text-xl font-extrabold text-slate-950">Vos outils entreprise</h2>
                    </div>
                    <div class="grid gap-5 lg:grid-cols-3">
                        <a href="{{ route('missions.create') }}" class="group relative overflow-hidden rounded-2xl bg-sky-700 p-6 text-white shadow-[0_16px_35px_rgba(3,105,161,0.22)] transition duration-200 hover:-translate-y-1 hover:bg-sky-800">
                            <div class="flex items-start justify-between"><span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/15 text-2xl font-light">+</span><span class="text-2xl text-sky-200">↗</span></div>
                            <h3 class="mt-6 text-lg font-extrabold">Nouvelle mission</h3>
                            <p class="mt-2 text-sm leading-6 text-sky-100">Décrivez votre besoin et recevez des offres de techniciens qualifiés.</p>
                            <span class="mt-6 inline-flex text-sm font-bold text-white">Publier maintenant</span>
                        </a>
                        <a href="{{ route('missions.index') }}" class="group mc-panel p-6 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <div class="flex items-start justify-between"><span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-lg font-extrabold text-slate-700">M</span><span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-sky-600">→</span></div>
                            <h3 class="mt-6 text-lg font-extrabold text-slate-950">Suivi des missions</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Consultez vos missions, les offres reçues et les détails des interventions.</p>
                            <span class="mt-6 inline-flex text-sm font-bold text-sky-700">Voir les missions</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="group mc-panel p-6 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <div class="flex items-start justify-between"><span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-lg font-extrabold text-slate-700">P</span><span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-sky-600">→</span></div>
                            <h3 class="mt-6 text-lg font-extrabold text-slate-950">Profil entreprise</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Gardez vos coordonnées professionnelles à jour.</p>
                            <span class="mt-6 inline-flex text-sm font-bold text-sky-700">Gérer le profil</span>
                        </a>
                    </div>
                </section>
            @elseif (auth()->user()->role === 'Technicien')
                <section>
                    <div class="mb-4">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Espace professionnel</p>
                        <h2 class="mt-1 text-xl font-extrabold text-slate-950">Vos outils technicien</h2>
                    </div>
                    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                        <a href="{{ route('missions.index') }}" class="group mc-panel p-5 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-50 text-sm font-extrabold text-sky-700">M</span>
                            <h3 class="mt-5 font-extrabold text-slate-950">Missions</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Trouver une intervention et envoyer une offre.</p>
                            <span class="mt-5 inline-flex text-sm font-bold text-sky-700">Parcourir →</span>
                        </a>
                        <a href="{{ route('competences.index') }}" class="group mc-panel p-5 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-sm font-extrabold text-emerald-700">C</span>
                            <h3 class="mt-5 font-extrabold text-slate-950">Compétences</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Présenter vos domaines d’expertise.</p>
                            <span class="mt-5 inline-flex text-sm font-bold text-sky-700">Gérer →</span>
                        </a>
                        <a href="{{ route('experiences.index') }}" class="group mc-panel p-5 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-sm font-extrabold text-orange-700">E</span>
                            <h3 class="mt-5 font-extrabold text-slate-950">Expériences</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Valoriser votre parcours professionnel.</p>
                            <span class="mt-5 inline-flex text-sm font-bold text-sky-700">Gérer →</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="group mc-panel p-5 transition duration-200 hover:-translate-y-1 hover:border-sky-300 hover:shadow-[0_18px_40px_rgba(14,116,144,0.12)]">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-sm font-extrabold text-slate-700">P</span>
                            <h3 class="mt-5 font-extrabold text-slate-950">Mon profil</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Gérer vos informations de compte.</p>
                            <span class="mt-5 inline-flex text-sm font-bold text-sky-700">Gérer →</span>
                        </a>
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>
