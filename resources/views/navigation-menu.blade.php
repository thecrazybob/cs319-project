<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('support.index') }}" :active="request()->routeIs('support.index')">
                        {{ __('Support') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('test.index') }}" :active="request()->routeIs('test.index')">
                        {{ __('Tests') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('diagnosis.index') }}"
                        :active="request()->routeIs('diagnosis.index')">
                        {{ __('Diagnosis') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('report.index') }}" :active="request()->routeIs('report.index')">
                        {{ __('Reports') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('document.index') }}" :active="request()->routeIs('document.index')">
                        {{ __('Documents') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('vaccine.index') }}" :active="request()->routeIs('vaccine.index')">
                        {{ __('Vaccines') }}
                    </x-jet-nav-link>
                </div>

                <div class="space-x-8 sm:-my-px sm:ml-10 hidden lg:flex">
                    <x-jet-nav-link href="{{ route('visit.index') }}" :active="request()->routeIs('visit.index')">
                        {{ __('Visits') }}
                    </x-jet-nav-link>
                </div>

            </div>

            <div class="hidden lg:flex lg:items-center lg:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <!-- Appointments -->
                            <x-jet-dropdown-link href="{{ route('appointment.index') }}">
                                {{ __('Appointments') }}
                            </x-jet-dropdown-link>

                            <!-- Invoices -->
                            <x-jet-dropdown-link href="{{ route('invoice.index') }}">
                                {{ __('Invoices') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->

    <!-- Mobile menu, show/hide based on mobile menu state. -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden">
        <!--
            Mobile menu overlay, show/hide based on mobile menu state.
            -->
        <div class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

        <!--
            Mobile menu, show/hide based on mobile menu state.
            -->
        <div class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                <div class="pt-3 pb-2">
                    <div class="flex items-center justify-between px-4">
                        <div>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-cyan-600.svg"
                                alt="Workflow">
                        </div>
                        <div class="-mr-2">
                            <button type="button" @click="open = false"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3 px-2 space-y-1">

                        <a href="{{ route('dashboard') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Dashboard') }}</a>

                        <a href="{{ route('support.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Support') }}</a>

                        <a href="{{ route('test.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Tests') }}</a>

                        <a href="{{ route('diagnosis.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Diagnosis') }}</a>

                        <a href="{{ route('report.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Reports') }}</a>

                        <a href="{{ route('document.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Documents') }}</a>

                        <a href="{{ route('vaccine.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Vaccines') }}</a>

                        <a href="{{ route('visit.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Visits') }}</a>

                    </div>
                </div>
                <div class="pt-4 pb-2">
                    <div class="flex items-center px-5">
                        <div class="min-w-0 flex-1">
                            <div class="text-base font-medium text-gray-800 truncate">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500 truncate">{{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <!-- Account Management -->
                        <a href="{{ route('profile.show') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Your
                            Profile') }}</a>

                        <!-- Appointments -->
                        <a href="{{ route('appointment.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Your
                            Appointments') }}</a>

                        <!-- Invoices -->
                        <a href="{{ route('invoice.index') }}"
                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Your
                            Invoices') }}</a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a
                                class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>
