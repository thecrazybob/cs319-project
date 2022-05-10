<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class FormCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $subject;
    public $status;
    public $priority;
    public $department_id;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('subject')
            ->required()
            ->label('Subject:'),
            BelongsToSelect::make('department_id')
                ->relationship('department', 'name'),
            Select::make('priority')->options([
                'low'      => 'Low',
                'medium'   => 'Medium',
                'high'     => 'High',
                'critical' => 'Critical',
            ])
            ->required()
            ->label('Priority:'),
        ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'status'     => 'new',
            'patient_id' => auth()->user()->patient->id,
        ], $this->form->getState());

        $support = Support::create($array);

        toast()->success('Successfully created a support ticket')->push();

        redirect(route('support.show', $support));
    }

    protected function getFormModel(): string
    {
        return Support::class;
    }

    public function render()
    {
        return view('livewire.support.form-create');
    }
}
