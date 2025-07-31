<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app(Router::class)->aliasMiddleware("role", RoleMiddleware::class);
    }
}
