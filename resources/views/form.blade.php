@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">{{ isset($location) ? $location->name : 'Add Location' }}</h1>
    <form action="{{ isset($location) ? route('locations.update') : route('locations.store') }}" method="POST">
        @csrf
        @isset($location)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $location->id }}">
        @endisset
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name"
                   value="{{ isset($location) ? $location->name : old('name') }}"
                   class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black"
                   required>
        </div>
        <div class="mb-4">
            <label for="latitude" class="block text-sm font-medium">Latitude <span class="text-red-500">*</span></label>
            <input type="text" name="latitude" id="latitude"
                   value="{{ isset($location) ? $location->latitude : old('latitude') }}"
                   class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black"
                   required>
            @error('latitude')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="longitude" class="block text-sm font-medium">Longitude <span class="text-red-500">*</span></label>
            <input type="text" name="longitude" id="longitude"
                   value="{{ isset($location) ? $location->longitude : old('longitude') }}"
                   class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black"
                   required>
            @error('longitude')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <span class="text-red-500">*</span> Required
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                @isset($location)
                    Save
                @else
                    Add
                @endisset
            </button>
        </div>
    </form>
@endsection
