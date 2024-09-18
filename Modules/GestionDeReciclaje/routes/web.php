<?php

use Illuminate\Support\Facades\Route;
use Modules\GestionDeReciclaje\Http\Controllers\GestionDeReciclajeController;
use Modules\GestionDeReciclaje\Http\Controllers\InventarioController;

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
    Route::resource('gestiondereciclaje', GestionDeReciclajeController::class)->names('gestiondereciclaje');
});


Route::get('/admin/gestiondereciclaje/inventario', [InventarioController::class,'inventario']) -> name('gestiondereciclaje.inventario');