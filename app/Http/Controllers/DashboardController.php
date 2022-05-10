<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Vaccine;
use App\Models\Visit;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('staff', true)->take(5)->get();
        $announcements = Announcement::where('private', false)->take(3)->latest('announcement_date')->get();
        $vaccines = Vaccine::where('patient_id', auth()->user()->patient_id);
        $dose_count = $vaccines->where('vaccine_type', 'covid')
                        ->max('dose_no');
        $appointments = Appointment::where('patient_id', auth()->user()->patient_id);
        $visits = Visit::where('patient_id', auth()->user()->patient_id);
        $visit_count = $visits->count();
        $appointment_count = $appointments->count();

        return view('dashboard', compact('announcements', 'vaccines', 'dose_count', 'appointments', 'visits', 'visit_count', 'appointment_count', 'users'));
    }
}
