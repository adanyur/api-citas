<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Turnos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'idprogramacion'=>$this->pr_numero,
            'codigo'=>$this->turnosprogramados->tu_codigo,
            'hora_inicio'=>$this->turnosprogramados->tu_horaini,
            'hora_fin'=>$this->turnosprogramados->tu_horafin
        ];
    }
}
