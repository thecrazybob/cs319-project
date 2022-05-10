<?php

namespace App\Http\Livewire\Document;

use App\Http\Controllers\FileController;
use App\Models\Document;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class FormEdit extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    public $name = '';
    public $file_path;
    public $document_id;

    public function mount(int $id): void
    {
        $this->document_id = $id;

        $this->form->fill([
            'name'      => Document::find($this->document_id)->name,
            'file_path' => Document::find($this->document_id)->file->file_path,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->label('Name:'),
            FileUpload::make('file_path')
                ->preserveFilenames()
                ->maxSize(102400)
                ->acceptedFileTypes(['application/pdf', 'image/jpg', 'image/jpeg', 'image/png'])
                ->helperText('File size can not exceed 100MB and file must be of the type png, jpg, jpeg, pdf')
                ->required()
                ->label('Upload File:'),
        ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
        ], $this->form->getState());

        FileController::update(Document::find($this->document_id)->file->id, $array);

        Document::find($this->document_id)->update($array);

        toast()->success('Successfully updated document')->push();

        redirect(route('document.index'));
    }

    public function render()
    {
        return view('livewire.document.form-edit');
    }
}
