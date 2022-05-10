<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeSlotUpdateRequest;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $timeSlots = TimeSlot::all();
    }

    /**
     * @param \App\Http\Requests\TimeSlotUpdateRequest $request
     * @param \App\Models\TimeSlot                     $timeSlot
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TimeSlotUpdateRequest $request, TimeSlot $timeSlot)
    {
        $timeSlot->update($request->validated());

        return redirect()->route('timeSlot.index');
    }
}
