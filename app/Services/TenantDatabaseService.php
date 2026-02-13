<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class TenantDatabaseService
{
    public function createDatabase(string $databaseName): void
    {
        DB::statement("CREATE DATABASE `$databaseName`");
    }

    public function migrateDatabase(string $databaseName, string $path): void
    {
        config([
            'database.connections.tenant' => [
                'driver'   => 'mysql',
                'host'     => env('DB_HOST'),
                'database' => $databaseName,
                'username' => 'root',
                'password' => 'password',
            ],
        ]);

        DB::purge('tenant');

        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => $path,
            '--force' => true,
        ]);
    }

    public static function getMigrationPath($tenant)
    {
        $business_slug = $tenant->business->slug;
        $path = 'database/migrations/tenant/' . $business_slug;
        return $path;
    }
}
