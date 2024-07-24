@extends('app')

@section('title', $lodging->title)

@section('app_content')
    <!-- Header Section with Background Image -->
    @include('shared/_header', [
        'imgUrl' => $lodging->media->first()->path,
        'title' => $lodging->title
    ])

    <!-- Gallery Section -->
    <div class="container my-4">
        <div
            class="overflow-x-scroll"
            style="white-space: nowrap;"
        >
            @foreach($lodging->media as $media)
                <div class="d-inline">
                    <img src="{{ $media->path }}" class="img-fluid rounded-4" alt="{{ $media->alt }}"
                         style="max-width: 320px !important; height: auto !important;">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Lodging Details Section -->

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-3 display-4">Description</h2>


                    {{--                    todo: implement add to favorite feature--}}
                    

                    @include('shared/_button', ['iconClass' => 'star-fill', 'colorClass' => 'warning', 'extraClasses' => 'text-white'])
                </div>
                <p class="fs-4">{{ $lodging->description }}</p>
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
            <a href="{{ route('app_home') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
@endsection
