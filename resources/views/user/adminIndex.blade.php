@extends('admin/admin-base')
@section('title', 'Admin - User list')

@section('content')

    <section class="container-fluid mt-4">
        @include('shared/_datatable', [
            'title' => 'users',
            'items' => $users,
            'showDetail' => ['name', 'email', 'created_at', 'lodgings'],
            'showRoute' => 'admin_user_show',
            'editRoute' => 'admin_user_edit',
            'deleteRoute' => 'admin_user_destroy',
        ])
    </section>

@endsection
