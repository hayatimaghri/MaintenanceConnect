@php($sidebarUser = $admin ?? auth()->user())

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
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-sky-500/15 text-sky-300' : 'text-slate-300 transition hover:bg-white/5 hover:text-white' }} px-3 py-3 text-sm font-semibold">
                <span class="flex h-7 w-7 items-center justify-center rounded-md {{ request()->routeIs('dashboard') ? 'bg-sky-500' : 'bg-white/10' }} text-xs font-black text-white">D</span>
                Dashboard
            </a>
            <a href="{{ route('missions.index') }}" class="flex items-center gap-3 rounded-lg {{ request()->routeIs('missions.*') ? 'bg-sky-500/15 text-sky-300' : 'text-slate-300 transition hover:bg-white/5 hover:text-white' }} px-3 py-3 text-sm font-semibold">
                <span class="flex h-7 w-7 items-center justify-center rounded-md {{ request()->routeIs('missions.*') ? 'bg-sky-500' : 'bg-white/10' }} text-xs font-black">M</span>
                Gérer les missions
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-sky-500/15 text-sky-300' : 'text-slate-300 transition hover:bg-white/5 hover:text-white' }} px-3 py-3 text-sm font-semibold">
                <span class="flex h-7 w-7 items-center justify-center rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-sky-500' : 'bg-white/10' }} text-xs font-black">U</span>
                Gestion des utilisateurs
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-sky-500/15 text-sky-300' : 'text-slate-300 transition hover:bg-white/5 hover:text-white' }} px-3 py-3 text-sm font-semibold">
                <span class="flex h-7 w-7 items-center justify-center rounded-md {{ request()->routeIs('profile.*') ? 'bg-sky-500' : 'bg-white/10' }} text-xs font-black">P</span>
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
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/10 text-sm font-bold">{{ strtoupper(substr($sidebarUser->name, 0, 1)) }}</span>
            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-white">{{ $sidebarUser->name }}</p>
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
