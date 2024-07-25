@extends('admin/admin-base')
@section('title', 'Admin - Create Lodging')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create Lodging</h1>
        <form action="{{ route('admin_lodging_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="roomCount" class="form-label">Room Count</label>
                <input type="number" class="form-control" id="roomCount" name="roomCount" required>
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" step="0.01" name="price" required>
            </div>
            <div class="mb-3">
                <label for="lodging_type_id" class="form-label">Lodging Type</label>
                <select class="form-select" id="lodging_type_id" name="lodging_type_id" required>
                    @foreach($lodgingTypes as $lodgingType)
                        <option value="{{ $lodgingType->id }}">{{ $lodgingType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="city_id" class="form-label">City</label>
                <select class="form-select" id="city_id" name="city_id" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            @include('shared/_upload-multiple-input')

            @include('shared/_button', [
                            'label' => 'save',
                            'colorClass' => 'primary',
                            'iconClass' => 'floppy-fill'
                        ])        </form>
    </div>
@endsection
