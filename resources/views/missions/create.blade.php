<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Publier une mission</h2>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                    <p class="font-semibold">Vérifiez les informations saisies.</p>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('missions.store') }}" class="space-y-6">
                @csrf
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="titre" class="block text-sm font-medium text-slate-700">Titre</label>
                        <input id="titre" name="titre" type="text" value="{{ old('titre') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
                        <textarea id="description" name="description" rows="5" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                    </div>
                    <div>
                        <label for="localisation" class="block text-sm font-medium text-slate-700">Localisation</label>
                        <input id="localisation" name="localisation" type="text" value="{{ old('localisation') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="budget" class="block text-sm font-medium text-slate-700">Budget (€)</label>
                        <input id="budget" name="budget" type="number" min="0" step="0.01" value="{{ old('budget') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="priorite" class="block text-sm font-medium text-slate-700">Priorité</label>
                        <input id="priorite" name="priorite" type="text" value="{{ old('priorite') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="statut" class="block text-sm font-medium text-slate-700">Statut</label>
                        <input id="statut" name="statut" type="text" value="{{ old('statut', 'ouverte') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="date_publication" class="block text-sm font-medium text-slate-700">Date de publication</label>
                        <input id="date_publication" name="date_publication" type="datetime-local" value="{{ old('date_publication') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="date_limite" class="block text-sm font-medium text-slate-700">Date limite</label>
                        <input id="date_limite" name="date_limite" type="datetime-local" value="{{ old('date_limite') }}" required class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('missions.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Annuler</a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">Publier la mission</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
