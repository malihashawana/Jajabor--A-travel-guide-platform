<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;
class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::create([
            'flight_number' => 'FL123',
            'departure' => 'New York',
            'destination' => 'Los Angeles',
            'departure_time' => now()->addDays(2),
            'arrival_time' => now()->addDays(2)->addHours(6),
            'price' => 300.50,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL456',
            'departure' => 'Chicago',
            'destination' => 'Miami',
            'departure_time' => now()->addDays(3),
            'arrival_time' => now()->addDays(3)->addHours(4),
            'price' => 200.75,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL789',
            'departure' => 'San Francisco',
            'destination' => 'Seattle',
            'departure_time' => now()->addDays(1),
            'arrival_time' => now()->addDays(1)->addHours(2),
            'price' => 150.25,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL101',
            'departure' => 'Houston',
            'destination' => 'Denver',
            'departure_time' => now()->addDays(4),
            'arrival_time' => now()->addDays(4)->addHours(3),
            'price' => 180.00,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL202',
            'departure' => 'Boston',
            'destination' => 'Atlanta',
            'departure_time' => now()->addDays(5),
            'arrival_time' => now()->addDays(5)->addHours(5),
            'price' => 220.30,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL303',
            'departure' => 'Las Vegas',
            'destination' => 'Phoenix',
            'departure_time' => now()->addDays(6),
            'arrival_time' => now()->addDays(6)->addHours(1.5),
            'price' => 99.99,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL404',
            'departure' => 'Dallas',
            'destination' => 'San Diego',
            'departure_time' => now()->addDays(7),
            'arrival_time' => now()->addDays(7)->addHours(4.5),
            'price' => 250.40,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL505',
            'departure' => 'Orlando',
            'destination' => 'Charlotte',
            'departure_time' => now()->addDays(8),
            'arrival_time' => now()->addDays(8)->addHours(2.5),
            'price' => 175.80,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL606',
            'departure' => 'Philadelphia',
            'destination' => 'Detroit',
            'departure_time' => now()->addDays(9),
            'arrival_time' => now()->addDays(9)->addHours(2),
            'price' => 120.45,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL707',
            'departure' => 'San Jose',
            'destination' => 'Portland',
            'departure_time' => now()->addDays(10),
            'arrival_time' => now()->addDays(10)->addHours(2.5),
            'price' => 140.30,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL808',
            'departure' => 'Austin',
            'destination' => 'Kansas City',
            'departure_time' => now()->addDays(11),
            'arrival_time' => now()->addDays(11)->addHours(3),
            'price' => 190.20,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL909',
            'departure' => 'Minneapolis',
            'destination' => 'Salt Lake City',
            'departure_time' => now()->addDays(12),
            'arrival_time' => now()->addDays(12)->addHours(3.5),
            'price' => 160.75,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL1010',
            'departure' => 'Nashville',
            'destination' => 'Cleveland',
            'departure_time' => now()->addDays(13),
            'arrival_time' => now()->addDays(13)->addHours(1.5),
            'price' => 110.50,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL1111',
            'departure' => 'Tampa',
            'destination' => 'Baltimore',
            'departure_time' => now()->addDays(14),
            'arrival_time' => now()->addDays(14)->addHours(2),
            'price' => 125.60,
            'is_available' => true,
        ]);

        Flight::create([
            'flight_number' => 'FL1212',
            'departure' => 'Columbus',
            'destination' => 'Indianapolis',
            'departure_time' => now()->addDays(15),
            'arrival_time' => now()->addDays(15)->addHours(1),
            'price' => 90.00,
            'is_available' => true,
        ]);
    }
}
