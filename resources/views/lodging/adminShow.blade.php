@extends('admin/admin-base')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $lodging->title }}</h1>
        <div class="card">
            <div class="card-body">
                @if($lodging->media->isNotEmpty())
                    <img src="{{ $lodging->media->first()->path }}" alt="{{ $lodging->media->first()->alt }}"
                         class="card-img-top mb-3">
                @endif
                <p class="card-text">{{ $lodging->description }}</p>
                <p class="card-text"><strong>Room Count:</strong> {{ $lodging->roomCount }}</p>
                <p class="card-text"><strong>Surface:</strong> {{ $lodging->surface }} m²</p>
                <p class="card-text"><strong>Price:</strong> ${{ $lodging->price }}</p>

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
