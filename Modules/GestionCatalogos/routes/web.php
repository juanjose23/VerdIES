<?php

use Illuminate\Support\Facades\Route;
use Modules\GestionCatalogos\Http\Controllers\CategoriasController;
use Modules\GestionCatalogos\Http\Controllers\GestionCatalogosController;

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
    Route::resource('gestioncatalogos', GestionCatalogosController::class)->names('gestioncatalogos');
    
});
Route::resource('categorias',CategoriasController::class)->names('categorias');
Route::resource('materiales',CategoriasController::class)->names('materiales');
Route::resource('monedas',CategoriasController::class)->names('monedas');
Route::resource('tasas',CategoriasController::class)->names('tasas');
Route::resource('areas',CategoriasController::class)->names('areas');
Route::resource('carreras',CategoriasController::class)->names('carreras');
Route::resource('acopios',CategoriasController::class)->names('acopios');
Route::resource('recicladoras',CategoriasController::class)->names('recicladoras');
Route::resource('material',CategoriasController::class)->names('material');
Route::resource('entregas',CategoriasController::class)->names('entregas');
Route::resource('inventarios',CategoriasController::class)->names('inventarios');
Route::resource('roles',CategoriasController::class)->names('roles');
Route::resource('usuarios',CategoriasController::class)->names('usuarios');
Route::resource('privilegios',CategoriasController::class)->names('privilegios');
Route::resource('permisos',CategoriasController::class)->names('permisos');