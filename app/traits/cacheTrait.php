<?php


namespace App\traits;

use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TurnoRequest;
use App\Http\Requests\EspecialidadRequest;
use App\Http\Requests\MedicoRequest;
use App\Http\Requests\HoraRequest;

trait cacheTrait
{


    private function cachekey($key, $data)
    {
        if (!cache::has($key)) {
            Cache::put($key, $data, 60);
        }
        return cache::get($key);
    }

    public function cacheDataEspecialidad($data, EspecialidadRequest $request)
    {
        $ruta = $request->path();
        $key = $ruta . $request->fecha;
        return $this->cachekey($key, $data);
    }

    public function cacheDataMedico($data, MedicoRequest $request)
    {
        $ruta = $request->path();
        $key = $ruta . $request->fecha . $request->especialidad;
        return $this->cachekey($key, $data);
    }

    public function  cacheDataTurno($data, TurnoRequest $request)
    {
        $ruta = $request->path();
        $key = $ruta . $request->fecha . $request->especialidad . $request->medico;
        return $this->cachekey($key, $data);
    }

    public function cacheDataHora($data, HoraRequest $request)
    {
        $ruta = $request->path();
        $key = $ruta . $request->programacion;
        return $this->cachekey($key, $data);
    }

    public function  cacheDataIafas($data)
    {
        $key = 'iafas';
        return $this->cachekey($key, $data);
    }
}
