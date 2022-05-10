<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentUpdateRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents = Document::where('patient_id', auth()->user()->patient->id)->get();

        return view('document.index', compact('documents'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document     $document
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Document $document)
    {
        $this->authorize('view', $document);
        $file_path = $document->file->file_path;

        return response()->download(storage_path('app/public/'.$file_path));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('document.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Document $document)
    {
        $this->authorize('update', $document);

        return view('document.edit', compact('document'));
    }

    /**
     * @param \App\Http\Requests\DocumentStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        $document = Document::create($request->validated());

        return redirect()->route('document.index');
    }

    /**
     * @param \App\Http\Requests\DocumentUpdateRequest $request
     * @param \App\Models\Document                     $document
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $document->update($request->validated());

        return redirect()->route('document.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document     $document
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Document $document)
    {
        $this->authorize('delete', $document);
        $document->delete();

        return redirect()->route('document.index');
    }
}
