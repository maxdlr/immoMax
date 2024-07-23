@extends('admin/admin-base')

@section('content')
    @include('shared/_datatable', [
    'title' => 'Media',
    'items' => $media,
    'showDetail' => ['path'],
    'newRoute' => 'admin_media_create',
    'showRoute' => 'admin_media_show',
    'editRoute' => 'admin_media_edit',
    'deleteRoute' => 'admin_media_destroy',
    ])

@endsection

