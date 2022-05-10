<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;

class DiagnosisController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diagnosis.index');
    }

    /**
     * @param \App\Models\Diagnosis $diagnosis
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosis $diagnosi)
    {
        $this->authorize('view', $diagnosi);
        $file_path = $diagnosi->file->file_path;

        return response()->download(storage_path('app/public/'.$file_path));
    }
}
