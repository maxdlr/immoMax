@extends('admin/admin-base')
@section('title', 'Admin - Media list')

@section('content')
    <section class="container-fluid mt-4">

        @include('shared/_datatable', [
        'title' => 'Media',
        'items' => $media,
        'showDetail' => ['path', 'lodging'],
        'newRoute' => 'admin_media_create',
        'showRoute' => 'admin_media_show',
        'editRoute' => 'admin_media_edit',
        'deleteRoute' => 'admin_media_destroy',
        ])
    </section>
@endsection

