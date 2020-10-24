<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\MedicoRequest;
use App\Http\Resources\Medicos as MedicosResource;

class Medicos extends Model
{
        protected  $table = "medicos";
        protected $primaryKey = "me_codigo";
        protected $keyType = 'string';

        public function medicosProgramados(MedicoRequest $request)
        {
                $Medico = Programacion::distinct('pr_medico')
                        ->wherePr_fechaAndPr_servicioAndPr_estado($request->fecha, $request->especialidad, 'A')
                        ->with(['medicosprogramados' => function ($q) {
                                $q->select('me_codigo', 'me_nombres');
                        }])->get(['pr_medico']);

                return MedicosResource::collection($Medico);
        }
}
