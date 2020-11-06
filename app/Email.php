<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Email as EmailResource;

class Email extends Model
{
    //

    protected $table = 'citas';
    protected $primaryKey = 'ci_idcita';


    public function especialidad()
    {
        return $this->hasMany(Especialidades::class, 'es_codigo', 'ci_servicio');
    }

    public function  medico()
    {
        return $this->hasMany(Medicos::class, 'me_codigo', 'ci_medico');
    }

    public function turno()
    {

        return $this->hasMany(Turnos::class, 'tu_codigo', 'ci_turno');
    }

    public function pacientedato()
    {

        return $this->hasMany(HistoriaTow::class, 'hc_numhis', 'ci_numhist');
    }

    //FUNCIONES
    public function email($id)
    {
        return  Email::with(['pacientedato' => function ($query) {
            $query->select('hc_numhis', 'hc_apepat', 'hc_apemat', 'hc_nombre');
        }])
            ->with(['especialidad' => function ($query) {
                $query->select('es_codigo', 'es_descripcion');
            }])
            ->with(['medico' => function ($query) {
                $query->select('me_codigo', 'me_nombres', 'me_sexo');
            }])
            ->with(['turno' => function ($query) {
                $query->select('tu_codigo', 'tu_horaini', 'tu_horafin');
            }])
            ->whereCi_idcita($id)
            ->get(['ci_idcita', 'ci_horatencion', 'ci_fechacita', 'ci_numhist', 'ci_servicio', 'ci_medico', 'ci_turno']);

        //return  EmailResource::collection($email);
    }
}
