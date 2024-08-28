<?php

use Illuminate\Support\Facades\Route;



Route::middleware('web')
    ->group(function () {
        include base_path('Modules/Auth/Routes/web.php');
        include base_path('Modules/Landingpage/Routes/web.php');
        include base_path('Modules/Administrador/Routes/web.php');
        include base_path('Modules/Cliente/Routes/web.php');
    });




