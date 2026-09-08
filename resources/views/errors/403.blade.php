<x-app-layout>
    <div class="flex min-h-[calc(100vh-145px)] items-center justify-center bg-[#f4f7fa] px-4 py-12 sm:px-6">
        <div class="mc-panel w-full max-w-lg p-8 text-center sm:p-10">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-rose-50 text-2xl font-extrabold text-rose-700">403</div>
            <p class="mt-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-400">Autorisation requise</p>
            <h1 class="mt-2 text-2xl font-extrabold tracking-tight text-slate-950">Accès refusé</h1>
            <p class="mt-3 text-sm leading-6 text-slate-500">Vous n’avez pas l’autorisation d’effectuer cette action.</p>
            <a href="{{ route('dashboard') }}" class="mt-7 inline-flex items-center justify-center rounded-lg bg-sky-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-sky-800">Retourner au dashboard</a>
        </div>
    </div>
</x-app-layout>