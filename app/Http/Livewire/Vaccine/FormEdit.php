<?php


namespace App\Http\Livewire\Vaccine;

use App\Models\File;
use App\Models\Vaccine;
use Livewire\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Concerns\InteractsWithForms;

class FormEdit extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    public $name = '';
    public $file_path;
    public $vaccine_date;
    public $vaccine_type;
    public $dose_no;

    public function mount(int $id): void
    {
        $this->vaccine_id = $id;

        $this->form->fill([
            'name' => Vaccine::find($this->vaccine_id)->name,
            'file_path' => Vaccine::find($this->vaccine_id)->file->file_path,
            'vaccine_date' => Vaccine::find($this->vaccine_id)->vaccine_date,
            'vaccine_type' => Vaccine::find($this->vaccine_id)->vaccine_type,
            'dose_no' => Vaccine::find($this->vaccine_id)->dose_no,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
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
                ->label('Vaccine Date:'),
            TextInput::make('dose_no')
                ->numeric()
                ->mask(fn (TextInput\Mask $mask) => $mask
                ->numeric()
                ->integer(),
            ),
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
        ], $this->form->getState());

        File::find(Vaccine::find($this->vaccine_id)->file->id)->update($array);

        Vaccine::find($this->vaccine_id)->update($array);

        toast()->success('Successfully updated vaccine')->push();

        redirect(route('vaccine.index'));
    }

    public function render()
    {
        return view('livewire.vaccine.form-edit');
    }
}
