<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visits = Visit::where('patient_id', $patient_id)->get();

        return view('visit.index', compact('visits'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visit $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visit $visit)
    {
        return view('visit.show', compact('visit'));
    }
}
