<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DatabaseResolver
{
    public static function connectDB()
    {
        $tenant = app('tenant');
        config([
            'database.connections.tenant' => [
                'driver'   => 'mysql',
                'host'     => env('DB_HOST'),
                'database' => $tenant->db_name,
                'username' => 'root',
                'password' => 'password',
            ],
        ]);

        DB::purge('tenant');
        DB::setDefaultConnection('tenant');
    }
}
