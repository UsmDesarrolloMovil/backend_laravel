<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\ReglaController;
use App\Http\Controllers\EquiposCampeonatosController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("campeonatos/list/{id?}",[CampeonatoController::class,'list']);


Route::get('jugadores/equipos/{equipo_id}', [JugadorController::class, 'jugadoresPorEquipo']);

Route::apiResource('campeonatos', CampeonatoController::class);
Route::apiResource('equipos', EquipoController::class);
Route::apiResource('jugadores', JugadorController::class);
Route::apiResource('partidos', PartidoController::class);
Route::apiResource('resultados', ResultadoController::class);
Route::apiResource('reglas', ReglaController::class);
Route::apiResource('equipos-campeonatos', EquiposCampeonatosController::class);