<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origins = ['Frankfurt', 'Genova', 'New York', 'Los Angeles', 'Camberra', 'Beijing',
            'London', 'Paris', 'Prague', 'Warsaw'];
        $destinies = ['Sevilla', 'Bordeaux', 'Donostia', 'Mexico D.C.', 'Tokio',
            'Moscow', 'Oslo', 'Amsterdam', 'Johannesburg', 'Nairobi'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('flights')->insert([
                'name' => "Flight_" . random_int(111, 9999),
                'date' => Carbon::today()->subDays(rand(-200, 365)),
                'origin' => $origins[random_int(0, 9)],
                'destiny' => $destinies[random_int(0, 9)],
                'available_seats' => random_int(0, 250),
            ]);
        }
    }
}
