<?php

namespace App\Http\Livewire\Appointment;

use Livewire\Component;
use App\Models\Appointment;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;

class FormCreate extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;

    public $description = '';
    public $doctor_select;
    public $department_select;
    public $appointment_date;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('doctor_id')
                ->minValue(1)
                ->maxValue(10)
                ->required()
                ->integer()
            ->label('Select Doctor:'),
            TextInput::make('department_id')
                ->minValue(1)
                ->maxValue(10)
                ->required()
                ->integer()
            ->label('Select Department:'),
            DatePicker::make('appointment_date')
                ->required()
                ->minDate(now()->addDay(2))
                ->label('appointment_date:'),
            TextInput::make('description')
                ->required()
                ->label('Description:'),
            ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
            'confirmed' => false,
        ], $this->form->getState());


        Appointment::create($array);

        toast()->success('Successfully requested appointment')->push();

        redirect(route('appointment.index'));
    }

    public function render()
    {
        return view('livewire.appointment.form-create');
    }
}
