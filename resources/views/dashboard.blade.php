<x-app-layout>

    <div class="min-h-full">

        <main class="-mt-24 pb-8">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="sr-only">Profile</h1>
                <!-- Main 3 column grid -->
                <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                    <!-- Left column -->
                    <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                        <!-- Welcome panel -->
                        <section aria-labelledby="profile-overview-title">
                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                                <div class="bg-white p-6">
                                    <div class="sm:flex sm:items-center sm:justify-between">
                                        <div class="sm:flex sm:space-x-5">
                                            <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            </div>
                                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                                <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ auth()->user()->name }}
                                                </p>
                                                <p class="text-sm font-medium text-gray-600">Student at Bilkent
                                                    University</p>
                                            </div>
                                        </div>
                                        <div class="mt-5 flex justify-center sm:mt-0">
                                            <a href="{{ route('profile.show') }}"
                                                class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                View profile </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                                    <div class="px-6 py-5 text-sm font-medium text-center">
                                        <span class="text-gray-900">{{ $appointment_count ?? 0 }}</span>
                                        <span class="text-gray-600">Upcoming Appointment</span>
                                    </div>

                                    <div class="px-6 py-5 text-sm font-medium text-center">
                                        <span class="text-gray-900">{{ $dose_count ?? 0 }}</span>
                                        <span class="text-gray-600">Vaccine Doses Registered</span>
                                    </div>

                                    <div class="px-6 py-5 text-sm font-medium text-center">
                                        <span class="text-gray-900">{{ $visit_count ?? 0 }}</span>
                                        <span class="text-gray-600">Visits to Health Center</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Actions panel -->
                        <section aria-labelledby="quick-links-title">
                            <div
                                class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
                                <h2 class="sr-only" id="quick-links-title">Quick links</h2>

                                <div
                                    class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
                                            <!-- Heroicon name: outline/clock -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('appointment.create') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Request appointment
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to request an appointment with one of the doctors of the health center.</p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>

                                <div
                                    class="sm:rounded-tr-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-purple-50 text-purple-700 ring-4 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('support.create') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Create a ticket
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to create a support ticket, do not hesitate to open a ticket. The health center's staff will get back to you at the earliest.</p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>

                                <div
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-sky-50 text-sky-700 ring-4 ring-white">
                                            <!-- Heroicon name: outline/users -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('test.index') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                View my tests
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to view all of the tests that you made at the health center. If you believe test is missing/wrong open a ticket and the health center's staff will get back to you at the earliest.</p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>

                                <div
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-yellow-50 text-yellow-700 ring-4 ring-white">
                                            <!-- Heroicon name: outline/cash -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('diagnosis.index') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                View my diagnosis
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to view all of your diagnoses that were made by any doctors that you visited at the health center.If you believe diagnosis is missing/wrong open a ticket and the health center's staff will get back to you at the earliest.</p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>

                                <div
                                    class="sm:rounded-bl-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-rose-50 text-rose-700 ring-4 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('document.index') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                View my documents
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to view all of the documents that you or any doctor that you visited at the health center uploaded to our website. </p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>

                                <div
                                    class="rounded-bl-lg rounded-br-lg sm:rounded-bl-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                    <div>
                                        <span
                                            class="rounded-lg inline-flex p-3 bg-indigo-50 text-indigo-700 ring-4 ring-white">
                                            <svg class="h-6 w-6" viewBox="0 0 48 48">
                                                <g>
                                                    <path
                                                        d="M6.6,43l2.8,2.8l0,0l1.5,1.5l1.4-1.4l-1.5-1.5l5.4-5.3l1.5,1.5l0,0l3,2.9l1.4-1.4l-3-2.9l17.7-17.5   c0.6-0.6,0.9-1.3,0.9-2.1c0-0.8-0.3-1.5-0.9-2.1l3.3-3.2L39.5,10l8-8l-1.4-1.4l-8.1,8l-4.4-0.7l-3.3,3.3l0,0c-1.1-1.1-3-1.1-4.2,0   L8.5,28.6l-3-2.9l-1.4,1.4l3,2.9l0,0l1.5,1.5l-5.4,5.3l-1.5-1.5l-1.4,1.4L6.6,43z M34.4,10l3.2,0.5l0.5,3.1l-2.6,2.5L34,14.8   l-2.2-2.2L34.4,10z M27.6,12.5c0.4-0.4,1-0.4,1.3,0l6.5,6.4c0.2,0.2,0.3,0.4,0.3,0.6c0,0.2-0.1,0.5-0.3,0.6L33.7,22l-3.9-3.9   l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9   l-3.7,3.6L9.9,30L27.6,12.5z M10,32.9l2.4,2.4l2.4,2.4L9.4,43l-4.8-4.7L10,32.9z" />
                                                    <path
                                                        d="M40.7,24.7l-0.8-1.3L39,24.7c-0.7,1.1-7,11-7,14.9c0,4.3,3.5,7.8,7.9,7.8c4.3,0,7.9-3.5,7.9-7.8   C47.7,35.7,41.4,25.8,40.7,24.7z M39.8,45.4c-3.2,0-5.9-2.6-5.9-5.8c0-2.5,3.7-9,5.9-12.5c2.2,3.5,5.9,10,5.9,12.5   C45.7,42.8,43.1,45.4,39.8,45.4z" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-8">
                                        <h3 class="text-lg font-medium">
                                            <a href="{{ route('vaccine.index') }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Show registered vaccines
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">Click here to view all of the vaccines that you or any doctor that you visited at the health center uploaded to our website. You can also find additional helpful information on this page.</p>
                                    </div>
                                    <span
                                        class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                        aria-hidden="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!-- Right column -->
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Announcements -->
                        <section aria-labelledby="announcements-title">
                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                <div class="p-6">
                                    <h2 class="text-base font-medium text-gray-900" id="announcements-title">
                                        {{ __('Announcements') }}</h2>
                                    <div class="flow-root mt-6">
                                        <ul role="list" class="-my-5 divide-y divide-gray-200">

                                            @foreach ($announcements as $announcement)
                                            <li class="py-5">
                                                <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                                    <h3 class="text-sm font-semibold text-gray-800">
                                                        <a href="{{ route('announcement.show', $announcement) }}" class="hover:underline focus:outline-none">
                                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                                            {{ $announcement['title'] }}
                                                        </a>
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                        {{ $announcement['description'] }}</p>
                                                </div>
                                            </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                    <div class="mt-6">
                                        <a href="{{ route('announcement.index') }}"
                                            class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            View all </a>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section aria-labelledby="recent-hires-title">
                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                <div class="p-6">
                                    <h2 class="text-base font-medium text-gray-900" id="recent-hires-title">Available
                                        Doctors</h2>

                                    <div class="flow-root mt-6">
                                        <ul role="list" class="-my-5 divide-y divide-gray-200">
                                            @foreach ($users as $user)
                                                <li class="py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user['name'] }}</p>
                                                        <p class="text-sm text-gray-500 truncate">{{ $user['email'] }}</p>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('appointment.create') }}"
                                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                            Appointment </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left"><span
                        class="block sm:inline">&copy; 2022 Health Center.</span> <span class="block sm:inline">All
                        rights reserved.</span></div>
            </div>
        </footer>
    </div>

</x-app-layout>
