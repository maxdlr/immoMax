@extends('app')

@section('title', 'Dashboard')

@section('app_content')
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="mb-4 display-6">{{ \Illuminate\Support\Str::title(Auth::user()->name) }}, this your
                dashboard</h2>
            <h3 class="lead">My favorite Lodgings</h3>
        </div>

        @include('lodging/index', ['lodgings' => Auth::user()->lodgings()->get()])
    </div>
@endsection
