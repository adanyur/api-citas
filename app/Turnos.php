<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Http\Requests\TurnoRequest;
use App\Http\Resources\Turnos as TurnosResource;

class Turnos extends Model
{
    protected $table = "turnos";
    protected $primaryKey = "tu_codigo";
    protected $keyType = 'string';

    public function turnosProgramados(TurnoRequest $request)
    {
        $turnos = Programacion::wherePr_fechaAndPr_servicioAndPr_medico($request->fecha, $request->especialidad, $request->medico)
            ->with(['turnosprogramados' => function ($q) {
                $q->select('tu_codigo', 'tu_horaini', 'tu_horafin');
            }])->get(['pr_numero', 'pr_turno']);

        return TurnosResource::collection($turnos);
    }
}
