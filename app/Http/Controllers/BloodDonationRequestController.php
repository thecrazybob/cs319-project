<?php

namespace App\Http\Controllers;

use App\Http\Requests\BloodDonationRequestStoreRequest;
use App\Http\Requests\BloodDonationRequestUpdateRequest;
use App\Models\BloodDonationRequest;
use Illuminate\Http\Request;

class BloodDonationRequestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bloodDonationRequests = BloodDonationRequest::where('patient_id', $patient_id)->get();

        return view('blood-donation-request.index', compact('requests'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('blood-donation-request.create');
    }

    /**
     * @param \App\Http\Requests\BloodDonationRequestStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BloodDonationRequestStoreRequest $request)
    {
        $bloodDonationRequest = BloodDonationRequest::create($request->validated());

        return redirect()->route('blood-donation-request.index');
    }

    /**
     * @param \App\Http\Requests\BloodDonationRequestUpdateRequest $request
     * @param \App\Models\BloodDonationRequest                     $bloodDonationRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BloodDonationRequestUpdateRequest $request, BloodDonationRequest $bloodDonationRequest)
    {
        $bloodDonatioRequest->update($request->validated());

        return redirect()->route('blood-donation-request.index');
    }

    /**
     * @param \Illuminate\Http\Request         $request
     * @param \App\Models\BloodDonationRequest $bloodDonationRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BloodDonationRequest $bloodDonationRequest)
    {
        $bloodDonationRequest->delete();

        return redirect()->route('blood-donation-request.index');
    }
}
