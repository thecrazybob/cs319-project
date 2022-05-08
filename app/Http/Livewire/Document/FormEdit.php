<?php


namespace App\Http\Livewire\Document;

use App\Models\File;
use Livewire\Component;
use App\Models\Document;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Concerns\InteractsWithForms;

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
            'name' => Document::find($this->document_id)->name,
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
                ->helperText('File size can not exceed 100 MegaBytes')
                ->required()
                ->label('Upload File:'),
        ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
            'type' => pathinfo($this->form->getState()['file_path'], PATHINFO_EXTENSION)
        ], $this->form->getState());

        File::find(Document::find($this->document_id)->file->id)->update($array);

        Document::find($this->document_id)->update($array);

        toast()->success('Successfully updated document')->push();

        redirect(route('document.index'));
    }

    public function render()
    {
        return view('livewire.document.form-edit');
    }
}
