@extends('admin/admin-base')
@section('title', 'Admin - Lodging type list')

@section('content')
    <section class="container-fluid mt-4">

        @include('shared/_datatable', [
        'title' => 'LodgingTypes',
        'items' => $lodgingTypes,
        'showDetail' => ['name'],
        'newRoute' => 'admin_lodgingType_create',
        'editRoute' => 'admin_lodgingType_edit',
        'deleteRoute' => 'admin_lodgingType_destroy',
        ])
    </section>
@endsection

