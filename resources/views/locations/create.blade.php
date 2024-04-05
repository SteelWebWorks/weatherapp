@extends('layouts.app')

@section('content')
        <h1 class="text-3xl font-bold mb-8">Add Location</h1>
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <label for="latitude" class="block text-sm font-medium">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <label for="longitude" class="block text-sm font-medium">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
            </div>
        </form>
@endsection
