<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
            'patient_id'       => ['required', 'integer', 'exists:patients,id'],
            'doctor_id'        => ['integer', 'exists:doctors,id'],
            'department_id'    => ['required', 'integer', 'exists:departments,id'],
            'appointment_date' => ['required', 'date'],
            'description'      => ['required', 'string'],
            'confirmed'        => ['required'],
        ];
    }
}
