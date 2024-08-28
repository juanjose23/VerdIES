<?php

use Illuminate\Support\Facades\Route;


use Modules\Auth\Http\Controllers\LoginController;
use Modules\Auth\Http\Controllers\GoogleController;
use Modules\Auth\Http\Controllers\TwitterController;
use Modules\Auth\Http\Controllers\GithubController;
use Modules\Auth\Http\Controllers\PageController;


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


// Perfiles de usuarios
Route::get('/perfil', [PageController::class, 'perfil'])->name('perfil');
Route::post('/actualizarperfil', [PageController::class, 'actualizarperfil'])->name('actualizarperfil');

//Inicio de session
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/validarLogin', [LoginController::class, 'validarLogin'])->name('validarLogin');

//Inicio con Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

//Inicio con Twitter
Route::controller(TwitterController::class)->group(function(){
    Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('auth/twitter/callback', 'handleTwitterCallback')->name('auth.twitter.callback');
});

//Inicio con Github
Route::controller(GithubController::class)->group(function(){
    Route::get('auth/github', 'redirect')->name('auth.github');
    Route::get('auth/github/callback', 'callback')->name('auth.github.callback');
});

//Registro de usuarios
Route::get('/registro',[LoginController::class,'registro'])->name('registro');
Route::post('/auth/register', [LoginController::class, 'register'])->name('auth.register')->middleware('guest');

//Verificacion de usuarios
Route::get('/email/verify/{id}/{hash}', [LoginController::class, 'verify'])->name('verification.verify')->middleware('signed');
Route::post('/auth/password/reset', [LoginController::class, 'sendResetLinkEmail'])->name('auth.password.reset'); 

//Recuperacion de contrasena
Route::get('/password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('/auth/password/reset/process', [LoginController::class, 'resetPassword'])->name('auth.password.reset.process');

//Logout
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//Mensaje de autorizacion
Route::get('/error403',[LoginController::class,'error403'])->name('error403');

