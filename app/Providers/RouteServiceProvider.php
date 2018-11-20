<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapClientsApiRoutes();

        $this->mapCompaniesApiRoutes();

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace. '\Admin')
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api', 'api_key_locale')
             ->namespace($this->namespace.'\Api')
             ->group(base_path('routes/api.php'));
    }

    protected function mapClientsApiRoutes()
    {
        Route::prefix('api/clients')
            ->middleware('api','api_key_locale')
            ->namespace($this->namespace.'\Api\Clients')
            ->group(base_path('routes/clients_api.php'));
    }
    protected function mapCompaniesApiRoutes()
    {
        Route::prefix('api/companies')
            ->middleware('api','api_key_locale')
            ->namespace($this->namespace.'\Api\Companies')
            ->group(base_path('routes/companies_api.php'));
    }
}
