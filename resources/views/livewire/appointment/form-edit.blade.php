<div class="bg-white min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">

            <form wire:submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">

                {{ $this->form }}

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
