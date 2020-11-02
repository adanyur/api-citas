<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Programacion;
use App\traits\cacheTrait;
use App\Http\Requests\HoraRequest;

class HoraController extends Controller
{
    use cacheTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $programacion;
    public function __construct(Programacion $programacion)
    {
        $this->programacion = $programacion;
    }



    public function index(HoraRequest $request)
    {
        return response()->json($this->programacion->horas($request), 200);
        //return $this->cacheDataHora($dataHora,$request);
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
