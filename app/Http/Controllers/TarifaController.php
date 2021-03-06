<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\traits\cacheTrait;
use App\Tarifa;

class TarifaController extends Controller
{

    use cacheTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $tarifa;
    public function __construct(Tarifa $tarifa)
    {
        $this->tarifa = $tarifa;
    }

    public function index()
    {
        return response()->json($this->tarifa->TarifasVigentes(), 200);
        //return $this->cacheDataIafas($tarifa->TarifasVigentes());
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
     * @param  \App\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifa $tarifa)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarifa $tarifa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarifa $tarifa)
    {
        //
    }
}
