<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
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
            //
            'fecha'=>'required',
            'especialidad'=>'required',
            'medico'=>'required',
        ];
    }


    public function messages()
    {
        return [
          'fecha.required'=>'No se ingreso la fecha',
          'especialidad.required'=>'No se ingreso la especialidad',
          'medico.required'=>'No se ingreso el medico'
        ];
    }
}
