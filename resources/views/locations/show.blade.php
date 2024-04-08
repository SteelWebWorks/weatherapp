@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">{{ $location->name }}</h1>

    @if($weather)
        <p>No weather data available for this location in th past 24 ours.</p>
    @else
        {!! $chart->container() !!}

        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}
    @endif
@endsection
