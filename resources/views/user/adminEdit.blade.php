@extends('app')

@section('app_content')
    <h1 class="mb-4">Edit User</h1>
    <form action="{{ route('admin_user_update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        @include('shared/_button', [
                        'label' => 'save',
                        'colorClass' => 'primary',
                        'iconClass' => 'floppy-fill'
                    ])
    </form>
@endsection