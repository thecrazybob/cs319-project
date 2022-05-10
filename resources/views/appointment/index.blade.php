<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Appointment') }}
                </h2>
                <p class="mt-2 text-sm text-gray-700">Request and view your appointments to the health center.
                </p>
            </div>
            <div>
                <a href="{{ route('appointment.create') }}">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Request an appointment') }}
                    </x-jet-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">



<div class="px-4 sm:px-6 lg:px-8">

    @if(!empty($appointments))
    <div>
        
        <h3 class="text-lg leading-6 font-medium text-gray-900">Visit Stats</h3>

        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="relative bg-white pt-5 px-4 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                <dt>
                    <div class="absolute bg-indigo-500 rounded-md p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>
                    </div>
                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Visits</p>
                </dt>
                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900">{{$visit_count ?? 0}}</p>
                    
                    <p class="ml-2 flex gap-x-1 items-baseline text-sm font-semibold">
                        <span></span>
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
                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Last Visit</p>
                </dt>
                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                    
                    <p class="text-2xl font-semibold text-gray-900">{{$visit_date ?? '0 Visits'}}</p>
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
                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Upcoming Appointment</p>
                </dt>
                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                    <p class="text-2xl font-semibold text-gray-900">{{$appointment_date ?? 'No Upcoming Appointments'}}</p>
                    
                </dd>
            </div>
        </dl>
    </div>
    @endif

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <livewire:appointment.table /> 
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>

