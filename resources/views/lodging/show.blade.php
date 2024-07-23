@extends('app')

@section('title', $lodging->title)

@section('body')
    <!-- Header Section with Background Image -->
    <div class="bg-image text-white"
         style="background-image: url('https://via.placeholder.com/1200x400'); height: 400px; background-size: cover; background-position: center; position: relative;">
        <div class="d-flex justify-content-center align-items-center h-100"
             style="background-color: rgba(0, 0, 0, 0.5);">
            <h1 class="display-4">{{ $lodging->title }}</h1>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <img src="https://via.placeholder.com/400x300" class="img-fluid rounded" alt="Gallery Image">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://via.placeholder.com/400x300" class="img-fluid rounded" alt="Gallery Image">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://via.placeholder.com/400x300" class="img-fluid rounded" alt="Gallery Image">
            </div>
            <div class="col-md-3 mb-3">
                <img src="https://via.placeholder.com/400x300" class="img-fluid rounded" alt="Gallery Image">
            </div>
        </div>
    </div>

    <!-- Lodging Details Section -->
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="mb-3">Description</h2>
                <p>{{ $lodging->description }}</p>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-house-door"></i> Rooms
                        <span class="badge bg-primary rounded-pill">{{ $lodging->roomCount }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-rulers"></i> Surface
                        <span class="badge bg-primary rounded-pill">{{ $lodging->surface }} m²</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-currency-dollar"></i> Price
                        <span class="badge bg-primary rounded-pill">${{ $lodging->price }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-end">
            <a href="{{ route('lodging_index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
@endsection
