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
        $tenants = [
            [
                'name' => 'One Cafe',
                'username' => 'onecafe',
                'domain' => 'onecafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 1,
                'db_name' => 'mytenant1',
                'password' => 'password',
                'theme_id' => 1
            ],
            [
                'name' => 'Two Cafe',
                'username' => 'twocafe',
                'domain' => 'twocafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 1,
                'db_name' => 'mytenant2',
                'password' => 'password',
                'theme_id' => 2
            ],
            [
                'name' => 'One Institute',
                'username' => 'oneins',
                'domain' => 'oneins.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 2,
                'db_name' => 'mytenant_3',
                'password' => 'password',
                'theme_id' => 3
            ],
            [
                'name' => 'Two Institute',
                'username' => 'twoins',
                'domain' => 'twoins.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 2,
                'db_name' => 'mytenant_3',
                'password' => 'password',
                'theme_id' => 4
            ]
        ];

        foreach ($tenants as $tenant) {
            $tenant = Tenant::create($tenant);
            DB::statement("CREATE DATABASE IF NOT EXISTS mytenant_{$tenant->id}");
        }
    }
}
