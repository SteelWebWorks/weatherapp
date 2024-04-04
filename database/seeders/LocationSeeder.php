<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Dhaka',
                'latitude' => 23.8103,
                'longitude' => 90.4125,
            ],
            [
                'name' => 'Chittagong',
                'latitude' => 22.3569,
                'longitude' => 91.7832,
            ],
            [
                'name' => 'Khulna',
                'latitude' => 22.8456,
                'longitude' => 89.5403,
            ],
            [
                'name' => 'Rajshahi',
                'latitude' => 24.3636,
                'longitude' => 88.6241,
            ],
            [
                'name' => 'Sylhet',
                'latitude' => 24.8898,
                'longitude' => 91.8715,
            ],
            [
                'name' => 'Barishal',
                'latitude' => 22.7010,
                'longitude' => 90.3535,
            ],
            [
                'name' => 'Rangpur',
                'latitude' => 25.7439,
                'longitude' => 89.2752,
            ],
            [
                'name' => 'Mymensingh',
                'latitude' => 24.7471,
                'longitude' => 90.4203,
            ],
        ];

        foreach ($locations as $location) {
            \App\Models\Location::create($location);
        }
    }
}
