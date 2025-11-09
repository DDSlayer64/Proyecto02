<?php

use App\Http\Controllers\InicioSController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\InfoUController;
use App\Http\Controllers\NotificacionController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route:: middleware('auth:sanctum')->post(
    '/cerrarSesion',
    [InicioSController::class, 'cerrarSesion']
);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/notificaciones', [NotificacionController::class, 'index']);
    Route::post('/notificaciones', [NotificacionController::class, 'store']);
    Route::put('/notificaciones/{id}/leer', [NotificacionController::class, 'marcarComoLeido']);
    Route::delete('/notificaciones/{id}', [NotificacionController::class, 'destroy']);
});
