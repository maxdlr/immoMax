@php $filterCollections = [
     [
         'name' => 'lodgingType',
         'items' => $lodgingTypes,
         'currentItem' => $currentFilters['lodgingType'] ?? null
     ],
     [
         'name' => 'city',
         'items' => $cities,
         'currentItem' => $currentFilters['city'] ?? null
     ],
] @endphp

<form action="{{ route('lodging_filter') }}" method="POST">
    @csrf
    <div class="row row-cols-{{ count($filterCollections) + 1 + ($isFiltered ?? 0) }} justify-content-center">

        @foreach($filterCollections as $filter)
            <div>
                <select name="{{ $filter['name'] }}" id="{{ $filter['name'] }}" class="form-select rounded-pill col-3">

                    <option value=""> {{ \Illuminate\Support\Str::headline($filter['name']) }} • All</option>
                    @foreach($filter['items'] as $item)
                        <option
                            @if($item->name === $filter['currentItem']?->name) selected @endif
                        value="{{ $item->id }}"
                        >
                            @if($item->name === $filter['currentItem']?->name)
                                {{ \Illuminate\Support\Str::headline($filter['name']) }} •
                            @endif {{ $item->name }}
                        </option>
                    @endforeach

                </select>
            </div>
        @endforeach

        <div>
            @include('shared/_button',
            [
                'label' => 'filter',
                'colorClass' => 'primary',
                'iconClass' => 'funnel-fill',
                'extraClasses' => 'w-100'
            ])
        </div>

        @if(@isset($isFiltered))
            <div>
                @include('shared/_button',
                [
                    'route' => route('app_home'),
                    'label' => 'reset',
                    'colorClass' => 'secondary',
                    'iconClass' => 'funnel-fill',
                    'extraClasses' => 'w-100'
                ])
            </div>
        @endif

    </div>
</form>
