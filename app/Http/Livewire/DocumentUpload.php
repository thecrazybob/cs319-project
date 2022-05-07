<?php

namespace App\Http\Livewire;
use App\Models\Document;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;


class DocumentUpload extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    
    public $name = '';
    public $file_path;

    public function mount(): void
    {
        $this->form->fill([
            'user_id' => auth()->user()->id,
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
    
    public function documentupload(): void{
        $array = array_merge([
            'user_id' => auth()->user()->id,
        ], $this->form->getState());
        $document = Document::create($array);
        toast()->success('Successfully uploaded document')->push();
        redirect('patient.documents');
    }

    public function render()
    {
        return view('livewire.document-upload');
    }
}
