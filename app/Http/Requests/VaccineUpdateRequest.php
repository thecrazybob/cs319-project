<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineUpdateRequest extends FormRequest
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
            'patient_id'   => ['required', 'integer', 'exists:patients,id'],
            'vaccine_type' => ['required', 'in:covid,other'],
            'vaccine_date' => ['required', 'date'],
            'dose_no'      => ['required', 'integer'],
        ];
    }
}
