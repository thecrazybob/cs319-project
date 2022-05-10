<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class FormReply extends Component implements HasForms
{
    use InteractsWithForms;

    public Support $support;

    public $message;

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('message')
                ->required(),
        ];
    }

    public function submit(): void
    {
        $array = array_merge(['user_id' => auth()->user()->id], $this->form->getState());

        $this->support->supportmessages()->create($array);

        toast()->success('Successfully replied to the support ticket')->push();

        redirect(route('support.show', $this->support));
    }

    protected function getFormModel(): Support
    {
        return $this->support;
    }

    public function render()
    {
        return view('livewire.support.form-reply');
    }
}
