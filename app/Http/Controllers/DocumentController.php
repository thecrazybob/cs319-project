<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentUpdateRequest;
use App\Models\Document;
use App\Post;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents = Document::where('patient_id', $patient_id)->get();

        return view('document.index', compact('documents'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('document.create');
    }

    /**
     * @param \App\Http\Requests\DocumentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('post.index');
    }

    /**
     * @param \App\Http\Requests\DocumentUpdateRequest $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $document->update($request->validated());

        return redirect()->route('post.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Document $document)
    {
        $document->delete();

        return redirect()->route('document.index');
    }
}
