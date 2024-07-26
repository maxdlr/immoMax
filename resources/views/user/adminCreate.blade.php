@extends('admin/admin-base')
@section('title', 'Admin - Create user')

@section('content')
    <h1>Create User</h1>
    <form action="{{ route('admin_user_store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required/>
        <label>Email:</label>
        <input type="email" name="email" required/>
        @include('shared/_button', [
                        'label' => 'save',
                        'colorClass' => 'primary',
                        'iconClass' => 'floppy-fill'
                    ])    </form>
@endsection
