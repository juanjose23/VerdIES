<?php

namespace App\Providers;
use App\Models\Privilegios;
use App\Services\PrivilegiosService;
use Illuminate\Support\ServiceProvider;
use App\Services\InventarioService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
