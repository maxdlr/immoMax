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
                <p class="card-text"><strong>Room Count:</strong> <span
                        class="badge bg-secondary">{{ $lodging->roomCount }}</span></p>
                <p class="card-text"><strong>Surface:</strong> <span class="badge bg-secondary">{{ $lodging->surface }} m²</span>
                </p>
                <p class="card-text"><strong>Price:</strong> <span
                        class="badge bg-secondary">${{ $lodging->price }}</span></p>

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

            </div>
        </div>
    </div>
@endsection
