<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use Illuminate\Http\Request;
use App\traits\cacheTrait;
use App\Medicos;
use App\HistoriaTow;
use Illuminate\Support\Facades\DB;




class MedicoController extends Controller
{

    use cacheTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $medicos, $historia;
    public function __construct(Medicos $medicos, HistoriaTow $historias)
    {
        $this->medicos = $medicos;
        $this->historias = $historias;
    }


    public function index(MedicoRequest $request)
    {

        if (!$this->validacionEdad($request) and $request->especialidad === '001') {
            return response()->json(['status' => false, 'message' => 'Solo se acepta menores de 18 años para Pediatria']);
        }

        if (!$this->validacionGenero($request) and $request->especialidad === '005') {
            return response()->json(['status' => false, 'message' => 'No se acepta genero masculino para Ginecologia']);
        }

        return response()->json($this->medicos->medicosProgramados($request), 200);
        //return $this->cacheDataMedico($dataMedico, $request);
    }



    public function validacionEdad(MedicoRequest $request)
    {
        $data = $this->historias->datosPaciente($request);
        list($dias, $mes, $anio) = explode("/", $data->hc_fecnac);
        $edad = date("Y") - $anio;
        return $request->especialidad === '001' and $edad > 17 ? false : true;
    }



    public function validacionGenero(MedicoRequest $request)
    {
        $data = $this->historias->datosPaciente($request);
        $genero = $data->hc_sexo;
        return $request->especialidad === '005' and $genero === 'M' ? false : true;
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
