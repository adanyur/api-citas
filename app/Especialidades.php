<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\EspecialidadRequest;
use App\Http\Resources\Especialidades as EspecialidadesResource;

class Especialidades extends Model
{
    protected $table = "especialidades";
    protected $primaryKey = 'es_codigo';
    protected $keyType = 'string';
    protected $casts = ['es_codigo' => 'string',];



    public function especialidades(EspecialidadRequest $request)
    {
        $especialidad = Programacion::distinct('pr_servicio')->wherePr_fechaAndPr_estado($request->fecha, 'A')
            ->with(['especialidadesprogramados' => function ($query) {
                $query->select('es_codigo', 'es_descripcion');
            }])->get(['pr_servicio']);


        return  EspecialidadesResource::collection($especialidad);
    }
}
