<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\View\ComponentSlot;

class PatientResource extends Resource
{
    protected static ?string $model = PatientResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name:')
                    ->id('patient-name')
                    ->required(),
                Forms\Components\TextInput::make('surname:')
                    ->id('patient-surname')
                    ->required(),
                Forms\Components\DatePicker::make('birth_date:')
                    ->id('patient-birth-date'),
                Forms\Components\Radio::make('gender:')
                    ->id('patient-gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->inline(),
                Forms\Components\TextInput::make('height_(cm):')
                    ->id('patient-height')
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('weight_(kg):')
                    ->id('patient-weight')
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('email:')
                    ->email()
                    ->numeric()
                    ->password()
                    ->tel()
                    ->url(),
                Forms\Components\Textarea::make('Please list any drug allergies:')
                    ->rows(5)
                    ->cols(20)
                    ->maxLength(500),

                Forms\Components\CheckboxList::make('Have you ever had_(please check all that apply):')
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
                Forms\Components\TextInput::make('other_illnesses:')
                    ->id('other-illnesses'),
                Forms\Components\Textarea::make('Please list any Operations:')
                    ->rows(5)
                    ->cols(20)
                    ->maxLength(500),
                Forms\Components\Textarea::make('Please list your Current Medications:')
                    ->rows(5)
                    ->cols(20)
                    ->maxLength(500),
                Forms\Components\Radio::make('smoking feedback')
                    ->label('Do you smoke?')
                    ->boolean(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
