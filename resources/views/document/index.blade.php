<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Documents') }}
                </h2>
                <p class="mt-2 text-sm text-gray-700">All of your documents that you or your doctors provided to the health center.</p>
            </div>
            <div>
                <a href="{{ route('document.create') }}">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Create a document') }}
                    </x-jet-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <livewire:document.table />
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
