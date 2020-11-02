<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Turnos;
use App\Programacion;
use App\Cita;
use App\traits\cacheTrait;
use App\Http\Requests\TurnoRequest;



class TurnoController extends Controller
{
    use cacheTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $turnos, $programacion, $cita;
    public function __construct(Turnos $turnos, Programacion $programacion, Cita $cita)
    {
        $this->turnos = $turnos;
        $this->programacion = $programacion;
        $this->cita = $cita;
    }



    public function index(TurnoRequest $request)
    {

        if ($this->validadCupos($request)) {
            return response()->json(['status' => false, 'message' => 'El medico seleccionado ya no cuenta con cupos para el dia de hoy']);
        }
        return response()->json($this->turnos->turnosProgramados($request), 200);
        //return $this->cacheDataTurno($dataTurno,$request);

    }


    public function validadCupos(TurnoRequest $request)
    {
        return $this->numeroCuposCitas($request) === $this->numeroCuposProgramacion($request) ? true : false;
    }

    public function numeroCuposCitas(TurnoRequest $request)
    {
        return $this->cita->validacionCupos($request);
    }


    public function numeroCuposProgramacion(TurnoRequest $request)
    {
        return $this->programacion->validacionCupos($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function show(Turnos $turnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turnos $turnos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turnos $turnos)
    {
        //
    }
}
