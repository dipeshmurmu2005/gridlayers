<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $business_types = [
            [
                'name' => 'Tours',
                'slug' => 'tours',
                'max_limit' => 3,
            ]
        ];
        foreach ($business_types as $business_type) {
            Business::create($business_type);
        }
    }
}
