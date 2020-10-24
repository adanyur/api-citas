<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\MedicoRequest;

class HistoriaTow extends Model
{
    //

    protected $table = 'historias';
    protected $primaryKey = 'hc_numhis';
    protected $hidden = ['hc_numdoc'];
    protected $casts = ['hc_numhis' => 'string',];




    public function datosPaciente(MedicoRequest $request)
    {

        return  HistoriaTow::whereHc_numhis(str_pad($request->historia, 10, "0", STR_PAD_LEFT))->first(['hc_sexo', 'hc_fecnac']);
    }
}
