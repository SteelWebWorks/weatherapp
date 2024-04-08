<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WeatherCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather data for all locations and store it in the database.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        info("Cron Job running at ". now());

        $locations = \App\Models\Location::all();
        $weather = new \RakibDevs\Weather\Weather();

        foreach ($locations as $location) {

            $data = $weather->getCurrentByCord($location->latitude, $location->longitude);

            $location->weather()->create([
                'temperature' => $data->main->temp,
                'humidity' => $data->main->humidity,
                'wind_speed' => $data->wind->speed,
            ]);

            info("Weather data for location {$location->name} stored in the database.");
        }

        info("Cron Job finished at ". now());
    }
}
