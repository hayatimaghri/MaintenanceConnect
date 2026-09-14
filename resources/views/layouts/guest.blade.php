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
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen bg-[#f4f7fa] px-4 py-8 sm:px-6">
            <div class="mx-auto flex min-h-[calc(100vh-4rem)] w-full max-w-md flex-col justify-center">
                <a href="/" class="flex justify-center">
                    <x-application-logo />
                </a>

            <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-[0_18px_45px_rgba(15,23,42,0.08)] sm:p-8">
                {{ $slot }}
            </div>
            </div>
        </div>
    </body>
</html>
