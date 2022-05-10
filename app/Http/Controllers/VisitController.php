<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visits = Visit::where('patient_id', auth()->user()->patient->id);
        $appointments = Appointment::where('patient_id', auth()->user()->patient->id);
        $visit_count = $visits->count();
        $visit_date = $visits->latest('visit_date')
        ->first()?->visit_date->format('d M Y');
        $appointment_date = $appointments->oldest('appointment_date')
        ->first()?->appointment_date->format('d M Y');

        return view('visit.index', compact('visits', 'visit_count', 'visit_date', 'appointment_date'));
    }
}
