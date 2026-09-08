@if (auth()->user()->role === 'Admin')
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>MaintenanceConnect - Dashboard</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800">
    <div class="min-h-screen bg-slate-50">
        <div class="flex min-h-screen">
            <aside class="hidden w-64 shrink-0 flex-col bg-[#0b1f3a] text-white lg:flex">
                <div class="flex h-20 items-center border-b border-white/10 px-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500 text-lg font-black text-white">M</span>
                        <span class="text-base font-extrabold tracking-tight">Maintenance<span class="text-sky-400">Connect</span></span>
                    </a>
                </div>

                <div class="flex-1 px-4 py-7">
                    <p class="px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Navigation</p>
                    <nav class="mt-4 space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg bg-sky-500/15 px-3 py-3 text-sm font-semibold text-sky-300">
                            <span class="flex h-7 w-7 items-center justify-center rounded-md bg-sky-500 text-xs font-black text-white">D</span>
                            Dashboard
                        </a>
                        <a href="{{ route('missions.index') }}" class="flex items-center gap-3 rounded-lg px-3 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white">
                            <span class="flex h-7 w-7 items-center justify-center rounded-md bg-white/10 text-xs font-black">M</span>
                            Missions
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-lg px-3 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white">
                            <span class="flex h-7 w-7 items-center justify-center rounded-md bg-white/10 text-xs font-black">P</span>
                            Profil administrateur
                        </a>
                    </nav>

                    <p class="mt-10 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Accès disponibles</p>
                    <div class="mt-4 space-y-2 px-3 text-xs leading-5 text-slate-400">
                        <p>Les offres et évaluations sont consultables depuis les détails des missions.</p>
                    </div>
                </div>

                <div class="border-t border-white/10 p-4">
                    <div class="mb-3 flex items-center gap-3 px-2">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/10 text-sm font-bold">{{ strtoupper(substr($admin->name, 0, 1)) }}</span>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-white">{{ $admin->name }}</p>
                            <p class="text-xs text-slate-400">Administrateur</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-white/5 hover:text-white">
                            <span class="text-base">↪</span>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </aside>

            <main class="min-w-0 flex-1">
                <header class="border-b border-slate-200 bg-white">
                    <div class="flex h-20 items-center justify-between px-5 sm:px-8">
                        <div class="flex items-center gap-3 lg:hidden">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-700 text-sm font-black text-white">M</span>
                            <span class="text-sm font-extrabold text-slate-900">Maintenance<span class="text-sky-700">Connect</span></span>
                        </div>
                        <div class="hidden lg:block">
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Administration</p>
                            <p class="mt-1 text-sm font-semibold text-slate-800">Vue générale de la plateforme</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="hidden text-sm text-slate-500 sm:inline">{{ now()->format('d/m/Y') }}</span>
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-sm font-bold text-white">{{ strtoupper(substr($admin->name, 0, 1)) }}</span>
                            <span class="hidden text-sm font-semibold text-slate-700 sm:inline">{{ $admin->name }}</span>
                        </div>
                    </div>
                </header>

                <div class="px-5 py-8 sm:px-8 lg:px-10">
                    <div class="mx-auto max-w-7xl">
                        <div class="mb-8 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
                            <div>
                                <p class="text-sm font-semibold text-sky-700">Bonjour, {{ $admin->name }}</p>
                                <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-slate-950">Vue administrateur</h1>
                                <p class="mt-2 text-sm text-slate-500">Supervisez l’activité de MaintenanceConnect depuis un espace centralisé.</p>
                            </div>
                            <span class="w-fit rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Plateforme active</span>
                        </div>

                        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                                <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-400">Utilisateurs</p>
                                <p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreUtilisateurs }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $nombreEntreprises }} entreprises · {{ $nombreTechniciens }} techniciens</p>
                            </div>
                            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                                <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-400">Missions</p>
                                <p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreMissions }}</p>
                                <p class="mt-1 text-xs text-slate-500">Missions enregistrées</p>
                            </div>
                            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                                <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-400">Offres</p>
                                <p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreOffres }}</p>
                                <p class="mt-1 text-xs text-slate-500">Propositions reçues</p>
                            </div>
                            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                                <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-400">Évaluations</p>
                                <p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreEvaluations }}</p>
                                <p class="mt-1 text-xs text-slate-500">Retours enregistrés</p>
                            </div>
                        </section>

                        <section class="mt-8 grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                                    <div>
                                        <h2 class="font-extrabold text-slate-950">Dernières missions</h2>
                                        <p class="mt-1 text-xs text-slate-500">Les missions les plus récemment enregistrées.</p>
                                    </div>
                                    <a href="{{ route('missions.index') }}" class="text-xs font-bold text-sky-700 hover:text-sky-800">Tout voir</a>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full min-w-[560px] text-left">
                                        <thead class="bg-slate-50 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">
                                            <tr><th class="px-5 py-3">Mission</th><th class="px-5 py-3">Localisation</th><th class="px-5 py-3">Statut</th><th class="px-5 py-3">Budget</th></tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                                            @forelse ($dernieresMissions as $mission)
                                                <tr class="text-sm">
                                                    <td class="px-5 py-4"><a href="{{ route('missions.show', $mission) }}" class="font-bold text-slate-800 hover:text-sky-700">{{ $mission->titre }}</a></td>
                                                    <td class="px-5 py-4 text-slate-500">{{ $mission->localisation }}</td>
                                                    <td class="px-5 py-4"><span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">{{ $mission->statut }}</span></td>
                                                    <td class="px-5 py-4 font-semibold text-slate-700">{{ number_format($mission->budget, 2, ',', ' ') }} DH</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="4" class="px-5 py-8 text-center text-sm text-slate-500">Aucune mission disponible.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="border-b border-slate-100 px-5 py-4">
                                    <h2 class="font-extrabold text-slate-950">Dernières offres</h2>
                                    <p class="mt-1 text-xs text-slate-500">Les dernières propositions des techniciens.</p>
                                </div>
                                <div class="divide-y divide-slate-100">
                                    @forelse ($dernieresOffres as $offre)
                                        <a href="{{ route('missions.show', $offre->mission) }}" class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-slate-50">
                                            <div class="min-w-0"><p class="truncate text-sm font-bold text-slate-800">{{ $offre->mission->titre }}</p><p class="mt-1 text-xs text-slate-500">{{ $offre->user->name }}</p></div>
                                            <div class="shrink-0 text-right"><p class="text-sm font-extrabold text-slate-800">{{ number_format($offre->prix, 2, ',', ' ') }} DH</p><p class="mt-1 text-xs text-slate-400">{{ $offre->statut }}</p></div>
                                        </a>
                                    @empty
                                        <p class="px-5 py-8 text-center text-sm text-slate-500">Aucune offre disponible.</p>
                                    @endforelse
                                </div>
                            </div>
                        </section>

                        <section class="mt-8 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="mb-4"><p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">Accès rapide</p><h2 class="mt-1 font-extrabold text-slate-950">Actions administrateur</h2></div>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('missions.index') }}" class="rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-800">Gérer les missions</a>
                                <a href="{{ route('profile.edit') }}" class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition hover:border-sky-400 hover:text-sky-700">Mon profil</a>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </body>
    </html>
@else
    <x-app-layout>
        <x-slot name="header">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">MaintenanceConnect</p>
                <h1 class="mt-1 text-2xl font-extrabold text-slate-950">Bonjour, {{ $user->name }}</h1>
            </div>
        </x-slot>

        <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-6">
                @if ($user->role === 'Entreprise')
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Mes missions</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreMissions }}</p></div>
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Missions actives</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $missionsActives }}</p></div>
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Offres reçues</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreOffres }}</p></div>
                    </div>
                    <section class="mc-panel overflow-hidden">
                        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4"><div><h2 class="font-extrabold text-slate-950">Mes missions</h2><p class="mt-1 text-xs text-slate-500">Suivez vos publications et les offres reçues.</p></div><a href="{{ route('missions.create') }}" class="rounded-lg bg-sky-700 px-4 py-2 text-sm font-bold text-white hover:bg-sky-800">Publier</a></div>
                        <div class="divide-y divide-slate-100">
                            @forelse ($missions as $mission)
                                <a href="{{ route('missions.show', $mission) }}" class="flex flex-col gap-2 px-5 py-4 transition hover:bg-slate-50 sm:flex-row sm:items-center sm:justify-between"><div><p class="font-bold text-slate-800">{{ $mission->titre }}</p><p class="mt-1 text-sm text-slate-500">{{ $mission->localisation }}</p></div><div class="flex items-center gap-3 text-sm"><span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">{{ $mission->statut }}</span><span class="font-semibold text-slate-700">{{ $mission->offres_count }} offre(s)</span></div></a>
                            @empty
                                <p class="px-5 py-8 text-sm text-slate-500">Vous n'avez encore publié aucune mission.</p>
                            @endforelse
                        </div>
                    </section>
                @else
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Offres envoyées</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreOffres }}</p></div>
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Missions ouvertes</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreMissions }}</p></div>
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Compétences</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreCompetences }}</p></div>
                        <div class="mc-panel p-5"><p class="text-xs font-bold uppercase tracking-wide text-slate-400">Expériences</p><p class="mt-3 text-3xl font-extrabold text-slate-950">{{ $nombreExperiences }}</p></div>
                    </div>
                    <section class="mc-panel overflow-hidden">
                        <div class="border-b border-slate-100 px-5 py-4"><h2 class="font-extrabold text-slate-950">Mes dernières offres</h2><p class="mt-1 text-xs text-slate-500">Retrouvez le suivi de vos propositions.</p></div>
                        <div class="divide-y divide-slate-100">
                            @forelse ($offres as $offre)
                                <a href="{{ route('missions.show', $offre->mission) }}" class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-slate-50"><div><p class="font-bold text-slate-800">{{ $offre->mission->titre }}</p><p class="mt-1 text-sm text-slate-500">{{ $offre->delai }} jour(s)</p></div><div class="text-right"><p class="font-extrabold text-slate-800">{{ number_format($offre->prix, 2, ',', ' ') }} DH</p><p class="mt-1 text-xs text-slate-500">{{ $offre->statut }}</p></div></a>
                            @empty
                                <p class="px-5 py-8 text-sm text-slate-500">Vous n'avez encore envoyé aucune offre.</p>
                            @endforelse
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </x-app-layout>
@endif
