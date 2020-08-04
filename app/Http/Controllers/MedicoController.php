<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Medicos;
use App\traits\cacheTrait;
use Illuminate\Http\Request;



class MedicoController extends Controller
{

    use cacheTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $medicos;
    public function __construct(Medicos $medicos)
    {
        $this->medicos = $medicos;
    }


    public function index(MedicoRequest $request)
    {
        return response()->json($this->medicos->medicosProgramados($request),200);

        //return $this->cacheDataMedico($dataMedico, $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicos $medicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicos $medicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicos $medicos)
    {
        //
    }
}
