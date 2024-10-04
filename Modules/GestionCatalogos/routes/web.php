<?php

use Modules\GestionCatalogos\Http\Controllers\MonedasController;
use Illuminate\Support\Facades\Route;
use Modules\GestionCatalogos\Http\Controllers\CategoriasController;
use Modules\GestionCatalogos\Http\Controllers\GestionCatalogosController;
use Modules\GestionCatalogos\Http\Controllers\MaterialesController;

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

Route::resource('admin/categorias', CategoriasController::class)->parameters(['categorias' => 'categorias'])->names('categorias')->middleware('auth');
Route::resource('admin/materiales', MaterialesController::class)->parameters(['materiales' => 'materiales'])->names('materiales')->middleware('auth');
Route::resource('admin/monedas', MonedasController::class)->parameters(['monedas' => 'monedas'])->names('monedas')->middleware('auth');
Route::resource('admin/tasas', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('tasas')->middleware('auth');
Route::resource('admin/areas', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('areas')->middleware('auth');
Route::resource('admin/carreras', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('carreras')->middleware('auth');
Route::resource('admin/acopios', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('acopios')->middleware('auth');
Route::resource('admin/recicladoras', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('recicladoras')->middleware('auth');
Route::resource('admin/material', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('material')->middleware('auth');
Route::resource('admin/entregas', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('entregas')->middleware('auth');
Route::resource('admin/inventarios', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('inventarios')->middleware('auth');
Route::resource('admin/roles', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('roles')->middleware('auth');
Route::resource('admin/usuarios', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('usuarios')->middleware('auth');
Route::resource('admin/privilegios', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('privilegios')->middleware('auth');
Route::resource('admin/permisos', CategoriasController::class)->parameters(['marcas' => 'marcas'])->names('permisos')->middleware('auth');