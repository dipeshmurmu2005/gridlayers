<?php

namespace Database\Seeders;

use App\Enums\TenantStatusEnum;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [];

        foreach ($tenants as $tenant) {
            $tenant = Tenant::create($tenant);
            DB::statement("CREATE DATABASE IF NOT EXISTS mytenant_{$tenant->id}");
        }
    }
}
