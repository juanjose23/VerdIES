<?php

use Illuminate\Support\Facades\Route;
use Modules\Administrador\Http\Controllers\AdministradorController;

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
    Route::resource('administrador', AdministradorController::class)->names('administrador');
});


Route::get('/inicio_admin', [AdministradorController::class,'index']) -> name('inicio');