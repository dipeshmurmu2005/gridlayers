<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itineraries = [

            /*
            |--------------------------------------------------------------------------
            | PACKAGE 1: Nepal Highlights Tour
            |--------------------------------------------------------------------------
            */
            [
                'package_id' => 1,
                'day' => 1,
                'destination_id' => 1, // Kathmandu
                'title' => 'Arrival in Kathmandu',
                'description' => 'Arrive at Tribhuvan International Airport and transfer to your hotel. Evening free to explore local markets.',
            ],
            [
                'package_id' => 1,
                'day' => 2,
                'destination_id' => 1, // Kathmandu
                'title' => 'Kathmandu Sightseeing',
                'description' => 'Guided tour of UNESCO sites including Pashupatinath, Boudhanath, and Kathmandu Durbar Square.',
            ],
            [
                'package_id' => 1,
                'day' => 3,
                'destination_id' => 2, // Pokhara
                'title' => 'Drive to Pokhara',
                'description' => 'Scenic drive to Pokhara with views of rivers and hills. Evening at Phewa Lake.',
            ],
            [
                'package_id' => 1,
                'day' => 4,
                'destination_id' => 2, // Pokhara
                'title' => 'Pokhara Exploration',
                'description' => 'Visit Davis Falls, Gupteshwor Cave, and enjoy sunrise at Sarangkot.',
            ],
            [
                'package_id' => 1,
                'day' => 5,
                'destination_id' => 5, // Chitwan
                'title' => 'Chitwan Jungle Safari',
                'description' => 'Travel to Chitwan National Park and enjoy a jungle safari with wildlife spotting.',
            ],
            [
                'package_id' => 1,
                'day' => 6,
                'destination_id' => 4, // Lumbini
                'title' => 'Visit Lumbini',
                'description' => 'Explore the birthplace of Lord Buddha and visit international monasteries.',
            ],

            /*
            |--------------------------------------------------------------------------
            | PACKAGE 2: Everest Base Camp Trek
            |--------------------------------------------------------------------------
            */
            [
                'package_id' => 2,
                'day' => 1,
                'destination_id' => 1, // Kathmandu
                'title' => 'Arrival & Trek Preparation',
                'description' => 'Arrival in Kathmandu, trek briefing, and equipment check.',
            ],
            [
                'package_id' => 2,
                'day' => 2,
                'destination_id' => 3, // Everest Base Camp
                'title' => 'Flight to Lukla & Trek to Phakding',
                'description' => 'Scenic flight to Lukla followed by a short trek to Phakding.',
            ],
            [
                'package_id' => 2,
                'day' => 3,
                'destination_id' => 3,
                'title' => 'Trek to Namche Bazaar',
                'description' => 'Trek through suspension bridges and ascend to Namche Bazaar.',
            ],
            [
                'package_id' => 2,
                'day' => 4,
                'destination_id' => 3,
                'title' => 'Acclimatization Day',
                'description' => 'Rest and acclimatization with short hikes around Namche.',
            ],
            [
                'package_id' => 2,
                'day' => 5,
                'destination_id' => 3,
                'title' => 'Trek to Tengboche',
                'description' => 'Trek to Tengboche Monastery with stunning Everest views.',
            ],
            [
                'package_id' => 2,
                'day' => 6,
                'destination_id' => 3,
                'title' => 'Everest Base Camp Visit',
                'description' => 'Reach Everest Base Camp and enjoy a once-in-a-lifetime experience.',
            ],

            /*
            |--------------------------------------------------------------------------
            | PACKAGE 7: Sri Lanka Explorer
            |--------------------------------------------------------------------------
            */
            [
                'package_id' => 7,
                'day' => 1,
                'destination_id' => 25, // Colombo
                'title' => 'Arrival in Colombo',
                'description' => 'Arrival and city tour covering colonial landmarks and markets.',
            ],
            [
                'package_id' => 7,
                'day' => 2,
                'destination_id' => 26, // Kandy
                'title' => 'Colombo to Kandy',
                'description' => 'Drive to Kandy and visit the Temple of the Sacred Tooth Relic.',
            ],
            [
                'package_id' => 7,
                'day' => 3,
                'destination_id' => 27, // Sigiriya
                'title' => 'Sigiriya Rock Fortress',
                'description' => 'Climb the iconic Sigiriya Rock Fortress and explore ancient ruins.',
            ],
            [
                'package_id' => 7,
                'day' => 4,
                'destination_id' => 28, // Ella
                'title' => 'Scenic Train to Ella',
                'description' => 'Enjoy one of the world’s most scenic train journeys to Ella.',
            ],
            [
                'package_id' => 7,
                'day' => 5,
                'destination_id' => 29, // Galle
                'title' => 'Explore Galle Fort',
                'description' => 'Visit the historic Dutch Fort and coastal attractions.',
            ],
            [
                'package_id' => 7,
                'day' => 6,
                'destination_id' => 30, // Yala
                'title' => 'Yala National Park Safari',
                'description' => 'Wildlife safari with chances to spot leopards and elephants.',
            ],

            [
                'package_id' => 9,
                'day' => 1,
                'destination_id' => 7, // Delhi
                'title' => 'Arrival in Delhi',
                'description' => 'Arrive in Delhi and transfer to hotel. Evening free to explore local markets.',
            ],
            [
                'package_id' => 9,
                'day' => 2,
                'destination_id' => 7, // Delhi
                'title' => 'Delhi City Tour',
                'description' => 'Visit Red Fort, Qutub Minar, India Gate, and Humayun’s Tomb.',
            ],
            [
                'package_id' => 9,
                'day' => 3,
                'destination_id' => 8, // Agra
                'title' => 'Delhi to Agra',
                'description' => 'Drive to Agra and visit the iconic Taj Mahal and Agra Fort.',
            ],
            [
                'package_id' => 9,
                'day' => 4,
                'destination_id' => 9, // Jaipur
                'title' => 'Agra to Jaipur',
                'description' => 'En route visit Fatehpur Sikri, then continue to Jaipur.',
            ],
            [
                'package_id' => 9,
                'day' => 5,
                'destination_id' => 9, // Jaipur
                'title' => 'Jaipur Sightseeing',
                'description' => 'Explore Amber Fort, City Palace, and Hawa Mahal.',
            ],
            /*
|--------------------------------------------------------------------------
| PACKAGE 10: India Nature & Beaches
|--------------------------------------------------------------------------
*/
            [
                'package_id' => 10,
                'day' => 1,
                'destination_id' => 10, // Goa
                'title' => 'Arrival in Goa',
                'description' => 'Arrival and relaxation at the beachside resort.',
            ],
            [
                'package_id' => 10,
                'day' => 2,
                'destination_id' => 10, // Goa
                'title' => 'Goa Beach Exploration',
                'description' => 'Visit Baga, Anjuna, and Calangute beaches.',
            ],
            [
                'package_id' => 10,
                'day' => 3,
                'destination_id' => 10, // Goa
                'title' => 'South Goa Tour',
                'description' => 'Explore churches, heritage sites, and peaceful beaches.',
            ],
            [
                'package_id' => 10,
                'day' => 4,
                'destination_id' => 11, // Kerala
                'title' => 'Fly to Kerala',
                'description' => 'Transfer to Kerala and check in at a backwater resort.',
            ],
            [
                'package_id' => 10,
                'day' => 5,
                'destination_id' => 11, // Kerala
                'title' => 'Backwater Cruise',
                'description' => 'Enjoy a houseboat cruise through scenic backwaters.',
            ],
            /*
|--------------------------------------------------------------------------
| PACKAGE 11: Bhutan Cultural Journey
|--------------------------------------------------------------------------
*/
            [
                'package_id' => 11,
                'day' => 1,
                'destination_id' => 13, // Paro
                'title' => 'Arrival in Paro',
                'description' => 'Arrive in Paro and acclimatize. Visit Paro town.',
            ],
            [
                'package_id' => 11,
                'day' => 2,
                'destination_id' => 13, // Paro
                'title' => 'Tiger’s Nest Monastery Hike',
                'description' => 'Hike to the famous Taktsang Monastery.',
            ],
            [
                'package_id' => 11,
                'day' => 3,
                'destination_id' => 14, // Thimphu
                'title' => 'Paro to Thimphu',
                'description' => 'Drive to Thimphu and explore Buddha Dordenma.',
            ],
            [
                'package_id' => 11,
                'day' => 4,
                'destination_id' => 15, // Punakha
                'title' => 'Thimphu to Punakha',
                'description' => 'Visit Dochula Pass and Punakha Dzong.',
            ],
            [
                'package_id' => 11,
                'day' => 5,
                'destination_id' => 16, // Bumthang
                'title' => 'Spiritual Valley of Bumthang',
                'description' => 'Explore ancient monasteries and sacred temples.',
            ],
            /*
|--------------------------------------------------------------------------
| PACKAGE 12: Tibet Spiritual Tour
|--------------------------------------------------------------------------
*/
            [
                'package_id' => 12,
                'day' => 1,
                'destination_id' => 19, // Lhasa
                'title' => 'Arrival in Lhasa',
                'description' => 'Arrival and rest for altitude acclimatization.',
            ],
            [
                'package_id' => 12,
                'day' => 2,
                'destination_id' => 20, // Potala Palace
                'title' => 'Potala Palace Visit',
                'description' => 'Explore the iconic Potala Palace and Jokhang Temple.',
            ],
            [
                'package_id' => 12,
                'day' => 3,
                'destination_id' => 21, // Yamdrok Lake
                'title' => 'Excursion to Yamdrok Lake',
                'description' => 'Drive to the sacred Yamdrok Lake with stunning views.',
            ],
            [
                'package_id' => 12,
                'day' => 4,
                'destination_id' => 23, // Mount Kailash
                'title' => 'Journey to Mount Kailash',
                'description' => 'Travel towards Mount Kailash, a sacred pilgrimage site.',
            ],
            [
                'package_id' => 12,
                'day' => 5,
                'destination_id' => 23, // Mount Kailash
                'title' => 'Kailash Parikrama',
                'description' => 'Begin the holy circumambulation around Mount Kailash.',
            ],
        ];

        foreach ($itineraries as $item) {
            DB::table('package_itineraries')->insert([
                'package_id' => $item['package_id'],
                'day' => $item['day'],
                'destination_id' => $item['destination_id'],
                'title' => $item['title'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
