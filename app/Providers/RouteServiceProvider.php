<?php

namespace App\Providers;

use App\Models\Tenant;
use App\Enums\TenantStatusEnum;
use App\Services\RouteResolver;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            $host = request()->getHost();

            $tenant = Tenant::where('domain', $host)
                ->where('status', TenantStatusEnum::ACTIVE)
                ->first();

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            if ($tenant) {
                app()->instance('tenant', $tenant);

                $routesFile = RouteResolver::routesPath();

                if (file_exists($routesFile)) {
                    Route::middleware(['web'])
                        ->group($routesFile);
                }
            }

            // // Standard API routes
            // Route::middleware('api')
            //     ->prefix('api')
            //     ->group(base_path('routes/api.php'));
        });
    }
}
