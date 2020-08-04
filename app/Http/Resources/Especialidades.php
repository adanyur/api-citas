<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Especialidades extends JsonResource
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
            'codigo'=>$this->pr_servicio,
            'descripcion'=>$this->especialidadesprogramados->es_descripcion
        ];
    }
}
