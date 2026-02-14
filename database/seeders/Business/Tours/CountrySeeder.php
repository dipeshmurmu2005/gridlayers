<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Nepal',
                'page_title' => 'Tours & Travel in Nepal',
                'slug' => 'nepal',
                'status' => true,
                'cover_image' => 'tours/countries/1.jpg',
                'images' => json_encode([
                    'countries/nepal-1.jpg',
                    'countries/nepal-2.jpg',
                    'countries/nepal-3.jpg',
                ]),
            ],
            [
                'name' => 'India',
                'page_title' => 'Incredible India Tours',
                'slug' => 'india',
                'status' => true,
                'cover_image' => 'tours/countries/2.avif',
                'images' => json_encode([
                    'countries/india-1.jpg',
                    'countries/india-2.jpg',
                    'countries/india-3.jpg',
                ]),
            ],
            [
                'name' => 'Bhutan',
                'page_title' => 'Discover the Kingdom of Bhutan',
                'slug' => 'bhutan',
                'status' => true,
                'cover_image' => 'tours/countries/3.jpg',
                'images' => json_encode([
                    'countries/bhutan-1.jpg',
                    'countries/bhutan-2.jpg',
                ]),
            ],
            [
                'name' => 'Tibet',
                'page_title' => 'Mystical Tibet Travel Experience',
                'slug' => 'tibet',
                'status' => true,
                'cover_image' => 'tours/countries/4.jpg',
                'images' => json_encode([
                    'countries/tibet-1.jpg',
                    'countries/tibet-2.jpg',
                ]),
            ],
            [
                'name' => 'Sri Lanka',
                'page_title' => 'Sri Lanka Cultural & Beach Tours',
                'slug' => 'sri-lanka',
                'status' => true,
                'cover_image' => 'tours/countries/5.avif',
                'images' => json_encode([
                    'countries/sri-lanka-1.jpg',
                    'countries/sri-lanka-2.jpg',
                    'countries/sri-lanka-3.jpg',
                ]),
            ],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'name' => $country['name'],
                'page_title' => $country['page_title'],
                'slug' => $country['slug'],
                'status' => $country['status'],
                'cover_image' => $country['cover_image'],
                'images' => $country['images'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
