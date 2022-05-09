<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\VaccineStoreRequest;
use App\Http\Requests\VaccineUpdateRequest;

class VaccineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vaccines = Vaccine::where('patient_id', auth()->user()->patient_id)->get();

        return view('vaccine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vaccine $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show($vaccine)
    {
        $vaccine = Vaccine::find($vaccine);
        $file_path = $vaccine->file->file_path;
        return response()->download(storage_path('app/public/' . $file_path));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('vaccine.create');
    }

    public function edit(Request $request, Vaccine $vaccine)
    {
        return view('vaccine.edit', compact('vaccine'));
    }

    /**
     * @param \App\Http\Requests\VaccineStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineStoreRequest $request)
    {
        $vaccine = Vaccine::create($request->validated());

        return redirect()->route('vaccine.index');
    }

    /**
     * @param \App\Http\Requests\VaccineUpdateRequest $request
     * @param \App\Models\Vaccine $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineUpdateRequest $request, Vaccine $vaccine)
    {
        $vaccine->update($request->validated());

        return redirect()->route('vaccine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vaccine $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vaccine $vaccine)
    {
        $vaccine->delete();

        return redirect()->route('vaccine.index');
    }
}
