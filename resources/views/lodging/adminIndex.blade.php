@extends('admin/admin-base')
@section('title', 'Admin - Lodging List')

@section('content')
    <section class="container-fluid mt-4">

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
    </section>
@endsection

