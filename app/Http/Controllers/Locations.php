<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RakibDevs\Weather\Weather;

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
        return view('locations.show', compact('location'));
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
