<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">
                    Profil technicien
                </p>

                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">
                    {{ $technicien->name }}
                </h2>
            </div>

            <a
                href="{{ route('missions.show', $offre->mission) }}"
                class="text-sm font-semibold text-slate-600 hover:text-sky-700"
            >
                ← Retour aux offres
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-5xl space-y-6">

            {{-- Informations générales --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-sky-100 text-2xl font-bold text-sky-700">
                        {{ strtoupper(substr($technicien->name, 0, 1)) }}
                    </div>

                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-950">
                            {{ $technicien->name }}
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Technicien de maintenance
                        </p>

                        @if ($technicien->telephone)
                            <p class="mt-2 text-sm text-slate-600">
                                Téléphone : {{ $technicien->telephone }}
                            </p>
                        @endif
                    </div>

                </div>

            </section>


            {{-- Compétences --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div>
                    <h3 class="text-lg font-bold text-slate-950">
                        Compétences
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Compétences professionnelles du technicien
                    </p>
                </div>

                @if ($technicien->competences->count() > 0)

                    <div class="mt-6 grid gap-4 sm:grid-cols-2">

                        @foreach ($technicien->competences as $competence)

                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">

                                <div class="flex items-start gap-3">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-sky-100 text-sky-700">
                                        ✓
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-slate-900">
                                            {{ $competence->nom }}
                                        </h4>

                                        @if ($competence->description)
                                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                                {{ $competence->description }}
                                            </p>
                                        @endif
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="mt-6 rounded-xl bg-slate-50 px-4 py-5 text-sm text-slate-500">
                        Aucune compétence renseignée.
                    </div>

                @endif

            </section>


            {{-- Expériences --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div>
                    <h3 class="text-lg font-bold text-slate-950">
                        Expériences professionnelles
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Parcours professionnel du technicien
                    </p>
                </div>

                @if ($technicien->experiences->count() > 0)

                    <div class="mt-6 space-y-5">

                        @foreach ($technicien->experiences as $experience)

                            <div class="relative rounded-xl border border-slate-200 bg-slate-50 p-5">

                                <div class="flex flex-col gap-3 sm:flex-row sm:justify-between">

                                    <div>

                                        <h4 class="text-base font-bold text-slate-900">
                                            {{ $experience->poste }}
                                        </h4>

                                        <p class="mt-1 text-sm font-medium text-sky-700">
                                            {{ $experience->entreprise }}
                                        </p>

                                    </div>

                                    <div class="text-sm text-slate-500">
                                        {{ \Carbon\Carbon::parse($experience->date_debut)->format('m/Y') }}

                                        -

                                        @if ($experience->date_fin)
                                            {{ \Carbon\Carbon::parse($experience->date_fin)->format('m/Y') }}
                                        @else
                                            Aujourd'hui
                                        @endif
                                    </div>

                                </div>

                                @if ($experience->description)

                                    <p class="mt-4 text-sm leading-7 text-slate-600">
                                        {{ $experience->description }}
                                    </p>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="mt-6 rounded-xl bg-slate-50 px-4 py-5 text-sm text-slate-500">
                        Aucune expérience renseignée.
                    </div>

                @endif

            </section>


            {{-- Offre envoyée --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <h3 class="text-lg font-bold text-slate-950">
                    Offre proposée
                </h3>

                <div class="mt-5 grid gap-5 sm:grid-cols-3">

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Prix proposé
                        </p>

                        <p class="mt-1 text-lg font-bold text-slate-900">
                            {{ number_format($offre->prix, 2, ',', ' ') }} DH
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Délai
                        </p>

                        <p class="mt-1 text-lg font-semibold text-slate-900">
                            {{ $offre->delai }} jour(s)
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Statut
                        </p>

                        <p class="mt-1 text-sm font-semibold text-sky-700">
                            {{ $offre->statut }}
                        </p>
                    </div>

                </div>

            </section>

        </div>

    </div>

</x-app-layout>