<?php

namespace App\Http\Livewire\Vaccine;

use App\Http\Controllers\FileController;
use App\Models\Vaccine;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class FormEdit extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;

    public Vaccine $vaccine;

    public $file = [];
    public $file_path;
    public $vaccine_date;
    public $vaccine_type;
    public $dose_no;

    public function mount(): void
    {
        $this->form->fill([
            'file'         => $this->vaccine->file,
            'file_path'    => $this->vaccine->file->file_path,
            'vaccine_date' => $this->vaccine->vaccine_date,
            'vaccine_type' => $this->vaccine->vaccine_type,
            'dose_no'      => $this->vaccine->dose_no,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('file.name')
                ->required()
                ->label('File Name:'),
            Select::make('vaccine_type')->options([
                'covid' => 'Covid',
                'other' => 'Other',
            ])
                ->required()
                ->label('Vaccine Type:'),
            DatePicker::make('vaccine_date')
                ->required()
                ->maxDate(now()->addDay(1))
                ->label('Vaccine Date:'),
            TextInput::make('dose_no')
                ->minValue(1)
                ->maxValue(10)
                ->required()
                ->integer()
                ->helperText('Please enter a number between 1-10'),
            FileUpload::make('file_path')
                ->preserveFilenames()
                ->maxSize(102400)
                ->acceptedFileTypes(['application/pdf'])
                ->helperText('File size can not exceed 100MB and file must be of the type pdf')
                ->required()
                ->label('Upload File:'),
        ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
            'name'       => $this->file['name'],
        ], $this->form->getState());

        FileController::update($this->vaccine->file->id, $array);

        $this->vaccine->update($array);

        toast()->success('Successfully updated vaccine')->push();

        redirect(route('vaccine.index'));
    }

    protected function getFormModel(): Vaccine
    {
        return $this->vaccine;
    }

    public function render()
    {
        return view('livewire.vaccine.form-edit');
    }
}
