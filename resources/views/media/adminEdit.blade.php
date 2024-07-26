@extends('admin/admin-base')
@section('title', 'Admin - Edit ' . $media->alt)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Media</h1>
        <img src="{{ $media->path }}" alt="{{ $media->alt }}" class="img-fluid mb-3 rounded-4">
        <form action="{{ route('admin_media_update', $media) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('shared/_upload-input')

            @include('shared/_button', [
                            'label' => 'save',
                            'colorClass' => 'primary',
                            'iconClass' => 'floppy-fill'
                        ])        </form>
    </div>
@endsection
