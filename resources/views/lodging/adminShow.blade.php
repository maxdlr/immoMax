@extends('admin/admin-base')
@section('title', 'Admin - ' . $lodging->title)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $lodging->title }}</h1>
        <div class="card">
            <div class="card-body">
                @if($lodging->media->isNotEmpty())
                    <div
                        class="d-flex justify-content-start align-items-center flex-wrap"
                    >
                        @foreach($lodging->media as $media)
                            <div class="position-relative p-1">
                                <img src="{{ $media->path }}" class="img-fluid rounded-4" alt="{{ $media->alt }}"
                                     style="max-width: 320px !important; height: auto !important;">
                                <div class="position-absolute top-0 start-0 m-2">
                                    <form action="{{ route('admin_media_destroy', $media) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        @include('shared/_button',
                                            [
                                                'label' => 'delete',
                                                'colorClass' => 'danger',
                                                'iconClass' => 'trash-fill'
                                            ])
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <p class="card-text py-3 lead">{{ $lodging->description }}</p>

                <ul class="list-group w-50 mx-auto mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-house-door"></i> Rooms
                        <span class="badge fs-6 bg-primary rounded-pill">{{ $lodging->roomCount }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-rulers"></i> Surface
                        <span class="badge fs-6 bg-primary rounded-pill">{{ $lodging->surface }} m²</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-currency-dollar"></i> Price
                        <span class="badge fs-6 bg-primary rounded-pill">${{ $lodging->price }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-tag-fill"></i> Type
                        <span
                            class="badge fs-6 bg-primary rounded-pill">{{ $lodging->lodgingType()->get()->first()->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-bag"></i> Transaction Type
                        <span
                            class="badge fs-6 bg-primary rounded-pill">{{ $lodging->transactionType()->get()->first()->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-geo-alt-fill"></i> City
                        <span
                            class="badge fs-6 bg-primary rounded-pill">{{ $lodging->city()->get()->first()->name }}</span>
                    </li>
                </ul>


                @include('shared/_button',
                    [
                        'route' => route('admin_lodging_edit', $lodging),
                        'colorClass' => 'warning',
                        'iconClass' => 'pencil-fill',
                        'label' => 'edit'
                    ])

                <form action="{{ route('admin_lodging_destroy', $lodging) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    @include('shared/_button',
                        [
                            'label' => 'delete',
                            'colorClass' => 'danger',
                            'iconClass' => 'trash-fill'
                        ])
                </form>

                @include('shared/_button',
                [
                    'route' => route('admin_lodging_index'),
                    'colorClass' => 'secondary',
                    'label' => 'Back to list',
                    'iconClass' => 'arrow-left'
                ])

                @include('shared/_button',
                [
                    'route' => route('lodging_show', $lodging),
                    'colorClass' => 'outline-secondary',
                    'label' => 'See as client',
                    'iconClass' => 'eye'
                ])

            </div>
        </div>
    </div>
@endsection
