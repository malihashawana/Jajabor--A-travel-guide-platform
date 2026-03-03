<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
<<<<<<< Updated upstream

        // Create hotel entries with prices
        Hotel::create([
            'name' => 'Grand Hotel',
            'location' => 'New York, USA',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'images' => json_encode([
                'images/grand_hotel_1.jpg',
                'images/grand_hotel_2.jpg',
                'images/grand_hotel_3.jpg',
            ]),
            'price' => 250.00, // Price for Grand Hotel
        ]);

        Hotel::create([
            'name' => 'Sea Breeze Resort',
            'location' => 'Malibu, USA',
            'latitude' => 34.0259,
            'longitude' => -118.7798,
            'images' => json_encode([
                'images/sea_breeze_1.jpg',
                'images/sea_breeze_2.jpg',
                'images/sea_breeze_3.jpg',
            ]),
            'price' => 300.00, // Price for Sea Breeze Resort
        ]);

        Hotel::create([
            'name' => 'Divine Eco Resort',
            'location' => 'Cox\'s Bazar, Bangladesh',
            'latitude' => 21.417471476545575,
            'longitude' => 91.98119112029967,
            'images' => json_encode([
                'images/divine_eco1.jpg',
                'images/divine_eco2.jpg',
                'images/divine_eco3.jpg',
            ]),
            'price' => 200.00, // Price for Divine Eco Resort
        ]);

        Hotel::create([
            'name' => 'Ocean Paradise Hotel and Resort',
            'location' => 'Cox\'s Bazar, Bangladesh',
            'latitude' => 21.41867002572701,
            'longitude' => 91.98243566520455,
            'images' => json_encode([
                'images/ocean_paradise1.jpg',
                'images/ocean_paradise2.jpg',
                'images/ocean_paradise3.jpg',
            ]),
            'price' => 350.00, // Price for Ocean Paradise Hotel and Resort
        ]);

        Hotel::create([
            'name' => 'Green Nature Resort and Suites',
            'location' => 'Cox\'s Bazar, Bangladesh',
            'latitude' => 21.419678796998955,
            'longitude' => 91.97932430294233,
            'images' => json_encode([
                'images/green_nature1.jpg',
                'images/green_nature2.jpg',
                'images/green_nature3.jpg',
            ]),
            'price' => 220.00, // Price for Green Nature Resort and Suites
        ]);

        Hotel::create([
            'name' => 'Hotel the Glanz',
            'location' => 'Tokyo, Japan',
            'latitude' => 35.65448539007813,
            'longitude' => 139.73667249054432,
            'images' => json_encode([
                'images/the_glanz1.jpg',
                'images/the_glanz2.jpg',
                'images/the_glanz3.jpg',
            ]),
            'price' => 280.00, // Price for Hotel the Glanz
        ]);

        Hotel::create([
            'name' => 'The Grand Hotel',
            'location' => 'Sylhet, Bangladesh',
            'latitude' => 24.901839776665373,
            'longitude' => 91.86974174805091,
            'images' => json_encode([
                'images/the_grand_hotel1.jpg',
                'images/the_grand_hotel2.jpg',
                'images/the_grand_hotel3.jpg',
            ]),
            'price' => 180.00, // Price for The Grand Hotel
        ]);

        Hotel::create([
            'name' => 'Sylhet Paradise Inn',
            'location' => 'Sylhet, Bangladesh',
            'latitude' => 24.893231854603446,
            'longitude' => 91.8784026200995,
            'images' => json_encode([
                'images/sylhet_paradise1.jpg',
                'images/sylhet_paradise2.jpg',
                'images/sylhet_paradise3.jpg',
            ]),
            'price' => 150.00, // Price for Sylhet Paradise Inn
        ]);

        Hotel::create([
            'name' => 'Blue Marine Resort',
            'location' => 'Saint Martin, Bangladesh',
            'latitude' => 20.63422270943849,
            'longitude' => 92.32688325259814,
            'images' => json_encode([
                'images/blue_marine_resort1.jpg',
                'images/blue_marine_resort2.jpg',
                'images/blue_marine_resort3.jpg',
            ]),
            'price' => 250.00, // Price for Blue Marine Resort
         DB::table('hotels')->insert([
            ['name' => 'Hotel Sunshine', 'location' => "Cox's bazar"],
            ['name' => 'Ocean View Resort', 'location' => "Cox's bazar"],
            ['name' => 'Mountain Lodge', 'location' => "Cox's bazar"],
            ['name' => 'Seaview Lodge', 'location' => "Cox's bazar"],
            ['name' => 'Suite', 'location' => "Cox's bazar"],
            ['name' => 'Skyplane hotel', 'location' => "Cox's bazar"],
=======
        DB::table('hotels')->insert([
            ['name' => 'Hotel Sunshine', 'location' => "Cox's bazar", 'price' => 100],
            ['name' => 'Ocean View Resort', 'location' => "Cox's bazar", 'price' => 200],
            ['name' => 'Mountain Lodge', 'location' => "Cox's bazar", 'price' => 150],
            ['name' => 'Seaview Lodge', 'location' => "Cox's bazar", 'price' => 180],
            ['name' => 'Suite', 'location' => "Cox's bazar", 'price' => 250],
            ['name' => 'Skyplane hotel', 'location' => "Cox's bazar", 'price' => 300],
>>>>>>> Stashed changes
        ]);
    }
}
