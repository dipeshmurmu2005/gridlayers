<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'title' => 'Explore the Himalayas of Nepal',
                'description' => 'Discover breathtaking mountain views, iconic trekking routes, and authentic Himalayan culture in the heart of Nepal.',
                'button_title' => 'Explore Treks',
                'button_link' => '/tours/trekking',
                'cover_image' => 'tours/banners/himalays-of-nepal.avif',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Everest Base Camp Adventure',
                'description' => 'Walk in the footsteps of legends and experience the world’s highest peak with our expertly guided Everest Base Camp trek.',
                'button_title' => 'View Package',
                'button_link' => '/tours/everest-base-camp',
                'cover_image' => 'tours/banners/everest.webp',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cultural Tours of Kathmandu Valley',
                'description' => 'Explore UNESCO World Heritage sites, ancient temples, and vibrant local culture across Kathmandu, Bhaktapur, and Patan.',
                'button_title' => 'Discover Culture',
                'button_link' => '/tours/cultural',
                'cover_image' => 'tours/banners/kathmandu.webp',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Jungle Safari in Chitwan National Park',
                'description' => 'Experience thrilling jungle safaris, wildlife encounters, and nature walks in Nepal’s most famous national park.',
                'button_title' => 'Book Safari',
                'button_link' => '/tours/chitwan-safari',
                'cover_image' => 'tours/banners/chitwan.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pokhara – City of Lakes',
                'description' => 'Relax in Pokhara with stunning lakes, mountain reflections, adventure sports, and peaceful natural beauty.',
                'button_title' => 'View Tours',
                'button_link' => '/tours/pokhara',
                'cover_image' => 'tours/banners/pokhara.avif',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
