<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Horas extends JsonResource
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
            'id'=>$this->orden,
            'hora'=>$this->hora
        ];
    }
}
