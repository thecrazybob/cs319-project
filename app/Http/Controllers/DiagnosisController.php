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
        $diagnosis = Diagnosi::where('patient_id', $patient_id)->get();

        return view('diagnosis.index', compact('diagnosis'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Diagnosis $diagnosi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Diagnosi $diagnosi)
    {
        return view('diagnosis.show', compact('diagnosis'));
    }
}
