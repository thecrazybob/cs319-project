<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;

class FormCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $subject;

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('subject')
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

    public function render()
    {
        return view('livewire.support.form-create');
    }
}
