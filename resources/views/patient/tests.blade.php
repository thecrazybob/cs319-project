<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tests') }}
        </h2>
        <p class="mt-2 text-sm text-gray-700">A list of all your tests in the health center.</p>
            </div>
    </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        <div class="px-4 sm:px-6 lg:px-8">
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
                                            Reference Doctor</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Department</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Date</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                           Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <!-- Odd row -->
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #235343</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Dr. John Doe</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Pathology</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">10th March 2022
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr class="bg-gray-100">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #223923</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Dr. John Doe</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Radiology</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">3rd January 2022
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            #198394</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Dr. John Doe</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Pathology</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">5th August 2021
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
