@extends('app')

@section('body')
    @include('shared/_datatable', [
    'title' => 'lodgings',
    'items' => $lodgings,
    'showDetail' => 'title',
    'newRoute' => 'admin_lodging_create',
    'showRoute' => 'admin_lodging_show',
    'editRoute' => 'admin_lodging_edit',
    'deleteRoute' => 'admin_lodging_destroy',
    ])
@endsection
