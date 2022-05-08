<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('diagnosis.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Diagnosis $diagnosi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Diagnosis $diagnosis)
    {
        $file_path = $diagnosis->file->file_path;
        return response()->download(storage_path('app/public/'.$file_path));
    }
}
