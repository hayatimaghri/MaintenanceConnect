<nav x-data="{ open: false, notificationsOpen: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- LEFT --}}
            <div class="flex">

                {{-- Logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                {{-- Dashboard --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- ================= NOTIFICATIONS ================= --}}
                <div
                    class="relative me-4"
                    x-data="{ notificationsOpen: false }"
                >

                    {{-- Notifications --}}
                    @php
                        $notifications = Auth::user()->notifications
                            ->sortByDesc('date_notification')
                            ->take(10);

                        $unreadCount = $notifications->filter(function ($notification) {
                            return !session()->has(
                                "notification_read_{$notification->id_notification}"
                            );
                        })->count();
                    @endphp

                    {{-- Bell --}}
                    <button
                        @click="notificationsOpen = !notificationsOpen"
                        type="button"
                        class="relative rounded-xl p-2 text-gray-500 hover:bg-gray-100 hover:text-blue-700 focus:outline-none"
                    >

                        {{-- Bell icon --}}
                        <svg
                            class="h-6 w-6"
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

                        {{-- BLUE NUMBER --}}
                       @if ($unreadCount > 0)
    <span
        class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-500 px-1 text-xs font-bold text-white shadow-sm"
    >
        {{ $unreadCount }}
    </span>
@endif

                    </button>

                    {{-- DROPDOWN --}}
                    <div
                        x-show="notificationsOpen"
                        @click.outside="notificationsOpen = false"
                        x-transition
                        style="display: none;"
                        class="absolute right-0 z-50 mt-3 w-80 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl"
                    >

                        {{-- HEADER --}}
                        <div class="border-b border-gray-100 px-4 py-3">

                            <div class="flex items-center justify-between">

                                <h3 class="text-sm font-bold text-gray-800">
                                    Notifications
                                </h3>

                                @if ($unreadCount > 0)
                                    <span
                                        class="rounded-full bg-blue-100 px-2.5 py-1 text-xs font-bold text-blue-700"
                                    >
                                        {{ $unreadCount }}
                                    </span>
                                @endif

                            </div>

                        </div>

                        {{-- LIST --}}
                        <div class="max-h-80 overflow-y-auto">

                            @forelse ($notifications as $notification)

                                @php
                                    $isRead = session()->has(
                                        "notification_read_{$notification->id_notification}"
                                    );
                                @endphp

                                {{-- NOTIFICATION --}}
                                <form
                                    method="POST"
                                    action="{{ route('notifications.read', $notification->id_notification) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full border-b border-gray-100 px-4 py-4 text-left transition
                                        {{ $isRead
                                            ? 'bg-white hover:bg-gray-50'
                                            : 'bg-blue-50 hover:bg-blue-100'
                                        }}"
                                    >

                                        <div class="flex gap-3">

                                            {{-- ICON --}}
                                            <div
                                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full
                                                {{ $isRead
                                                    ? 'bg-gray-100 text-gray-500'
                                                    : 'bg-blue-100 text-blue-600'
                                                }}"
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
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-.674-.055-1.335-.16-1.976z"
                                                    />
                                                </svg>

                                            </div>

                                            {{-- CONTENT --}}
                                            <div class="min-w-0 flex-1">

                                                <p
                                                    class="text-sm font-semibold
                                                    {{ $isRead
                                                        ? 'text-gray-700'
                                                        : 'text-blue-800'
                                                    }}"
                                                >
                                                    {{ $notification->message }}
                                                </p>

                                                <p class="mt-1 text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($notification->date_notification)->diffForHumans() }}
                                                </p>

                                            </div>

                                            {{-- BLUE DOT --}}
                                            @if (!$isRead)
                                                <span
                                                    class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-blue-600"
                                                ></span>
                                            @endif

                                        </div>

                                    </button>

                                </form>

                            @empty

                                {{-- EMPTY --}}
                                <div class="px-4 py-8 text-center">

                                    <div
                                        class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100"
                                    >
                                        <svg
                                            class="h-6 w-6 text-gray-400"
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
                                    </div>

                                    <p class="text-sm font-medium text-gray-600">
                                        Aucune notification
                                    </p>

                                    <p class="mt-1 text-xs text-gray-400">
                                        Vous êtes à jour.
                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

                {{-- ================= PROFILE ================= --}}
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent
                                   text-sm leading-4 font-medium rounded-md
                                   text-gray-500 bg-white
                                   hover:text-gray-700
                                   focus:outline-none
                                   transition ease-in-out duration-150"
                        >

                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">

                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- HAMBURGER --}}
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md
                           text-gray-400
                           hover:text-gray-500
                           hover:bg-gray-100
                           focus:outline-none
                           focus:bg-gray-100
                           focus:text-gray-500
                           transition duration-150 ease-in-out"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    {{-- RESPONSIVE MENU --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>


