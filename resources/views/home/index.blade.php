@extends('app')

@section('title', 'Home Page')

@section('content')

    @include('lodging/index',
    [
        'lodgings' => $lodgings
    ])

@endsection
