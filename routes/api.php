<?php

use App\Http\Controllers\Api\AcopiosController;
use App\Http\Controllers\Api\MaterialesController;
use App\Http\Controllers\Api\RecepcionesController;
use App\Http\Controllers\Api\MonedasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('v1/recepcion', RecepcionesController::class)
    ->parameters(['recepciones' => 'recepciones'])
    ->names('v1.recepciones');

Route::resource('v1/centroacopios', AcopiosController::class)
    ->parameters(['acopios' => 'acopios'])
    ->names('v1.centroacopios');

Route::resource('v1/materiales', MaterialesController::class)
    ->parameters(['materiales' => 'materiales'])
    ->names('v1.materiales');

Route::resource('v1/tasacambio', RecepcionesController::class)
    ->parameters(['tasas' => 'tasas'])
    ->names('v1.tasas');

Route::resource('v1/monedas', MonedasController::class)
    ->parameters(['monedas' => 'monedas'])
    ->names('v1.monedas');