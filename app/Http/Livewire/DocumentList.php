<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;
use Usernotnull\Toast\Concerns\WireToast;

class DocumentList extends Component
{
    use WireToast;

    public function render()
    {
        $this->documents = Document::where('user_id', auth()->user()->id)->get();
        return view('patient.documents');
    }

    public function export($id)
    {
        $this->document = Document::find($id);
        $file_path = $this->document->file_path;
        return response()->download(storage_path('app/public/' . $file_path));
    }

    public function remove($id)
    {
        Document::find($id)->delete();

        toast()->success('Successfully deleted')->push();
    }
}

