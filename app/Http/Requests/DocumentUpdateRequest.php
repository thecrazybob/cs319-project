<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUpdateRequest extends FormRequest
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
            'patient_id'  => ['required', 'integer', 'exists:patients,id'],
            'file_id'     => ['required', 'integer', 'exists:files,id'],
            'name'        => ['required', 'string'],
            'type'        => ['required', 'string'],
            'upload_date' => ['required', 'date'],
        ];
    }
}
