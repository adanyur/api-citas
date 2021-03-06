<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paciente extends JsonResource
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
            'id' => $this->cprsna,
            'documento' => $this->ndidntdd,
            'paciente' => $this->ayncnctndo,
            'historia' => $this->historia->nhsld
        ];
    }
}
