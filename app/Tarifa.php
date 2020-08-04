<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Http\Resources\Iafas as IafasResource;

class Tarifa extends Model
{
    protected $table="tarifa";
    protected $primaryKey='ta_codi';
    protected $keyType = 'string';

    public function TarifasVigentes(){
        $iafas= Tarifa::whereta_flag('1')
                        ->Orderby('ta_desc')
                        ->get(['ta_codi','ta_desc']);

        return IafasResource::collection($iafas);
    }


}
