<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Vaccines') }}
                </h2>
                <p class="mt-2 text-sm text-gray-700">All of the your registered vaccines in the health center.
                </p>
            </div>
            <div>
                <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Register a vaccine') }}
                </x-jet-button>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">



        <div class="px-4 sm:px-6 lg:px-8">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">COVID Stats</h3>

                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative bg-white pt-5 px-4 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                        <dt>
                            <div class="absolute bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 fill-white" id="Layer_1" style="enable-background:new 0 0 48 48;"
                                    version="1.1" viewBox="0 0 48 48" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <path
                                            d="M6.6,43l2.8,2.8l0,0l1.5,1.5l1.4-1.4l-1.5-1.5l5.4-5.3l1.5,1.5l0,0l3,2.9l1.4-1.4l-3-2.9l17.7-17.5   c0.6-0.6,0.9-1.3,0.9-2.1c0-0.8-0.3-1.5-0.9-2.1l3.3-3.2L39.5,10l8-8l-1.4-1.4l-8.1,8l-4.4-0.7l-3.3,3.3l0,0c-1.1-1.1-3-1.1-4.2,0   L8.5,28.6l-3-2.9l-1.4,1.4l3,2.9l0,0l1.5,1.5l-5.4,5.3l-1.5-1.5l-1.4,1.4L6.6,43z M34.4,10l3.2,0.5l0.5,3.1l-2.6,2.5L34,14.8   l-2.2-2.2L34.4,10z M27.6,12.5c0.4-0.4,1-0.4,1.3,0l6.5,6.4c0.2,0.2,0.3,0.4,0.3,0.6c0,0.2-0.1,0.5-0.3,0.6L33.7,22l-3.9-3.9   l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9l-2.2,2.2l-3.9-3.9l-1.4,1.4l3.9,3.9   l-3.7,3.6L9.9,30L27.6,12.5z M10,32.9l2.4,2.4l2.4,2.4L9.4,43l-4.8-4.7L10,32.9z" />
                                        <path
                                            d="M40.7,24.7l-0.8-1.3L39,24.7c-0.7,1.1-7,11-7,14.9c0,4.3,3.5,7.8,7.9,7.8c4.3,0,7.9-3.5,7.9-7.8   C47.7,35.7,41.4,25.8,40.7,24.7z M39.8,45.4c-3.2,0-5.9-2.6-5.9-5.8c0-2.5,3.7-9,5.9-12.5c2.2,3.5,5.9,10,5.9,12.5   C45.7,42.8,43.1,45.4,39.8,45.4z" />
                                    </g>
                                </svg>
                            </div>
                            <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Doses</p>
                        </dt>
                        <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">4</p>
                            <p class="ml-2 flex gap-x-1 items-baseline text-sm font-semibold text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 self-center flex-shrink-0 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                <span>Fulfilling requirement</span>
                            </p>
                        </dd>
                    </div>

                    <div class="relative bg-white pt-5 px-4 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                        <dt>
                            <div class="absolute bg-indigo-500 rounded-md p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-sm font-medium text-gray-500 truncate">Next Recommended Dose</p>
                        </dt>
                        <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">30th March 2022</p>
                        </dd>
                    </div>

                    <div class="relative bg-white pt-5 px-4 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                        <dt>
                            <div class="absolute bg-indigo-500 rounded-md p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-sm font-medium text-gray-500 truncate">Last PCR Test</p>
                        </dt>
                        <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">11 January 2022</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-red-600">

                                Positive
                            </p>
                        </dd>
                    </div>
                </dl>
            </div>


            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            ID</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Vaccine Type</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Vaccination Date</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Dose No.</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #235343</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Pfizer-BioNTech
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">19th September
                                            2021</td>


                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">2nd
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr class="bg-gray-100">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #235343</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Pfizer-BioNTech
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">30th August 2021
                                        </td>


                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1st
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #223923</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Sinopharm BIBP
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">28th February 2021
                                        </td>


                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">2nd
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr class="bg-gray-100">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #198394</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Sinopharm BIBP
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">12th February 2021
                                        </td>


                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1st
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
