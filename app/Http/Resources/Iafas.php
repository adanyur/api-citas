<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Iafas extends JsonResource
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
            'id'=>trim($this->ta_codi),
            'descripcion'=>$this->ta_desc
        ];
    }
}
