@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Add Location</h1>
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $location->id }}">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input value="{{ $location->name }}" type="text" name="name" id="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <label for="latitude" class="block text-sm font-medium">Latitude</label>
                <input value="{{ $location->latitude }}" type="text" name="latitude" id="latitude" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <label for="longitude" class="block text-sm font-medium">Longitude</label>
                <input value="{{ $location->longitude }}" type="text" name="longitude" id="longitude" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
@endsection
