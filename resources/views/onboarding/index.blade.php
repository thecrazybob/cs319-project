
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Onboarding') }}
        </h2>
        <p class="mt-2 text-sm text-gray-700">Let us get to know you better.</p>
            </div>
    </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden md:rounded-lg">
                            <livewire:user.onboarding-form :patient="auth()->user()->patient" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
