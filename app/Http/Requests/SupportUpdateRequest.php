<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportUpdateRequest extends FormRequest
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
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'patient_id'    => ['required', 'integer', 'exists:patients,id'],
            'subject'       => ['required', 'string'],
            'status'        => ['required', 'in:new,answered,awaiting,hold,closed'],
            'priority'      => ['required', 'in:low,medium,high,critical'],
        ];
    }
}
