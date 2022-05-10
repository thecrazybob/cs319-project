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

            <!-- Mobile menu, show/hide based on mobile menu state. -->
            <div class="lg:hidden">
                <!--
                    Mobile menu overlay, show/hide based on mobile menu state.

                    Entering: "duration-150 ease-out"
                      From: "opacity-0"
                      To: "opacity-100"
                    Leaving: "duration-150 ease-in"
                      From: "opacity-100"
                      To: "opacity-0"
                  -->
                <div class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                <!--
                    Mobile menu, show/hide based on mobile menu state.

                    Entering: "duration-150 ease-out"
                      From: "opacity-0 scale-95"
                      To: "opacity-100 scale-100"
                    Leaving: "duration-150 ease-in"
                      From: "opacity-100 scale-100"
                      To: "opacity-0 scale-95"
                  -->
                <div class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top">
                    <div
                        class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                        <div class="pt-3 pb-2">
                            <div class="flex items-center justify-between px-4">
                                <div>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark-cyan-600.svg"
                                        alt="Workflow">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                                        <span class="sr-only">Close menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Home</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Profile</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Resources</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Company
                                    Directory</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Openings</a>
                            </div>
                        </div>
                        <div class="pt-4 pb-2">
                            <div class="flex items-center px-5">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </div>
                                <div class="ml-3 min-w-0 flex-1">
                                    <div class="text-base font-medium text-gray-800 truncate">Chelsea Hagon</div>
                                    <div class="text-sm font-medium text-gray-500 truncate">chelsea.hagon@example.com
                                    </div>
                                </div>
                                <button type="button"
                                    class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    <span class="sr-only">View notifications</span>
                                    <!-- Heroicon name: outline/bell -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Your
                                    Profile</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Settings</a>

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Sign
                                    out</a>
                            </div>
                        </div>
                    </div>
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
