@extends('admin/admin-base')

@section('content')

    @include(
    'shared/_button',
    [
        'route' => route('admin_lodging_index'),
        'label' => 'manage lodgings',
        'colorClass' => 'primary',
        'iconClass' => '',
        'size' => 'lg'
    ])

    @include(
    'shared/_button',
    [
        'route' => route('admin_user_index'),
        'label' => 'manage users',
        'colorClass' => 'primary',
        'iconClass' => '',
        'size' => 'lg'
    ])

@endsection
