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
Route::resource('admin/categorias',CategoriasController::class)->names('categorias');
Route::resource('admin/materiales',CategoriasController::class)->names('materiales');
Route::resource('admin/monedas',CategoriasController::class)->names('monedas');
Route::resource('admin/tasas',CategoriasController::class)->names('tasas');
Route::resource('admin/areas',CategoriasController::class)->names('areas');
Route::resource('admin/carreras',CategoriasController::class)->names('carreras');
Route::resource('admin/acopios',CategoriasController::class)->names('acopios');
Route::resource('admin/recicladoras',CategoriasController::class)->names('recicladoras');
Route::resource('admin/material',CategoriasController::class)->names('material');
Route::resource('admin/entregas',CategoriasController::class)->names('entregas');
Route::resource('admin/inventarios',CategoriasController::class)->names('inventarios');
Route::resource('admin/roles',CategoriasController::class)->names('roles');
Route::resource('admin/usuarios',CategoriasController::class)->names('usuarios');
Route::resource('admin/privilegios',CategoriasController::class)->names('privilegios');
Route::resource('admin/permisos',CategoriasController::class)->names('permisos');