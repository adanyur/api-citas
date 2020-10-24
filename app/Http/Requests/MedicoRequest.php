<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
            'especialidad' => 'required',
            'historia' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fecha.required' => 'No ingreso la fecha',
            'especialidad.required' => 'No ingreso la especialidad',
            'historia.required' => 'No se ingreso la historia'
        ];
    }
}
