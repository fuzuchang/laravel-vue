<?php

namespace App\Providers;

use App\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ApiRouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(app_path('Api/V1/api.php'));
    }
}
