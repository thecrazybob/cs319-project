<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::all();

        return view('doctor-schedule.index', compact('schedule'));
    }
}
