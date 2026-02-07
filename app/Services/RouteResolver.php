<?php

namespace App\Services;

class RouteResolver
{
    public static function routesPath(): string
    {
        $tenant = app('tenant');
        return app_path(
            "Business/{$tenant->businessType->name}/routes.php"
        );
    }
}
