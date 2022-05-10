<?php

namespace App\Http\Livewire\Appointment;

use Closure;
use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Concerns\InteractsWithForms;

class FormCreate extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;

    public $description;
    public $department_id;
    public $doctor_id;
    public $appointment_date;
    public $timeslot_id;

    protected function getFormSchema(): array
    {
        return [
            BelongsToSelect::make('department_id')
                ->relationship('department', 'name')
                ->required()
                ->label('Select Department:'),
            BelongsToSelect::make('doctor_id')
                ->relationship('doctor', 'id')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name)
                ->required()
                ->label('Select Doctor:'),
            DatePicker::make('appointment_date')
                ->required()
                ->minDate(now()->addDay(1))
                ->maxDate(now()->addDay(8))
                ->label('Appointment Date:')
                ->placeholder("Choose a date")
                ->reactive(),
            TextInput::make('description')
                ->required()
                ->label('Description:'),
            Radio::make('timeslot_id')
                ->hidden(fn (Closure $get) => $get('appointment_date') === null)
                ->options(TimeSlot::whereDate('starting_time', $this->appointment_date)->where('capacity', '!=', 0)->pluck('starting_time', 'id'))
            ];
    }

    public function submit(): void
    {
        $timeslot = TimeSlot::find($this->timeslot_id);

        $timeslot->update([
            'capacity' => $timeslot->capacity - 1
        ]);

        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
            'confirmed' => false,
        ], $this->form->getState());

        Appointment::create($array);

        toast()->success('Successfully requested appointment')->push();

        redirect(route('appointment.index'));
    }

    protected function getFormModel(): string
    {
        return Appointment::class;
    }

    public function render()
    {
        return view('livewire.appointment.form-create');
    }
}
