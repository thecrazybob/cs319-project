<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Actions\ButtonAction;
use Livewire\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;


class Form extends Component implements HasForms
{
    use InteractsWithForms;

    //public User $patient;

    public $name = '';
    public $surname = '';
    public $bilkentid = '';
    public $email = '';
    public $birthdate = '';
    public $gender = '';
    public $height = '';
    public $weight = '';
    public $illnesses = [];
    public $drugAllergies = '';
    public $otherIllnesses = '';
    public $operations = '';
    public $medicines = '';
    public $smoke = '';

    public function mount(): void
    {
        $this->fill([
            'name' => $this->name,
            'surname' => $this->surname,
            'bilkentid' => $this->bilkentid,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'height' => $this->height,
            'weight' => $this->weight,
            'illnesses' => $this->illnesses,
            'drugAllergies'=> $this->drugAllergies,
            'otherIllnesses'=> $this->otherIllnesses,
            'operations'=> $this->operations,
            'medicines'=> $this->medicines,
            'smoke'=> $this->smoke,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('General Information')
                ->schema([
                    TextInput::make('name')
                        ->id('patient-name')
                        ->required()
                        ->label('Name:'),
                    TextInput::make('surname')
                        ->id('patient-surname')
                        ->required()
                        ->label('Surname:'),
                    TextInput::make('bilkent-id')
                        ->id('bilkent-id')
                        ->numeric()
                        ->minValue(2000000)
                        ->required()
                        ->label('Bilkent ID:'),
                    TextInput::make('email:')
                        ->email()
                        ->numeric()
                        ->password()
                        ->tel()
                        ->url(),
                    DatePicker::make('birth_date')
                        ->id('patient-birth-date')
                        ->required()
                        ->label('Birth Date:'),
                    Radio::make('gender')
                        ->id('patient-gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])
                        ->required()
                        ->label('Gender:')
                        ->inline(),
                    TextInput::make('height')
                        ->id('patient-height')
                        ->numeric()
                        ->minValue(1)
                        ->required()
                        ->label('Height (cm):'),
                    TextInput::make('weight')
                        ->id('patient-weight')
                        ->numeric()
                        ->minValue(1)
                        ->required()
                        ->label('Weight (kg):'),
                    ]),
            Section::make('Medical History')
                ->schema ([
                    Textarea::make('drug-allergies')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list any drug allergies:'),
                    CheckboxList::make('illnesses')
                        ->options([
                            'h1' => 'Anemia',
                            'h2' => 'Asthma',
                            'h3' => 'Arthritis',
                            'h4' => 'Cancer',
                            'h5' => 'Gout',
                            'h6' => 'Diabetes',
                            'h7' => 'Emotional Disorder',
                            'h8' => 'Epilepsy Seizures',
                            'h9' => 'Fainting Spells',
                            'h10' => 'Gallstones',
                            'h11' => 'Heart Disease',
                            'h12' => 'Heart Attack',
                            'h13' => 'Rheumatic Fever',
                            'h14' => 'High Blood Pressure',
                            'h15' => 'Digestive Problems',
                            'h16' => 'Ulcerative Colitis',
                            'h17' => 'Ulcer Disease',
                            'h18' => 'Hepatitis',
                            'h19' => 'Kidney Disease',
                            'h20' => 'Liver Disease',
                            'h21' => 'Sleep Apnea',
                            'h22' => 'Thyroid Problems',
                            'h23' => 'Tuberculosis',
                            'h24' => 'Venereal Disease',
                            'h25' => 'Neurological Disorders',
                            'h26' => 'Bleeding Disorders',
                            'h27' => 'Lung Disease',
                            'h28' => 'Emphysema',
                        ])
                        ->label('Have you ever had (Please check all that apply):')
                        ->columns(4),
                    TextInput::make('other_illnesses:')
                        ->id('other-illnesses')
                        ->label('Please list other illnesses that is not on the list:'),
                    Textarea::make('operations')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(1000)
                        ->label('Please list any operations:'),
                    Textarea::make('current-medicines')
                        ->rows(5)
                        ->cols(20)
                        ->maxLength(500)
                        ->label('Please list your current medications:'),
                    Radio::make('smoking feedback')
                        ->label('Do you smoke?')
                        ->boolean()
                        ->required(),
                ]),
        ];
    }


//    protected function getFormModel(): User
//    {
//        return $this->patient;
//    }
//    public function create(): void
//    {
//        User::create($this->form->getState());
//    }

//    public function savePost(): void
//    {
//        $this->patient->update(
//            $this->form->getState(),
//        );
//    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('submit')
                ->label('Submit')
                ->url(route('register')),
        ];
    }

    public function render()
    {
        return view('livewire.form');
    }
}
