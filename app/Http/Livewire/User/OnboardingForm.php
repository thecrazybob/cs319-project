<?php

namespace App\Http\Livewire\User;

use App\Models\Patient;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class OnboardingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Patient $patient;

    public $bilkent_id;
    public $birth_date;
    public $gender;
    public $height;
    public $weight;
    public $allergies;
    public $conditions;
    public $other_illness;
    public $operations;
    public $current_medications;
    public $smoking;

    public function mount(): void
    {
        $this->form->fill([
            'bilkent_id'         => $this->patient->bilkent_id,
            'birth_date'         => $this->patient->birth_date,
            'gender'             => $this->patient->gender,
            'height'             => $this->patient->height,
            'weight'             => $this->patient->weight,
            'allergies'          => $this->patient->allergies,
            'conditions'         => $this->patient->conditions,
            'other_illness'      => $this->patient->other_illness,
            'operations'         => $this->patient->operations,
            'current_medications'=> $this->patient->current_medications,
            'smoking'            => $this->patient->smoking,
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
                        ->disabled()
                        ->label('Bilkent ID:')
                        ->helperText('Contact help@bilheal.com to change your ID'),
                    DatePicker::make('birth_date')
                        ->required()
                        ->disabled()
                        ->label('Birth Date:')
                        ->helperText('Contact help@bilheal.com to change your birth date'),
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
                    Radio::make('gender')
                        ->options([
                            'male'   => 'Male',
                            'female' => 'Female',
                            'other'  => 'Other',
                        ])
                        ->required()
                        ->label('Gender:')
                        ->inline(),
                ])->columns(2),
            Section::make('Medical History')
                ->schema([
                    Textarea::make('allergies')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list any drug allergies:'),
                    Textarea::make('operations')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(1000)
                        ->label('Please list any operations:'),
                    BelongsToManyCheckboxList::make('conditions')
                        ->label('Have you ever had (Please check all that apply):')
                        ->columns(4)
                        ->relationship('patientConditions', 'name'),
                    Textarea::make('current_medications')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list your current medications:'),
                    TextInput::make('other_illness')
                        ->label('Please list other illnesses that is not on the list:'),
                    Radio::make('smoking')
                        ->label('Do you smoke?')
                        ->boolean()
                        ->required(),
                ])->columns(2),
        ];
    }

    protected function getFormModel(): Patient
    {
        return $this->patient;
    }

    public function submit()
    {
        $this->patient->update($this->form->getState());
        auth()->user()->update(['onboarding_completed' => true]);
        toast()->success('Thank you for the information. You may start using the website')->push();

        return redirect(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.user.onboarding-form');
    }
}
