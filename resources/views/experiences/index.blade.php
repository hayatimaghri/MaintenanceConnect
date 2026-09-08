<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Profil professionnel</p>
            <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Mes expériences</h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-3">
            <section class="mc-panel p-6 sm:p-8 lg:col-span-2">
                @if (session('status'))
                    <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="space-y-4">
                    @forelse ($experiences as $experience)
                        <article class="rounded-xl border border-slate-200 bg-white p-5 transition hover:border-sky-200">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <h3 class="font-semibold text-slate-900">{{ $experience->poste }}</h3>
                                    <p class="mt-1 text-sm text-indigo-700">{{ $experience->entreprise }}</p>
                                    <p class="mt-2 text-xs font-medium text-slate-500">
                                        Du {{ \Carbon\Carbon::parse($experience->date_debut)->format('d/m/Y') }}
                                        au {{ $experience->date_fin ? \Carbon\Carbon::parse($experience->date_fin)->format('d/m/Y') : "Aujourd'hui" }}
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('experiences.destroy', $experience) }}" onsubmit="return confirm('Supprimer cette expérience ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-semibold text-rose-600 hover:text-rose-700">Supprimer</button>
                                </form>
                            </div>
                            @if ($experience->description)
                                <p class="mt-4 whitespace-pre-line text-sm leading-6 text-slate-600">{{ $experience->description }}</p>
                            @endif
                            <details class="mt-5">
                                <summary class="cursor-pointer text-sm font-semibold text-indigo-700">Modifier</summary>
                                <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('experiences.update', $experience) }}" class="mt-4 space-y-4 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 sm:grid-cols-2">
                                        <div>
                                            <label for="poste-{{ $experience->id_experience }}" class="text-xs font-semibold text-slate-600">Poste</label>
                                            <input id="poste-{{ $experience->id_experience }}" name="poste" type="text" value="{{ $experience->poste }}" required class="mc-input mt-2">
                                        </div>
                                        <div>
                                            <label for="entreprise-{{ $experience->id_experience }}" class="text-xs font-semibold text-slate-600">Entreprise</label>
                                            <input id="entreprise-{{ $experience->id_experience }}" name="entreprise" type="text" value="{{ $experience->entreprise }}" required class="mc-input mt-2">
                                        </div>
                                        <div>
                                            <label for="date-debut-{{ $experience->id_experience }}" class="text-xs font-semibold text-slate-600">Date de début</label>
                                            <input id="date-debut-{{ $experience->id_experience }}" name="date_debut" type="date" value="{{ $experience->date_debut }}" required class="mc-input mt-2">
                                        </div>
                                        <div>
                                            <label for="date-fin-{{ $experience->id_experience }}" class="text-xs font-semibold text-slate-600">Date de fin</label>
                                            <input id="date-fin-{{ $experience->id_experience }}" name="date_fin" type="date" value="{{ $experience->date_fin }}" class="mc-input mt-2">
                                        </div>
                                    </div>
                                    <label for="description-{{ $experience->id_experience }}" class="sr-only">Description</label>
                                    <textarea id="description-{{ $experience->id_experience }}" name="description" rows="3" placeholder="Description de l'expérience" class="mc-input">{{ $experience->description }}</textarea>
                                    <button type="submit" :disabled="submitting" class="inline-flex min-h-11 items-center rounded-lg bg-sky-700 px-4 py-2 text-sm font-bold text-white transition hover:bg-sky-800 disabled:cursor-not-allowed disabled:opacity-60"><span x-show="!submitting">Enregistrer</span><span x-cloak x-show="submitting">Enregistrement...</span></button>
                                </form>
                            </details>
                        </article>
                    @empty
                        <p class="rounded-xl bg-slate-50 px-4 py-5 text-sm text-slate-500">Aucune expérience enregistrée.</p>
                    @endforelse
                </div>
            </section>

            <aside class="mc-panel h-fit p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-slate-900">Ajouter une expérience</h3>
                <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('experiences.store') }}" class="mt-6 space-y-4">
                    @csrf
                    <label for="new-poste" class="sr-only">Poste</label>
                    <input id="new-poste" name="poste" type="text" value="{{ old('poste') }}" required placeholder="Intitulé du poste" class="mc-input">
                    <label for="new-entreprise" class="sr-only">Entreprise</label>
                    <input id="new-entreprise" name="entreprise" type="text" value="{{ old('entreprise') }}" required placeholder="Nom de l'entreprise" class="mc-input">
                    <label for="new-date-debut" class="text-xs font-semibold text-slate-600">Date de début</label>
                    <input id="new-date-debut" name="date_debut" type="date" value="{{ old('date_debut') }}" required class="mc-input">
                    <label for="new-date-fin" class="text-xs font-semibold text-slate-600">Date de fin <span class="font-normal text-slate-400">(facultative)</span></label>
                    <input id="new-date-fin" name="date_fin" type="date" value="{{ old('date_fin') }}" class="mc-input">
                    <label for="new-description" class="sr-only">Description</label>
                    <textarea id="new-description" name="description" rows="4" placeholder="Description de l'expérience" class="mc-input">{{ old('description') }}</textarea>
                    <button type="submit" :disabled="submitting" class="w-full min-h-11 rounded-lg bg-sky-700 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-800 disabled:cursor-not-allowed disabled:opacity-60"><span x-show="!submitting">Ajouter</span><span x-cloak x-show="submitting">Ajout...</span></button>
                </form>
            </aside>
        </div>
    </div>
</x-app-layout>
