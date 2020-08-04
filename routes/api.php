<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


//  ******************************************************************************************************************************
//  *************************************************         API CITAS WEB              *****************************************
//  ******************************************************************************************************************************
/*DB::listen(function($query){
    echo "<pre>{$query->sql}-{$query->time}</pre>";
});*/




Route::group(['middleware' => ['cors']], function () {
    Route::post('ingreso', 'LoginDNIController@buscaDNI');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'especialidades' => 'EspecialidadController',
        'medicos' => 'MedicoController',
        'turnos' => 'TurnoController',
        'horas' => 'HoraController',
        'iafas' => 'TarifaController',
        'citas' => 'CitaController',
        'email' => 'EmailController',
        'logout' => 'LoginDNIController@logout',
    ]);
});
