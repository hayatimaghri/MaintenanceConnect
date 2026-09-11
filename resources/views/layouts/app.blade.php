<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MaintenanceConnect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased text-slate-800">

        @php
            $currentUser = auth()->user();

            $unreadCount = $currentUser->notifications->filter(function ($notification) {
                return !session()->has(
                    "notification_read_{$notification->id_notification}"
                );
            })->count();
        @endphp

        <div class="min-h-screen bg-slate-50">
            <div class="flex min-h-screen">

                @if ($currentUser->role === 'Admin')
                    @include('components.admin-sidebar')
                @elseif ($currentUser->role === 'Entreprise')
                    @include('components.entreprise-sidebar')
                @else
                    @include('components.technicien-sidebar')
                @endif

                <main class="min-w-0 flex-1">

                    <header
                        x-data="{ mobileOpen: false, notificationsOpen: false }"
                        class="border-b border-slate-200 bg-white"
                    >

                        <div class="flex h-20 items-center justify-between px-5 sm:px-8">

                            <div class="flex items-center gap-3 lg:hidden">

                                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-700 text-sm font-black text-white">
                                    M
                                </span>

                                <span class="text-sm font-extrabold text-slate-900">
                                    Maintenance<span class="text-sky-700">Connect</span>
                                </span>

                                <button
                                    type="button"
                                    @click="mobileOpen = !mobileOpen"
                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:hidden"
                                    aria-label="Ouvrir le menu"
                                >
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    </svg>
                                </button>

                            </div>

                            <div class="hidden lg:block">

                                <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                                    {{ $currentUser->role }}
                                </p>

                                <p class="mt-1 text-sm font-semibold text-slate-800">
                                    Espace MaintenanceConnect
                                </p>

                            </div>

                            <div class="flex items-center gap-3">

                                <span class="hidden text-sm text-slate-500 sm:inline">
                                    {{ now()->format('d/m/Y') }}
                                </span>

                                <!-- Notifications -->
                                <div class="relative">

                                    <button
                                        type="button"
                                        @click="notificationsOpen = !notificationsOpen"
                                        class="relative rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-sky-700"
                                        aria-label="Notifications"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                            />
                                        </svg>

                                        {{-- Badge = notifications non lues uniquement --}}
                                        @if ($unreadCount > 0)
                                            <span
                                                id="notification-badge"
                                                class="absolute right-0 top-0 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[9px] font-bold text-white"
                                            >
                                                {{ $unreadCount }}
                                            </span>
                                        @endif

                                    </button>

                                    <!-- Dropdown notifications -->
                                    <div
                                        x-show="notificationsOpen"
                                        @click.outside="notificationsOpen = false"
                                        x-transition
                                        class="absolute right-0 z-50 mt-2 w-80 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl"
                                        style="display: none;"
                                    >

                                        <div class="border-b border-slate-100 px-4 py-3 text-sm font-bold text-slate-800">
                                            Notifications
                                        </div>

                                        <div class="max-h-80 overflow-y-auto">

                                            @forelse (
                                                $currentUser->notifications
                                                    ->sortByDesc('date_notification')
                                                    ->take(10)
                                                as $notification
                                            )

                                                @php
                                                    $isRead = session()->has(
                                                        "notification_read_{$notification->id_notification}"
                                                    );
                                                @endphp

                                                <form
                                                    method="POST"
                                                    action="{{ route('notifications.read', $notification->id_notification) }}"
                                                >
                                                    @csrf
                                                    <button
                                                        type="submit"
                                                        class="w-full border-b border-slate-100 px-4 py-3 text-left transition {{ $isRead ? 'bg-white hover:bg-slate-50' : 'bg-sky-50 hover:bg-sky-100' }}"
                                                    >

                                                        <p class="text-sm font-semibold text-slate-800">
                                                            {{ $notification->message }}
                                                        </p>

                                                        <p class="mt-1 text-xs text-slate-400">
                                                            {{ \Carbon\Carbon::parse($notification->date_notification)->diffForHumans() }}
                                                        </p>

                                                    </button>
                                                </form>

                                            @empty

                                                <p class="px-4 py-6 text-center text-sm text-slate-500">
                                                    Aucune notification
                                                </p>

                                            @endforelse

                                        </div>

                                    </div>

                                </div>

                                <!-- User -->
                                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-sm font-bold text-white">
                                    {{ strtoupper(substr($currentUser->name, 0, 1)) }}
                                </span>

                                <span class="hidden text-sm font-semibold text-slate-700 sm:inline">
                                    {{ $currentUser->name }}
                                </span>

                            </div>

                        </div>

                        <!-- Mobile navigation -->
                        <nav
                            x-show="mobileOpen"
                            x-transition
                            class="border-t border-slate-100 px-5 py-3 lg:hidden"
                            style="display: none;"
                        >

                            <a
                                href="{{ route('dashboard') }}"
                                class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-700' : 'text-slate-600' }}"
                            >
                                Dashboard
                            </a>

                            <a
                                href="{{ route('missions.index') }}"
                                class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('missions.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-600' }}"
                            >
                                Missions
                            </a>

                            @if ($currentUser->role === 'Technicien')

                                <a
                                    href="{{ route('competences.index') }}"
                                    class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('competences.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-600' }}"
                                >
                                    Compétences
                                </a>

                                <a
                                    href="{{ route('experiences.index') }}"
                                    class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('experiences.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-600' }}"
                                >
                                    Expériences
                                </a>

                            @endif

                            <a
                                href="{{ route('profile.edit') }}"
                                class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('profile.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-600' }}"
                            >
                                Mon profil
                            </a>

                        </nav>

                    </header>

                    @isset($header)

                        <header class="border-b border-slate-200 bg-white">

                            <div class="px-5 py-6 sm:px-8 lg:px-10">
                                {{ $header }}
                            </div>

                        </header>

                    @endisset

                    <main>
                        {{ $slot }}
                    </main>

                </main>

            </div>
        </div>

    </body>
</html>
