@extends('admin/admin-base')
@section('title', 'Admin - Edit ' . $lodgingType->name)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Lodging Type</h1>
        <form action="{{ route('admin_lodgingType_update', $lodgingType) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $lodgingType->name }}" required>
            </div>
            @include('shared/_button', [
                            'label' => 'save',
                            'colorClass' => 'primary',
                            'iconClass' => 'floppy-fill'
                        ])        </form>
    </div>
@endsection
