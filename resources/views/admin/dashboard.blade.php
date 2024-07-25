@php
    $cards = [
        [
            'title' => 'Lodgings Managed',
            'text' => 'You manage <span class="badge fs-5 rounded-pill bg-primary">' . count($lodgings) . '</span> lodgings',
            'route' => route('admin_lodging_index'),
            'colorClass' => 'primary',
            'label' => 'View lodgings',
        ],
        [
            'title' => 'Active Clients',
            'text' => 'There are <span class="badge fs-5 rounded-pill bg-success">' . count($users) . '</span> active clients',
            'route' => route('admin_user_index'),
            'colorClass' => 'success',
            'label' => 'View clients',
        ],
        [
            'title' => 'Uploaded photos',
            'text' => 'There are <span class="badge fs-5 rounded-pill bg-warning">' . count($media) . '</span> photos',
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
            <h1 class="display-4">Hey {{ \Illuminate\Support\Str::title(Auth::user()->name) }}</h1>
            <h1 class="display-6">Welcome to your Admin Dashboard</h1>
            <p class="lead">Manage your lodgings and clients with ease.</p>
        </div>

        <hr>

        <div class="row row-cols-1 row-cols-md-{{ count($cards) }} mt-4">
            @foreach ($cards as $card)
                <div>
                    <div class="card text-center border border-0">
                        <div class="card-header bg-transparent border border-0 lead fw-bold">
                            {{ $card['title'] }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{!! $card['text'] !!}</p>
                        </div>
                        <div class="card-footer text-muted bg-transparent border border-0">

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
