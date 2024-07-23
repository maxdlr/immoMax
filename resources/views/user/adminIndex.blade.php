@extends('admin/admin-base')

@section('content')

    @include(
    'shared/_datatable',
    [
        'title' => 'users',
        'items' => $users,
        'showDetail' => ['name', 'email', 'created_at'],
        'newRoute' => 'admin_user_create',
        'showRoute' => 'admin_user_show',
        'editRoute' => 'admin_user_edit',
        'deleteRoute' => 'admin_user_destroy',
    ])

@endsection