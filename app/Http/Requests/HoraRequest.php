<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoraRequest extends FormRequest
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
            'programacion'=>'required'
        ];
    }

    public function messages()
    {
       return [
           'programacion.required'=>'No se ingreso el codigo de programacion'
       ];
    }

}
