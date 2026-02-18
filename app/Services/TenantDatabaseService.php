<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

use function Illuminate\Log\log;

class TenantDatabaseService
{
    public function createDatabase(string $databaseName): void
    {
        DB::statement("CREATE DATABASE `$databaseName`");
    }

    public function migrateFreshDatabase(string $databaseName, string $path): void
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

        Artisan::call('migrate:fresh', [
            '--database' => 'tenant',
            '--path' => $path,
            '--force' => true,
        ]);

        log('newtenant_migration', [$databaseName, $path]);
    }

    public static function getMigrationPath($tenant)
    {
        $business_slug = $tenant->business->slug;
        $path = 'database/migrations/tenant/' . $business_slug;
        return $path;
    }
}
