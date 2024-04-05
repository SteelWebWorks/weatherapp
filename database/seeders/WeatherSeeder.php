<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = \App\Models\Location::all();
        foreach ($locations as $location) {
            for($i = 1; $i <= 12; $i++) {
                $weather = new \App\Models\Weather();
                $weather->timestamps = false;
                $weather->location_id = $location->id;
                $weather->temperature = rand(10, 30);
                $weather->humidity = rand(20, 40);
                $weather->wind_speed = rand(5, 20);
                $weather->created_at = now()->subHours($i);
                $weather->save();
            }
        }

    }
}
