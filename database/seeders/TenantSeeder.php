<?php

namespace Database\Seeders;

use App\Enums\TenantStatusEnum;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'domain' => 'onecafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 1,
                'theme_id' => 1
            ],
            [
                'name' => 'Two Cafe',
                'domain' => 'twocafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 1,
                'theme_id' => 2
            ]
        ];

        foreach ($tenants as $tenant) {
            Tenant::create($tenant);
        }
    }
}
