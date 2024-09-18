<?php

use Illuminate\Support\Facades\Route;
use Modules\Cliente\Http\Controllers\ClienteController;
use Modules\Cliente\Http\Controllers\PromocionesController;
use Modules\Cliente\Http\Controllers\ResiduosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('cliente', ClienteController::class)->names('cliente');
});

Route::get('/clientes/inicio', [ClienteController::class,'index']) -> name('clientes.inicio');

Route::get('/clientes/promociones', [PromocionesController::class,'promociones']) -> name('promociones');

Route::get('/clientes/residuos', [ResiduosController::class,'residuos']) -> name('residuos');

