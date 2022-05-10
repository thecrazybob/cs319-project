<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased h-full">
    <livewire:toasts />
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">

        <header class="@if (request()->routeIs('dashboard') || request()->routeIs('staff.dashboard')) pb-24 @else pb-8 @endif bg-gradient-to-r from-sky-800 to-cyan-600">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
                    <!-- Logo -->
                    <div class="absolute left-0 py-5 flex-shrink-0 lg:static">
                        <a href="{{ route('dashboard') }}">
                            <x-jet-application-logo class="block h-9 w-auto" />
                        </a>
                    </div>

                    @livewire('navigation-menu')
                </div>
            </div>
        </header>

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    @stack('scripts')
</body>

</html>
