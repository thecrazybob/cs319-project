<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineStoreRequest extends FormRequest
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
            'vaccine_type' => ['required', 'in:covid,other'],
            'dose_no'      => ['required', 'integer'],
            'vaccine_date' => ['required', 'date'],
        ];
    }
}
