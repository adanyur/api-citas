<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TurnoRequest;
use App\traits\cacheTrait;
use App\Turnos;


class TurnoController extends Controller
{
    use cacheTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $turnos;
    public function __construct(Turnos $turnos)
    {
        $this->turnos = $turnos;
    }



    public function index(TurnoRequest $request)
    {


        return response()->json($this->turnos->turnosProgramados($request), 200);
        //return $this->cacheDataTurno($dataTurno,$request);

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
