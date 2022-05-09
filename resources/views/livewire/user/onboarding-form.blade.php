<form wire:submit.prevent="submit">
    {{ $this->form }}

    <div class="my-6 float-right">
        <x-jet-button wire:loading.attr="disabled" class="px-10 py-3 text-lg" type="submit">
            {{ __('Submit') }}
        </x-jet-button>
    </div>
</form>
