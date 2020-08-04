<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadRequest extends FormRequest
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
            'fecha' => 'required',
            'historia' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fecha.required' => 'No ingreso la fecha',
            'historia.required' => 'No ingreso la historia'
        ];
    }
}
