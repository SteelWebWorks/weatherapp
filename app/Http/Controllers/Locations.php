<?php

namespace App\Http\Controllers;

use App\Models\Location;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use \Illuminate\Contracts\View\View;
use \Illuminate\Foundation\Application;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application as ApplicationContract;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class Locations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|Factory|Application|ApplicationContract
     */
    public function index(): View|Factory|Application|ApplicationContract
    {
        $locations = Location::all();
        return view('locations.locations', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Factory|Application|ApplicationContract
     */
    public function create(): View|Factory|Application|ApplicationContract
    {
        return view('form');
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return View|Factory|Application|ApplicationContract
     */
    public function show(Location $location): View|Factory|Application|ApplicationContract
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

        return view('locations.show', compact('location', 'chart', 'weather'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return View|Factory|Application|ApplicationContract
     */
    public function edit(Location $location): View|Factory|Application|ApplicationContract
    {
        return view('form', compact('location'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Location $location
     * @return RedirectResponse
     */
    public function delete(Location $location): RedirectResponse
    {
        $location->delete();
        return redirect()->route('locations.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($request->has('id')) {
            $location = Location::find($request->id);
            $location->name = $request->name;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();
        } else {
            $location = Location::create([
                'name' => $request->name,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        }

        return redirect()->route('locations.show', $location);
    }
}
