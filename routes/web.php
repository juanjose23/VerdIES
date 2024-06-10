<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Catalogos\CategoriasController;
use App\Http\Controllers\Catalogos\MaterialesController;
use App\Http\Controllers\Catalogos\MonedasController;
use App\Http\Controllers\Catalogos\TasasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PrivilegiosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/validarLogin', [LoginController::class, 'validarLogin'])->name('validarLogin');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/error403',[LoginController::class,'error403'])->name('error403');

//Gestion de catalogos
Route::resource('categorias',CategoriasController::class)->parameters(['categorias' => 'categorias'])->names('categorias')->middleware('checkRole:1');
Route::resource('materiales',MaterialesController::class)->parameters(['materiales' => 'materiales'])->names('materiales')->middleware('checkRole:2');
Route::resource('monedas',MonedasController::class)->parameters(['monedas' => 'monedas'])->names('monedas')->middleware('checkRole:3');
Route::resource('tasas',TasasController::class)->parameters(['tasas' => 'tasas'])->names('tasas')->middleware('checkRole:4');
//Gestion de usuarios
Route::resource('roles',RolesController::class)->parameters(['roles' => 'roles'])->names('roles')->middleware('checkRole:12');
Route::resource('privilegios',PrivilegiosController::class)->parameters(['privilegios' => 'privilegios'])->names('privilegios')->middleware('checkRole:14');
Route::resource('/permisos',PermisoController::class)->parameters(['permisos'=>'permisos'])->names('permisos')->middleware('checkRole:15');
Route::resource('/usuarios',UsersController::class)->parameters(['usuarios'=>'usuarios'])->names('usuarios')->middleware('checkRole:13');
Route::delete('/usuarios/destroyroles/{id}', [UsersController::class, 'destroyroles'])->name('usuarios.destroyroles')->middleware('checkRole:13');
