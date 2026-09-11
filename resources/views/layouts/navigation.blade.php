<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- ========================================================= --}}
            {{-- LEFT --}}
            {{-- ========================================================= --}}

            <div class="flex">

                {{-- LOGO --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo
                            class="block h-9 w-auto fill-current text-gray-800"
                        />
                    </a>
                </div>

                {{-- DASHBOARD --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- RIGHT --}}
            {{-- ========================================================= --}}

            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- ===================================================== --}}
                {{-- NOTIFICATIONS --}}
                {{-- ===================================================== --}}

                @php

                    $allNotifications = Auth::user()
                        ->notifications()
                        ->orderByDesc('date_notification')
                        ->get();

                    $notifications = $allNotifications->take(10);

                    $unreadCount = $allNotifications->filter(function ($notification) {
                        return !session()->has(
                            "notification_read_{$notification->id_notification}"
                        );
                    })->count();

                @endphp


                {{-- ===================================================== --}}
                {{-- NOTIFICATION CONTAINER --}}
                {{-- ===================================================== --}}

                <div
                    class="relative me-5"
                    x-data="{ notificationsOpen: false }"
                >

                    {{-- ================================================= --}}
                    {{-- BELL --}}
                    {{-- ================================================= --}}

                    <button
                        type="button"
                        @click="notificationsOpen = !notificationsOpen"
                        class="relative flex h-10 w-10 items-center justify-center rounded-xl text-gray-500 transition hover:bg-gray-100 hover:text-blue-700 focus:outline-none"
                        aria-label="Notifications"
                    >

                        {{-- BELL ICON --}}
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                        </svg>


                        {{-- ================================================= --}}
                        {{-- RED BADGE --}}
                        {{-- ================================================= --}}

                        <span
                            id="notification-badge"
                            class="
                                absolute
                                -top-1
                                -right-1
                                z-50
                                flex
                                h-5
                                w-5
                                items-center
                                justify-center
                                rounded-full
                                bg-red-600
                                text-[11px]
                                font-bold
                                leading-none
                                text-white
                                shadow-sm
                                ring-2
                                ring-white
                                pointer-events-none
                                {{ $unreadCount > 0 ? '' : 'hidden' }}
                            "
                        >
                            {{ $unreadCount }}
                        </span>

                    </button>


                    {{-- ================================================= --}}
                    {{-- DROPDOWN --}}
                    {{-- ================================================= --}}

                    <div
                        x-show="notificationsOpen"
                        x-transition
                        @click.outside="notificationsOpen = false"
                        class="
                            absolute
                            right-0
                            top-full
                            z-[9999]
                            mt-3
                            w-96
                            overflow-hidden
                            rounded-2xl
                            border
                            border-gray-200
                            bg-white
                            shadow-2xl
                        "
                        style="display: none;"
                    >

                        {{-- ================================================= --}}
                        {{-- HEADER --}}
                        {{-- ================================================= --}}

                        <div class="border-b border-gray-100 bg-white px-4 py-4">

                            <div class="flex items-center justify-between">

                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">
                                        Notifications
                                    </h3>

                                    <p class="mt-0.5 text-xs text-gray-400">
                                        Vos dernières notifications
                                    </p>
                                </div>


                                {{-- HEADER COUNT --}}

                                <span
                                    id="notification-header-count"
                                    class="
                                        rounded-full
                                        bg-red-100
                                        px-2.5
                                        py-1
                                        text-xs
                                        font-bold
                                        text-red-600
                                        {{ $unreadCount > 0 ? '' : 'hidden' }}
                                    "
                                >
                                    {{ $unreadCount }}
                                    non lue{{ $unreadCount > 1 ? 's' : '' }}
                                </span>


                                <span
                                    id="notification-all-read"
                                    class="
                                        rounded-full
                                        bg-green-100
                                        px-2.5
                                        py-1
                                        text-xs
                                        font-bold
                                        text-green-600
                                        {{ $unreadCount > 0 ? 'hidden' : '' }}
                                    "
                                >
                                    Tout est lu
                                </span>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- NOTIFICATIONS LIST --}}
                        {{-- ================================================= --}}

                        <div class="max-h-[420px] overflow-y-auto">

                            @forelse ($notifications as $notification)

                                @php
                                    $isRead = session()->has(
                                        "notification_read_{$notification->id_notification}"
                                    );
                                @endphp


                                {{-- ================================================= --}}
                                {{-- NOTIFICATION --}}
                                {{-- ================================================= --}}

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'notifications.read',
                                        $notification->id_notification
                                    ) }}"
                                    class="notification-form"
                                    data-notification-id="{{ $notification->id_notification }}"
                                    data-is-read="{{ $isRead ? '1' : '0' }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="
                                            notification-item
                                            group
                                            w-full
                                            border-b
                                            border-gray-100
                                            px-4
                                            py-4
                                            text-left
                                            transition
                                            {{ $isRead
                                                ? 'bg-white hover:bg-gray-50'
                                                : 'bg-blue-50 hover:bg-blue-100'
                                            }}
                                        "
                                    >

                                        <div class="flex items-start gap-3">

                                            {{-- ICON --}}

                                            <div
                                                class="
                                                    notification-icon
                                                    flex
                                                    h-10
                                                    w-10
                                                    shrink-0
                                                    items-center
                                                    justify-center
                                                    rounded-full
                                                    {{ $isRead
                                                        ? 'bg-gray-100 text-gray-500'
                                                        : 'bg-blue-100 text-blue-600'
                                                    }}
                                                "
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
                                                    class="
                                                        notification-message
                                                        text-sm
                                                        leading-5
                                                        {{ $isRead
                                                            ? 'font-medium text-gray-700'
                                                            : 'font-bold text-blue-800'
                                                        }}
                                                    "
                                                >
                                                    {{ $notification->message }}
                                                </p>

                                                <p class="mt-1 text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse(
                                                        $notification->date_notification
                                                    )->diffForHumans() }}
                                                </p>

                                            </div>


                                            {{-- BLUE DOT --}}

                                            @if (!$isRead)

                                                <span
                                                    class="
                                                        notification-dot
                                                        mt-2
                                                        h-2.5
                                                        w-2.5
                                                        shrink-0
                                                        rounded-full
                                                        bg-blue-600
                                                    "
                                                ></span>

                                            @endif

                                        </div>

                                    </button>

                                </form>

                            @empty

                                {{-- EMPTY --}}

                                <div class="px-4 py-10 text-center">

                                    <div
                                        class="
                                            mx-auto
                                            mb-3
                                            flex
                                            h-12
                                            w-12
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-gray-100
                                        "
                                    >

                                        <svg
                                            class="h-7 w-7 text-gray-400"
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

                                    <p class="text-sm font-semibold text-gray-600">
                                        Aucune notification
                                    </p>

                                    <p class="mt-1 text-xs text-gray-400">
                                        Vous êtes à jour.
                                    </p>

                                </div>

                            @endforelse

                        </div>


                        {{-- ================================================= --}}
                        {{-- FOOTER --}}
                        {{-- ================================================= --}}

                        @if ($allNotifications->count() > 10)

                            <div
                                class="
                                    border-t
                                    border-gray-100
                                    bg-gray-50
                                    px-4
                                    py-3
                                    text-center
                                "
                            >
                                <span class="text-xs font-medium text-gray-500">
                                    10 dernières notifications affichées
                                </span>
                            </div>

                        @endif

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- PROFILE --}}
                {{-- ========================================================= --}}

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="
                                inline-flex
                                items-center
                                rounded-md
                                border
                                border-transparent
                                bg-white
                                px-3
                                py-2
                                text-sm
                                font-medium
                                leading-4
                                text-gray-500
                                transition
                                duration-150
                                ease-in-out
                                hover:text-gray-700
                                focus:outline-none
                            "
                        >

                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">

                                <svg
                                    class="h-4 w-4 fill-current"
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


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

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


            {{-- ========================================================= --}}
            {{-- HAMBURGER --}}
            {{-- ========================================================= --}}

            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        rounded-md
                        p-2
                        text-gray-400
                        transition
                        hover:bg-gray-100
                        hover:text-gray-500
                        focus:bg-gray-100
                        focus:text-gray-500
                        focus:outline-none
                    "
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


    {{-- ========================================================= --}}
    {{-- RESPONSIVE MENU --}}
    {{-- ========================================================= --}}

    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden"
    >

        <div class="space-y-1 pb-3 pt-2">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

        </div>


        <div class="border-t border-gray-200 pb-1 pt-4">

            <div class="px-4">

                <div class="text-base font-medium text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm font-medium text-gray-500">
                    {{ Auth::user()->email }}
                </div>

            </div>


            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

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


{{-- ========================================================= --}}
{{-- NOTIFICATION JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Update notification badge
    |--------------------------------------------------------------------------
    */

    function updateNotificationCount() {

        fetch("{{ route('notifications.unreadCount') }}", {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })

        .then(response => {

            if (!response.ok) {
                throw new Error('Erreur HTTP : ' + response.status);
            }

            return response.json();

        })

        .then(data => {

            const badge = document.getElementById('notification-badge');

            if (!badge) {
                return;
            }

            const count = Number(data.count) || 0;

            /*
            |--------------------------------------------------------------------------
            | Badge rouge
            |--------------------------------------------------------------------------
            */

            if (count > 0) {

                badge.textContent = count;
                badge.classList.remove('hidden');

            } else {

                badge.textContent = '0';
                badge.classList.add('hidden');

            }


            /*
            |--------------------------------------------------------------------------
            | Header du dropdown
            |--------------------------------------------------------------------------
            */

            const headerCount =
                document.getElementById('notification-header-count');

            const allRead =
                document.getElementById('notification-all-read');


            if (headerCount && allRead) {

                if (count > 0) {

                    headerCount.textContent =
                        count + ' non lue' + (count > 1 ? 's' : '');

                    headerCount.classList.remove('hidden');
                    allRead.classList.add('hidden');

                } else {

                    headerCount.classList.add('hidden');
                    allRead.classList.remove('hidden');

                }

            }

        })

        .catch(error => {

            console.error(
                'Erreur lors de la mise à jour des notifications :',
                error
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Notification click
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.notification-form').forEach(function (form) {

        form.addEventListener('submit', function () {

            const isRead = form.dataset.isRead;

            /*
            |--------------------------------------------------------------------------
            | Si notification déjà lue → ne rien faire
            |--------------------------------------------------------------------------
            */

            if (isRead === '1') {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Diminuer immédiatement le badge
            |--------------------------------------------------------------------------
            */

            const badge =
                document.getElementById('notification-badge');

            if (badge) {

                let count = parseInt(badge.textContent) || 0;

                count--;

                if (count <= 0) {

                    badge.textContent = '0';
                    badge.classList.add('hidden');

                } else {

                    badge.textContent = count;

                }

            }


            /*
            |--------------------------------------------------------------------------
            | Mettre à jour le header
            |--------------------------------------------------------------------------
            */

            const headerCount =
                document.getElementById('notification-header-count');

            const allRead =
                document.getElementById('notification-all-read');


            if (headerCount && allRead) {

                let count = parseInt(
                    headerCount.textContent
                ) || 0;

                count--;

                if (count <= 0) {

                    headerCount.classList.add('hidden');
                    allRead.classList.remove('hidden');

                } else {

                    headerCount.textContent =
                        count + ' non lue' + (count > 1 ? 's' : '');

                }

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Vérification automatique toutes les 3 secondes
    |--------------------------------------------------------------------------
    */

    updateNotificationCount();

    setInterval(updateNotificationCount, 3000);

});

</script>
