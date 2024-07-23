@extends('admin/admin-base')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ $media->path }}" alt="{{ $media->alt }}" class="img-fluid mb-3 rounded-4">
                <div class="mb-3">
                    <a href="{{ route('admin_media_edit', $media) }}" class="btn btn-warning rounded-pill">Edit</a>
                    <form action="{{ route('admin_media_destroy', $media) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                    </form>
                </div>
                <a href="{{ route('admin_media_index') }}" class="btn btn-secondary rounded-pill">Back to List</a>
            </div>
        </div>
    </div>
@endsection
