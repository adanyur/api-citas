<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Paciente as PacienteResource;
use App\Http\Requests\AuthRequest;

class Paciente extends Model
{
    //
    protected $connection = 'SERVER2';
    protected $table = 'sgape00';
    protected $primaryKey = 'cprsna';


    public function validacionDocumento(AuthRequest $request)
    {
        return Paciente::whereNdidntddAndSrgstro($request->name, 'V')
            ->with(['historia' => function ($q) {
                $q->whereSrgstro('V');
            }])->exists();
    }


    public function datospaciente(AuthRequest $request)
    {
        $paciente = Paciente::whereNdidntddAndSrgstro($request->name, 'V')
            ->with(['historia' => function ($q) {
                $q->select('cpcnte', 'nhsld');
            }])->get(['cprsna', 'ndidntdd', 'ayncnctndo']);

        return  PacienteResource::collection($paciente);
    }



    //FUNCION DE RELEACIONES DE TABLAS
    public function historia()
    {
        return $this->hasOne(Historia::class, 'cpcnte', 'cprsna');
    }
}
