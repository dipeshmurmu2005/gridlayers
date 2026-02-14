<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageDestinations = [

            // ===================== PACKAGE 1: Nepal Highlights Tour =====================
            ['package_id' => 1, 'destination_id' => 1], // Kathmandu
            ['package_id' => 1, 'destination_id' => 2], // Pokhara
            ['package_id' => 1, 'destination_id' => 4], // Lumbini
            ['package_id' => 1, 'destination_id' => 5], // Chitwan

            // ===================== PACKAGE 2: Everest Trek Adventure =====================
            ['package_id' => 2, 'destination_id' => 3], // Everest Base Camp
            ['package_id' => 2, 'destination_id' => 6], // Annapurna Base Camp

            // ===================== PACKAGE 3: India Golden Triangle =====================
            ['package_id' => 3, 'destination_id' => 7], // Delhi
            ['package_id' => 3, 'destination_id' => 8], // Agra
            ['package_id' => 3, 'destination_id' => 9], // Jaipur

            // ===================== PACKAGE 4: India Nature & Beaches =====================
            ['package_id' => 4, 'destination_id' => 10], // Goa
            ['package_id' => 4, 'destination_id' => 11], // Kerala

            // ===================== PACKAGE 5: Bhutan Cultural Journey =====================
            ['package_id' => 5, 'destination_id' => 13], // Paro
            ['package_id' => 5, 'destination_id' => 14], // Thimphu
            ['package_id' => 5, 'destination_id' => 15], // Punakha
            ['package_id' => 5, 'destination_id' => 16], // Bumthang

            // ===================== PACKAGE 6: Tibet Spiritual Tour =====================
            ['package_id' => 6, 'destination_id' => 19], // Lhasa
            ['package_id' => 6, 'destination_id' => 20], // Potala Palace
            ['package_id' => 6, 'destination_id' => 23], // Mount Kailash

            // ===================== PACKAGE 7: Sri Lanka Explorer =====================
            ['package_id' => 7, 'destination_id' => 25], // Colombo
            ['package_id' => 7, 'destination_id' => 26], // Kandy
            ['package_id' => 7, 'destination_id' => 27], // Sigiriya
            ['package_id' => 7, 'destination_id' => 28], // Ella

            // ===================== PACKAGE 8: Sri Lanka Wildlife & Coast =====================
            ['package_id' => 8, 'destination_id' => 29], // Galle
            ['package_id' => 8, 'destination_id' => 30], // Yala National Park

            ['package_id' => 9, 'destination_id' => 13], // Paro
            ['package_id' => 9, 'destination_id' => 14], // Thimphu
            ['package_id' => 9, 'destination_id' => 15], // Punakha
            ['package_id' => 9, 'destination_id' => 16], // Bumthang

            ['package_id' => 10, 'destination_id' => 3], // Everest Base Camp
            ['package_id' => 10, 'destination_id' => 6], // Annapurna Base Camp

            ['package_id' => 11, 'destination_id' => 13], // Paro
            ['package_id' => 11, 'destination_id' => 14], // Thimphu
            ['package_id' => 11, 'destination_id' => 15], // Punakha
            ['package_id' => 11, 'destination_id' => 16], // Bumthang

            ['package_id' => 12, 'destination_id' => 7], // Delhi
            ['package_id' => 12, 'destination_id' => 8], // Agra
            ['package_id' => 12, 'destination_id' => 9], // Jaipur
        ];

        foreach ($packageDestinations as $item) {
            DB::table('package_destinations')->insert([
                'package_id' => $item['package_id'],
                'destination_id' => $item['destination_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
