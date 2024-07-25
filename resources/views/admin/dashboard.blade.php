@php
    $cards = [
        [
            'title' => 'Lodgings',
            'subtitle' => 'Lodgings Managed',
            'text' => 'You manage <span class="badge bg-primary">' . count($lodgings) . '</span> lodgings',
            'route' => route('admin_lodging_index'),
            'colorClass' => 'primary',
            'label' => 'View lodgings',
        ],
        [
            'title' => 'Clients',
            'subtitle' => 'Active Clients',
            'text' => 'There are <span class="badge bg-success">' . count($users) . '</span> active clients',
            'route' => route('admin_user_index'),
            'colorClass' => 'success',
            'label' => 'View clients',
        ],
        [
            'title' => 'Media',
            'subtitle' => 'Uploaded photos',
            'text' => 'There are <span class="badge bg-warning">' . count($media) . '</span> photos',
            'route' => route('admin_media_index'),
            'colorClass' => 'warning',
            'label' => 'View media',
        ]
    ];
@endphp

@extends('admin/admin-base')
@section('title', 'Admin - Dashboard')

@section('content')

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">Welcome to your Admin Dashboard</h1>
            <p class="lead">Manage your lodgings and clients with ease.</p>
        </div>

        <div class="row row-cols-{{ count($cards) }} mt-4">
            @foreach ($cards as $card)
                <div>
                    <div class="card text-center">
                        <div class="card-header">
                            {{ $card['title'] }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $card['subtitle'] }}</h5>
                            <p class="card-text">{!! $card['text'] !!}</p>
                        </div>
                        <div class="card-footer text-muted">

                            @include('shared/_button',
                            [
                                'route' => $card['route'],
                                'colorClass' => $card['colorClass'],
                                'label' => $card['label'],
                                'iconClass' => 'box-arrow-up-right',
                                'size' => 'lg'
                            ])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
