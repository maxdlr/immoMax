@php use Illuminate\Support\Str; @endphp

<div class="row mt-5">
    @foreach($lodgings as $lodging)
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded-5 overflow-hidden">
                <div class="position-relative">
                    <img src="{{ $lodging->media->first()->path }}" class="card-img-top"
                         alt="{{ $lodging->media->first()->alt }}">
                    @if(Auth::check())
                        <div class="position-absolute top-0 end-0 m-3">
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
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title display-6">{{ $lodging->title }}</h5>
                    <p class="card-text lead">{{ Str::limit($lodging->description) }}</p>
                    <div class="row row-cols-2">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="bi bi-house-door"></i> Rooms: {{ $lodging->roomCount }}
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-rulers"></i> Surface: {{ $lodging->surface }} m²
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-currency-dollar"></i> Price: ${{ $lodging->price }}
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="bi bi-tag-fill"></i> Type: {{ $lodging->lodgingType()->get()->first()->name }}
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-geo-alt-fill"></i> City: {{ $lodging->city()->get()->first()->name }}
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-bag"></i> For {{ $lodging->transactionType()->get()->first()->name }}
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="card-footer py-3">

                    @include('shared/_button',
                    [
                        'route' => route('lodging_show', $lodging),
                        'label' => 'View details',
                        'iconClass' => 'info-circle-fill',
                        'colorClass' => 'primary'
                    ])
                </div>
            </div>
        </div>
    @endforeach
</div>
