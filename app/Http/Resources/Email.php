<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Email extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'historia' => $this->ci_numhist,
            'hora' => $this->ci_horatencion,
            'fechaCita' => date('Y-m-d', strtotime($this->ci_fechacita)),
            'paterno' => $this->pacientedato[0]->hc_apepat,
            'materno' => $this->pacientedato[0]->hc_apemat,
            'nombre' => $this->pacientedato[0]->hc_nombre,
            'especialidad' => $this->especialidad[0]->es_descripcion,
            'medico' => $this->medico[0]->me_nombres
        ];
    }
}
