<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AppointmentController extends Controller
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

        return view('appointment.index', compact('appointments', 'visits', 'visit_count', 'visit_date', 'appointment_date'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment  $appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Appointment $appointment)
    {
        $appointment_date = $appointment->appointment_date;
        $description = $appointment->description;
        $doctor_name = User::where('doctor_id', $appointment->doctor_id)->first()->name;

        return view('appointment.show', compact('appointment', 'appointment_date', 'description', 'doctor_name'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('appointment.create');
    }

    /**
     * @param \App\Http\Requests\AppointmentStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentStoreRequest $request)
    {
        $appointment = Appointment::create($request->validated());

        return redirect()->route('appointment.index');
    }

    /**
     * @param \App\Http\Requests\AppointmentUpdateRequest $request
     * @param \App\Models\Appointment                     $appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentUpdateRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());

        return redirect()->route('appointment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment  $appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointment.index');
    }
}
