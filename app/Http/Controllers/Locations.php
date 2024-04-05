<?php

namespace App\Http\Controllers;

use App\Models\Location;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Locations extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.locations', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function show(Location $location)
    {

        $weather = $location->weather
            ->sortBy('created_at')
            ->filter(function ($value) {
                return $value->created_at->diffInHours(now()) < 24;
            });

        $chart = (new LarapexChart())->lineChart()
            ->setTitle('Weather Data')
            ->addData('Temperature', $weather->pluck('temperature')->toArray())
            ->addData('Humidity', $weather->pluck('humidity')->toArray())
            ->addData('Wind Speed', $weather->pluck('wind_speed')->toArray())
            ->setXAxis($weather->pluck('created_at')
                ->transform(function ($value) {
                    return Carbon::parse($value)->format('m. d. H:i');
                })
                ->toArray());

        return view('locations.show', compact('location', 'chart'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }


    public function delete(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($request->has('id')) {
            $location = Location::find($request->id);
        } else {
            $location = new \App\Models\Location();
        }

        $location->name = $request->name;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return redirect()->route('locations.index');
    }
}
