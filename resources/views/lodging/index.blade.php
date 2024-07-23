@extends('app')

@section('title', 'Lodgings Gallery')

@section('body')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Lodgings Gallery</h1>
    </div>

    <div class="row">
        @foreach($lodgings as $lodging)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="{{ $lodging->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $lodging->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($lodging->description, 100) }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="bi bi-house-door"></i> Rooms: {{ $lodging->roomCount }}
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-rulers"></i> Surface: {{ $lodging->surface }} m²
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-currency-dollar"></i> Price: ${{ $lodging->price }}
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('lodging_show', $lodging) }}" class="btn btn-primary">
                            <i class="bi bi-info-circle"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
