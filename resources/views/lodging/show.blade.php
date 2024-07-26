@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Number;
@endphp
@extends('app')

@section('title', $lodging->title)

@section('app_content')

    @include('shared/_header', [
        'imgUrl' => $lodging->media->first()->path,
        'title' => $lodging->title
    ])

    <div class="container my-4">
        <div
            class="overflow-x-scroll py-4"
            style="white-space: nowrap;"
        >
            @foreach($lodging->media as $media)
                <div class="d-inline px-2">
                    <!-- Image -->
                    <img src="{{ $media->path }}" class="img-fluid rounded-4" role="button" alt="{{ $media->alt }}"
                         style="max-width: 320px !important; height: auto !important;"
                         data-bs-toggle="modal" data-bs-target="#imageModal{{ $media->id }}">

                    <!-- Modal -->
                    <div class="modal modal-lg fade" id="imageModal{{ $media->id }}"
                         tabindex="-1"
                         aria-labelledby="imageModalLabel{{ $media->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-5 overflow-hidden p-0">
                                <div class="modal-body text-center p-0">
                                    <img src="{{ $media->path }}" class="img-fluid" alt="{{ $media->alt }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-3 display-4">Description</h2>
                    @if(Auth::check())
                        @include('shared/_button',
                        [
                            'route' => route('app_add_lodging_to_favorites',
                                [
                                    'user' => Auth::user(),
                                    'lodging' => $lodging
                                ]),
                            'iconClass' => 'star-fill',
                            'colorClass' => Auth::user()->lodgings()->where(['id' => $lodging->id])->exists() ? 'warning' : 'outline-warning',
                            'extraClasses' => Auth::user()->lodgings()->where(['id' => $lodging->id])->exists() ? 'text-white' : 'text-warning',
                            'size' => 'lg'
                        ])
                    @endif
                </div>
                <div class="row row-cols-2">

                    @php
                        $wordCount = Str::wordCount($lodging->description);
                        $firstCol = Str::words($lodging->description, Number::format($wordCount / 2, 0), '');
                        $secondCol = Str::of($lodging->description)->remove($firstCol);
                    @endphp
                    <p class="fs-6">{{ $firstCol }}</p>
                    <p class="fs-6">{{ $secondCol }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-house-door"></i> Rooms
                        <span class="badge fs-6 bg-primary rounded-pill">{{ $lodging->roomCount }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-rulers"></i> Surface
                        <span class="badge fs-6 bg-primary rounded-pill">{{ $lodging->surface }} m²</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="bi bi-currency-euro"></i> Price
                        <span class="badge fs-6 bg-primary rounded-pill">{{ $lodging->price }} €</span>
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
                <div class="my-2">
                    @include('shared/_button', ['route' => route('app_home'), 'colorClass' => 'secondary', 'label' => 'Back', 'iconClass' => 'arrow-left'])
                </div>
            </div>
        </div>
    </div>
@endsection
