@extends('admin/admin-base')
@section('title', 'Admin - Create Lodging type')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create Lodging Type</h1>
        <form action="{{ route('admin_lodgingType_store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            @include('shared/_button', [
                'label' => 'save',
                'colorClass' => 'primary',
                'iconClass' => 'floppy-fill'
            ])
        </form>
    </div>
@endsection
