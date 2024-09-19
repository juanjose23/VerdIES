<?php 
namespace Modules\GestionCatalogos\Providers;
use Modules\GestionCatalogos\Models\Categoria;
use Modules\GestionCatalogos\Policies\CategoriaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        Categoria::class => CategoriaPolicy::class,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
    }
}
