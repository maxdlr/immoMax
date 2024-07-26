@extends('admin/admin-base')
@section('title', 'Admin - User Edit')

@section('content')
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
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                @foreach($roles as $role)
                    <option
                        value="{{ $role->id }}" {{ $role->id == $user->roles()->get()->first()->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @include('shared/_button', [
                        'label' => 'save',
                        'colorClass' => 'primary',
                        'iconClass' => 'floppy-fill'
                    ])
        @include('shared/_button', [
                        'route' => route('admin_user_index'),
                        'label' => 'Back to list',
                        'colorClass' => 'secondary',
                        'iconClass' => 'arrow-left'
                    ])
    </form>
@endsection
