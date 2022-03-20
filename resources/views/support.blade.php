<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Support Queries') }}
        </h2>
        <p class="mt-2 text-sm text-gray-700">A list of all the support queries you have created so far.</p>
            </div>
        <div>
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Create a ticket') }}
            </x-jet-button>
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
                                            Subject</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            ID</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Department</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Priority</th>
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
                                            Unable to request an appointment</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#0000003</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Reception</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">New
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">LOW
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr class="bg-gray-100">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            Inquiry about blood donation</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#0000002</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Blood Donation</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Closed
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">HIGH
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-red-600 hover:text-red-900">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            Requesting PDF report</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#0000001</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Reception</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">New
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">HIGH
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
