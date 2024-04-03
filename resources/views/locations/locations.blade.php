@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
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
        <a href="{{ route('locations.create') }}"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Add Location
        </a>
    </div>
@endsection
