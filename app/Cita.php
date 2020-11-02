<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EspecialidadRequest;
use App\Http\Requests\HoraRequest;
use App\Http\Requests\CitaRequest;
use App\Http\Requests\TurnoRequest;


class Cita extends Model
{
    //
    protected $table = 'citas';

    public function validacionCupos(TurnoRequest $request)
    {
        //return Cita::whereCi_programacionAndCi_estado($request->programacion, 'R')->count();
        return Cita::whereCi_fechacitaAndCi_medicoAndCi_servicioAndCi_estado(date_format(date_create_from_format('j/m/Y', $request->fecha), 'Y-m-d'), $request->medico, $request->especialidad, 'R')->count();
    }


    public function validacionCitas(EspecialidadRequest $request)
    {
        return Cita::whereCi_fechacitaAndCi_numhist(
            date_format(date_create_from_format('j/m/Y', $request->fecha), 'Y-m-d'),
            str_pad($request->historia, 10, "0", STR_PAD_LEFT)
        )->count() > 0 ? true : false;
    }


    public function generarcitas(CitaRequest $request)
    {
        return DB::select("select id_status,msj_status,v_retorno,p_mail from  web_generar_citas('" . str_pad($request->historia, 10, "0", STR_PAD_LEFT) . "'::character(10),
                                                                            '" . $request->programacion . "'::character(8),
                                                                            '" . $request->orden . "'::numeric(3,0),
                                                                            '" . $request->hora . "'::character(5),
                                                                            '" . $request->email . "'::character varying(75),
                                                                            '" . $request->movil . "'::character varying(15),
                                                                            '" . $request->cns . "'::text,
                                                                            '" . $request->iafas . "'::character(3))");
    }
}
