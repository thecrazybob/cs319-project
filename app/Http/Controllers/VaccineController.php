<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineStoreRequest;
use App\Http\Requests\VaccineUpdateRequest;
use App\Models\Test;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vaccines = Vaccine::where('patient_id', auth()->user()->patient->id);
        $tests = Test::where('patient_id', auth()->user()->patient->id);

        $requirement = $vaccines
                        ->where('vaccine_type', 'covid')
                        ->max('dose_no') > 2 ? 'Fulfilling requirement' : 'Requirements not fullfilled';

        $requirement_bool = $vaccines
                            ->where('vaccine_type', 'covid')
                            ->max('dose_no') > 2 ? true : false;
        $dose_count = $vaccines->where('vaccine_type', 'covid')
                        ->max('dose_no');
        $next_dose = $vaccines
                        ->latest('vaccine_date')
                        ->first()?->vaccine_date->addMonths(5)->format('d M Y');
        $last_test = $tests
                        ->where('test_type', 'pcr')->latest('test_date')
                        ->first()?->test_date->format('d M Y');

        return view('vaccine.index', compact('vaccines', 'requirement', 'requirement_bool', 'dose_count', 'next_dose', 'last_test'));
    }

    public function count(): int
    {
        return Vaccine::where('vaccine_type', 'pcr')->count();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vaccine      $vaccine
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        $this->authorize('view', $vaccine);
        $file_path = $vaccine->file->file_path;

        return response()->download(storage_path('app/public/'.$file_path));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('vaccine.create');
    }

    public function edit(Request $request, Vaccine $vaccine)
    {
        $this->authorize('update', $vaccine);

        return view('vaccine.edit', compact('vaccine'));
    }

    /**
     * @param \App\Http\Requests\VaccineStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineStoreRequest $request)
    {
        $vaccine = Vaccine::create($request->validated());

        return redirect()->route('vaccine.index');
    }

    /**
     * @param \App\Http\Requests\VaccineUpdateRequest $request
     * @param \App\Models\Vaccine                     $vaccine
     *
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineUpdateRequest $request, Vaccine $vaccine)
    {
        $this->authorize('update', $vaccine);
        $vaccine->update($request->validated());

        return redirect()->route('vaccine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vaccine      $vaccine
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vaccine $vaccine)
    {
        $this->authorize('delete', $vaccine);
        $vaccine->delete();

        return redirect()->route('vaccine.index');
    }
}
