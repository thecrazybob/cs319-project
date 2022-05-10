<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodDonationRequestUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => ['required', 'integer', 'exists:patients,id'],
            'blood_type' => ['required', 'in:AA,AO,BB,BO,AB,OO'],
            'urgency'    => ['required', 'in:low,medium,high,critical'],
            'approved'   => ['required'],
        ];
    }
}
