<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaTow extends Model
{
    //

    protected $table = 'historias';
    protected $primaryKey='hc_numhis';
    protected $hidden=['hc_numdoc'];
    protected $casts = [
        'hc_numhis' => 'string',
    ];

}
