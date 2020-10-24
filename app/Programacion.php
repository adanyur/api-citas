<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Horas as HorasResource;
use App\Http\Requests\HoraRequest;
use App\Http\Requests\EspecialidadRequest;

class Programacion extends Model
{
    protected $table = 'programacion';
    protected $casts = ['pr_servicio' => 'string',];

    //RELACIONES
    public function especialidadesprogramados()
    {
        return $this->belongsTo(Especialidades::class, 'pr_servicio', 'es_codigo');
    }

    public function medicosprogramados()
    {
        return $this->belongsTo(Medicos::class, 'pr_medico', 'me_codigo')->whereMe_estado('A');
    }

    public function turnosprogramados()
    {
        return $this->belongsTo(Turnos::class, 'pr_turno');
    }


    //FUNCIONES
    public function horas(HoraRequest $request)
    {
        return HorasResource::collection(DB::select("select orden,hora from web_ad_generar_plantilla ('" . $request->programacion . "'::varchar)"));
    }

    public function validacionProgramacion(EspecialidadRequest $request)
    {
        return Programacion::wherePr_fechaAndPr_estado($request->fecha, 'A')->count() > 0 ? true : false;
    }

    public function validacionCupos(HoraRequest $request)
    {
        return Programacion::wherePr_numero($request->programacion)->first('pr_cupos');
    }
}
