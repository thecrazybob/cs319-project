<form wire:submit.prevent="submit" class="space-y-8 divide-gray-200">
    <div>
        <label for="comment" class="sr-only">About</label>
        {{ $this->form }}
    </div>
    <div class="mt-3 flex items-center justify-between">
        <span href="#" class="group inline-flex items-start text-sm space-x-2 text-gray-500 hover:text-gray-900">
            <!-- Heroicon name: solid/question-mark-circle -->
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd" />
            </svg>
            <span> For urgent requests, please dial 6666 from campus or (0312) 290 16 66 from your phone. </span>
        </span>
        <button type="submit"
            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Reply</button>
    </div>
</form>
