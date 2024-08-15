<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as RouteServiceProviderAlias;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends RouteServiceProviderAlias
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(function () {
                Route::prefix('client')->group(base_path('routes/client.php'));
            });
        });
    }
}
