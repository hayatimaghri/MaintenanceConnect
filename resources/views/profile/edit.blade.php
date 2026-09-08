<x-app-layout>
    <x-slot name="header">
        <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-sky-700">Compte</p><h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950">Mon profil</h2></div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl space-y-6">
            <div class="mc-panel p-5 sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="mc-panel p-5 sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-2xl border border-rose-200 bg-white p-5 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
