<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;


class Form extends Component implements HasForms
{
    use InteractsWithForms;

    public $name;
    public $surname;
    public $height;
    public $weight;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name:')
                ->id('patient-name')
                ->required(),
            TextInput::make('surname:')
                ->id('patient-surname')
                ->required(),
            DatePicker::make('birt_date:')
                ->id('patient-birth-date'),
            Radio::make('gender:')
                ->id('patient-gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])
                ->inline(),
            TextInput::make('height_(cm):')
                ->id('patient-height')
                ->numeric()
                ->minValue(1),
            TextInput::make('weight_(kg):')
                ->id('patient-weight')
                ->numeric()
                ->minValue(1),
            TextInput::make('email:')
                ->email()
                ->numeric()
                ->password()
                ->tel()
                ->url(),
            Textarea::make('Please list any drug allergies:')
                ->rows(5)
                ->cols(20)
                ->maxLength(500),
            CheckboxList::make('Have you ever had_(please check all that apply):')
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
                ->columns(4),
            TextInput::make('other_illnesses:')
                ->id('other-illnesses'),
            Textarea::make('Please list any Operations:')
                ->rows(5)
                ->cols(20)
                ->maxLength(500),
            Textarea::make('Please list your Current Medications:')
                ->rows(5)
                ->cols(20)
                ->maxLength(500),
            Radio::make('smoking feedback')
                ->label('Do you smoke?')
                ->boolean(),
        ];
    }

    public function render()
    {
        return view('livewire.form');
    }
}
