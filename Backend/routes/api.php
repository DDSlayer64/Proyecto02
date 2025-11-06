<?php

use App\Http\Controllers\InicioSController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CasaController2;
use App\Http\Controllers\BichoController;
use App\Http\Controllers\InfoUController;
use App\Http\Controllers\NotificacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get(
    '/prueba',
    function (){
        return response()->json([
            'estado'=>'OK',
            'mensaje'=>'Si puedes leer esto, estas muy cerca'
        ], 200);
    }
);

Route::get(
    '/bichos',
    [BichoController::class, 'verTodos']
);

Route::post(
    '/bicho/nuevo',
    [BichoController::class,'nuevo']
);

Route::post(
    'ingresar',
    function () {
        return response()->json([
            'estado' => 'OK',
            'mensaje' => 'Si podés leer esto, estas muy cerca'
        ], 200);
    }
);

Route::get(
    '/casas',
    [CasaController2::class, 'verCasas']
);

Route::post(
    '/casa/nueva',
    /* function(Request $sol){
        return response()->json(['msg'=>'ok', 'sol'=>$sol->ubicacion], 200);
    } */
    [CasaController2::class, 'nueva']
);


Route::middleware('auth:sanctum')->get(
    '/usuario',
    [InfoUController::class, 'verInfo']);

Route::middleware('web')->post(
    '/login',
    [InicioSController::class, 'login']
);

Route::post(
    '/registro',
     [RegistroController::class, 'nuevo'])->middleware('web');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/notificaciones', [NotificacionController::class, 'index']);
    Route::post('/notificaciones', [NotificacionController::class, 'store']);
    Route::put('/notificaciones/{id}/leer', [NotificacionController::class, 'marcarComoLeido']);
    Route::delete('/notificaciones/{id}', [NotificacionController::class, 'destroy']);
});
