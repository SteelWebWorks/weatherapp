<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather APP</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body class="font-sans antialiased bg-slate-200 text-slate-600 dark:bg-gray-600 dark:text-slate-200">
<nav class="mb-8 bg-slate-400">
    <div class="flex justify-between container mx-auto px-4 py-2">
    <a href="{{ route('locations.index') }}" class="text-lg font-bold">Weather APP</a>
        <div class="flex justify-end gap-1">
            <a href="{{ route('locations.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Location List</a>
            <a href="{{ route('locations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Location</a>
        </div>
    </div>
</nav>
<div class="container mx-auto px-4 py-8">

    @yield('content')
</div>
</body>
</html>
