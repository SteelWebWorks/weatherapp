@extends('layouts.app')

@section('content')
        <h1 class="text-3xl font-bold mb-8">Locations</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-3">
            @foreach ($locations as $location)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-bold">{{ $location->name }}</h2>
                    <a href="{{ route('locations.show', $location) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('locations.edit', $location) }}" class="text-green-500 hover:underline">Edit</a>
                    <a href="{{ route('locations.delete', $location) }}" class="text-red-500 hover:underline">Delete</a>
                </div>
            @endforeach
        </div>
@endsection
