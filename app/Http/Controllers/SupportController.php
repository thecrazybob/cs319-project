<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportStoreRequest;
use App\Http\Requests\SupportUpdateRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supports = Support::where('patient_id', $patient_id)->get();

        return view('patient.index', compact('patients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Support $support
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Support $support)
    {
        return view('support.show', compact('support'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('support.create');
    }

    /**
     * @param \App\Http\Requests\SupportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportStoreRequest $request)
    {
        $support = Support::create($request->validated());

        return redirect()->route('support.index');
    }

    /**
     * @param \App\Http\Requests\SupportUpdateRequest $request
     * @param \App\Models\Support $support
     * @return \Illuminate\Http\Response
     */
    public function update(SupportUpdateRequest $request, Support $support)
    {
        $support->update($request->validated());

        return redirect()->route('support.index');
    }
}
