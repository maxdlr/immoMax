@extends('admin/admin-base')

@section('content')
    @include('shared/_datatable', [
    'title' => 'Lodgings',
    'items' => $lodgings,
    'showDetail' =>
        [
            'title',
            'description',
            'roomCount',
            'surface',
            'price',
            'lodgingType'
        ],
    'newRoute' => 'admin_lodging_create',
    'showRoute' => 'admin_lodging_show',
    'editRoute' => 'admin_lodging_edit',
    'deleteRoute' => 'admin_lodging_destroy',
    ])

@endsection

