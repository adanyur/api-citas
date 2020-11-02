<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\EspecialidadRequest;
use App\traits\cacheTrait;
use App\Cita;
use App\Especialidades;
use App\Programacion;


class EspecialidadController extends Controller
{
    use cacheTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $especialidades, $cita, $programacion;
    public function __construct(Especialidades $especialidades, Cita $cita, Programacion $programacion)
    {
        $this->especialidades = $especialidades;
        $this->citas = $cita;
        $this->programacion = $programacion;
    }


    public function index(EspecialidadRequest $request)
    {
        if (!$this->programacion->validacionProgramacion($request)) {
            return response()->json(['status' => false, 'message' => 'La fecha seleccionada no tiene programacion']);
        }

        if ($this->citas->validacionCitas($request)) {
            return response()->json(['status' => false, 'message' => 'Ya tiene una cita reservada']);
        }

        return response()->json($this->especialidades->especialidades($request), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidades $especialidade)
    {
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidades $especialidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidades $especialidades)
    {
        //
    }
}
