@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">{{ $location->name }}</h1>
    {!! $chart->container() !!}

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
