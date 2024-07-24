@extends('user-base')

@section('title', 'Dashboard')

@section('app_content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard</h2>

        <div class="mb-4">
            <h3 class="mb-3">My favorite Lodgings</h3>
            @include('lodging/index', ['lodgings' => Auth::user()->lodgings()->get()])
        </div>
    </div>
@endsection
