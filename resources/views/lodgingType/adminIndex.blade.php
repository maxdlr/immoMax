@extends('admin/admin-base')

@section('content')
    @include('shared/_datatable', [
    'title' => 'LodgingTypes',
    'items' => $lodgingTypes,
    'showDetail' => ['name'],
    'newRoute' => 'admin_lodgingType_create',
    'showRoute' => 'admin_lodgingType_show',
    'editRoute' => 'admin_lodgingType_edit',
    'deleteRoute' => 'admin_lodgingType_destroy',
    ])

@endsection

