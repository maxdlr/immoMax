@extends('admin/admin-base')
@section('title', 'Admin - Edit ' . $lodging->title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Lodging : {{$lodging->title}}</h1>
        <form action="{{ route('admin_lodging_update', $lodging) }}" method="POST" enctype="multipart/form-data"
              id="editLodging">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $lodging->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required>{{ $lodging->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="roomCount" class="form-label">Room Count</label>
                <input type="number" class="form-control" id="roomCount" name="roomCount"
                       value="{{ $lodging->roomCount }}" required>
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface" value="{{ $lodging->surface }}"
                       required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" step="0.01" name="price"
                       value="{{ $lodging->price }}" required>
            </div>
            <div class="mb-3">
                <label for="lodging_type_id" class="form-label">Lodging Type</label>
                <select class="form-select" id="lodging_type_id" name="lodging_type_id" required>
                    @foreach($lodgingTypes as $lodgingType)
                        <option
                            value="{{ $lodgingType->id }}" {{ $lodgingType->id == $lodging->lodging_type_id ? 'selected' : '' }}>
                            {{ $lodgingType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="city_id" class="form-label">City</label>
                <select class="form-select" id="city_id" name="city_id" required>
                    @foreach($cities as $city)
                        <option
                            value="{{ $city->id }}" {{ $city->id == $lodging->lodging_type_id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('shared/_upload-input')
        </form>
            
        @if($lodging->media->isNotEmpty())
            <div
                class="d-flex justify-content-start align-items-center flex-wrap"
            >
                @foreach($lodging->media as $media)
                    <div class="position-relative p-1">
                        <img src="{{ $media->path }}" class="img-fluid rounded-4" alt="{{ $media->alt }}"
                             style="max-width: 320px !important; height: auto !important;">
                        <div class="position-absolute top-0 start-0 m-2">
                            <form action="{{ route('admin_media_destroy', $media) }}" method="POST"
                                  id="deleteMedia"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                @include('shared/_button',
                                    [
                                        'form' => 'deleteMedia',
                                        'label' => 'delete',
                                        'colorClass' => 'danger',
                                        'iconClass' => 'trash-fill'
                                    ])
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @include('shared/_button', [
                        'form' => 'editLodging',
                        'label' => 'save',
                        'colorClass' => 'primary',
                        'iconClass' => 'floppy-fill'
                    ])
    </div>
@endsection
