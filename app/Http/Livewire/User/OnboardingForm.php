<?php

namespace App\Http\Livewire\User;

use App\Models\Patient;
use Livewire\Component;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\BelongsToManyCheckboxList;

class OnboardingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Patient $patient;

    public $bilkent_id = '';
    public $birth_date = '';
    public $gender = '';
    public $height = '';
    public $weight = '';
    public $allergies = '';
    public $conditions = [];
    public $other_illness = '';
    public $operations = '';
    public $current_medications = '';
    public $smoking = '';

    public function mount(): void
    {
        $this->patient = Patient::where('id', auth()->user()->patient->id)->first();

        $this->fill([
            'bilkent_id' => $this->patient->bilkent_id,
            'birth_date' => $this->patient->birth_date,
            'gender' => $this->patient->gender,
            'height' => $this->patient->height,
            'weight' => $this->patient->weight,
            'allergies'=> $this->patient->allergies,
            'conditions' => $this->patient->conditions,
            'other_illness'=> $this->patient->other_illness,
            'operations'=> $this->patient->operations,
            'current_medications'=> $this->patient->current_medications,
            'smoking'=> $this->patient->smoking,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('General Information')
                ->schema([
                    TextInput::make('bilkent_id')
                        ->numeric()
                        ->minLength(4)
                        ->required()
                        ->label('Bilkent ID:'),
                    DatePicker::make('birth_date')
                        ->required()
                        ->label('Birth Date:'),
                    Radio::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                            'other' => 'Other'
                        ])
                        ->required()
                        ->label('Gender:')
                        ->inline(),
                    TextInput::make('height')
                        ->numeric()
                        ->minValue(1)
                        ->required()
                        ->label('Height (cm):'),
                    TextInput::make('weight')
                        ->numeric()
                        ->minValue(1)
                        ->required()
                        ->label('Weight (kg):'),
                ]),
            Section::make('Medical History')
                ->schema([
                    Textarea::make('allergies')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list any drug allergies:'),
                    BelongsToManyCheckboxList::make('conditions')
                        ->label('Have you ever had (Please check all that apply):')
                        ->columns(4)
                        ->relationship('patientConditions', 'name'),
                    TextInput::make('other_illness')
                        ->label('Please list other illnesses that is not on the list:'),
                    Textarea::make('operations')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(1000)
                        ->label('Please list any operations:'),
                    Textarea::make('current_medications')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list your current medications:'),
                    Radio::make('smoking')
                        ->label('Do you smoke?')
                        ->boolean()
                        ->required(),
                ])
        ];
    }

    protected function getFormModel(): Patient
    {
        return $this->patient;
    }

    public function submit(): void
    {
        Patient::where('id', auth()->user()->patient->id)->update($this->form->getState());
        auth()->user()->update(['onboarding_completed' => true]);
    }

    public function render()
    {
        return view('livewire.user.onboarding-form');
    }
}
