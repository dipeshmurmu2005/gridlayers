<?php

namespace Database\Seeders;

use App\Enums\ThemeStatusEnum;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            [
                'business_id' => 1,
                'name' => 'Modern',
                'slug' => 'cafe-modern',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_id' => 1,
                'name' => 'Classic',
                'slug' => 'cafe-classic',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_id' => 2,
                'name' => 'Classic',
                'slug' => 'institute-classic',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_id' => 2,
                'name' => 'Modern',
                'slug' => 'institute-modern',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_id' => 3,
                'name' => 'Classic',
                'slug' => 'tours-classic',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_id' => 3,
                'name' => 'Modern',
                'slug' => 'tours-modern',
                'status' => ThemeStatusEnum::ACTIVE
            ]
        ];
        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
