<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Support Ticket #{{ $support['id']}}
                </h2>
                <p class="mt-2 text-sm text-gray-700">Last updated at {{ $messages->last()?->updated_at->format('d M Y H:t T') ?? $support->updated_at->format('d M Y H:t T') }}</p>
            </div>
            <div>
                <a href="{{ route('support.index') }}">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Back to my support tickets') }}
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
                        <div class="overflow-hidden md:rounded-lg">

                            <div
                                class="max-w-3xl mx-auto grid grid-cols-1 gap-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                                <div class="space-y-6 lg:col-start-1 lg:col-span-2">


                                    <section aria-labelledby="notes-title">
                                        <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                                            <div class="divide-y divide-gray-200">
                                                <div class="px-4 py-5 sm:px-6">
                                                    <h2 id="notes-title" class="text-lg font-medium text-gray-900">Messages
                                                    </h2>
                                                </div>
                                                <div class="px-4 py-6 sm:px-6">
                                                    <ul role="list" class="space-y-8">

                                                        @forelse ($messages as $message)

                                                        <li>
                                                            <div class="flex space-x-3">
                                                                <div class="flex-shrink-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                                      </svg>
                                                                </div>
                                                                <div>
                                                                    <div class="text-sm">
                                                                        <span
                                                                            class="font-medium text-gray-900">{{ $message->user->name }} - {{ $message->user->staff ? "Staff" : "Patient"}}</span>
                                                                    </div>
                                                                    <div class="mt-1 text-sm text-gray-700">
                                                                        <p>{{ $message->message  }}</p>
                                                                    </div>
                                                                    <div class="mt-2 text-sm space-x-2">
                                                                        <span class="text-gray-500 font-medium">
                                                                            {{ $message->created_at->diffForHumans() }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        @empty

                                                        <h3>No messages found. Type in a message by using the form below:</h3>

                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-6 sm:px-6">
                                                <div class="flex space-x-3">
                                                    <div class="flex-shrink-0 text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                          </svg>
                                                    </div>
                                                    <div class="min-w-0 flex-1">

                                                        <livewire:support.form-reply :support="$support"/>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                    <section class="lg:col-start-3 lg:col-span-1" aria-labelledby="applicant-information-title">
                                        <div class="bg-white shadow sm:rounded-lg">
                                            <div class="px-4 py-5 sm:px-6">
                                                <h2 id="applicant-information-title"
                                                    class="text-lg leading-6 font-medium text-gray-900">Support Ticket Information</h2>
                                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Overview of the support ticket.</p>
                                            </div>
                                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                    <div class="sm:col-span-2">
                                                        <dt class="text-sm font-medium text-gray-500">Subject
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900">{{ $support->subject }}</dd>
                                                    </div>
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-sm font-medium text-gray-500">Status
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($support->status) }}</dd>
                                                    </div>
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-sm font-medium text-gray-500">Priority</dt>
                                                        <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($support->priority) }}</dd>
                                                    </div>
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-sm font-medium text-gray-500">Bilkent ID</dt>
                                                        <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->patient->bilkent_id }}</dd>
                                                    </div>
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-sm font-medium text-gray-500">Created at</dt>
                                                        <dd class="mt-1 text-sm text-gray-900">{{ $support->created_at->format('d M Y') }}</dd>
                                                    </div>
                                                </dl>
                                            </div>
                                            <div>
                                                @if ($support->status !== "closed")
                                                <a href="{{ route('support.close', $support) }}"
                                                    class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Close ticket</a>
                                                @else
                                                <a href="{{ route('support.open', $support) }}"
                                                    class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Re-open ticket</a>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
