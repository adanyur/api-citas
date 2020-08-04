<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Requests\HoraRequest;
use App\Programacion;
use App\Cita;
use App\traits\cacheTrait;

class HoraController extends Controller
{
    use cacheTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $programacion, $cita;
    public function __construct(Programacion $programacion, Cita $cita)
    {
        $this->programacion = $programacion;
        $this->cita = $cita;
    }



    public function index(HoraRequest $request)
    {

        return $this->validadCupos($request) ?
            response()->json(['status' => false, 'message' => 'El turno seleccionado ya no tiene cupos']) :
            response()->json($this->programacion->horas($request),200);
        //return $this->cacheDataHora($dataHora,$request);
    }

    public function validadCupos(HoraRequest $request)
    {
        return $this->numeroCuposCitas($request) === $this->numeroCuposProgramacion($request) ? true : false;
    }

    public function numeroCuposCitas(HoraRequest $request)
    {
        return $this->cita->validacionCupos($request);
    }


    public function numeroCuposProgramacion(HoraRequest $request)
    {
        return $this->programacion->validacionCupos($request)->pr_cupos;
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
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function show(Programacion $programacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programacion $programacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programacion $programacion)
    {
        //
    }
}
