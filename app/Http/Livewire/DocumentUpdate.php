<?php


namespace App\Http\Livewire;
use App\Models\Document;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;

class DocumentUpdate extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    public $name = '';
    public $file_path;
    public $document_id;

    

    public function mount($id): void
    {
        $this->document_id = $id;
        $this->form->fill([
            'user_id' => auth()->user()->id,
            'name' => Document::find($this->document_id)->name,
            'file_path' => Document::find($this->document_id)->file_path,
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

    public function documentupdate(): void{
        $array = array_merge([
            'user_id' => auth()->user()->id,
        ], $this->form->getState());
        Document::find($this->document_id)->update($array);
        toast()->success('Successfully updated document')->push();
        redirect(route('patient.documents'));
    }

    public function render()
    {
        return view('livewire.document-update');
    }
}
