@php
    use App\Models\Lodging;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Str;
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-4">{{ucfirst($title)}}</h1>

    @if(isset($newRoute))
        @include('shared/_button',[
            'route' => route($newRoute),
            'label' => 'new',
            'colorClass' => 'primary',
            'iconClass' => 'plus',
            'size' => 'lg'
        ])
    @endif
</div>
<table class="table table-hover align-middle">
    <tr>
        @foreach($showDetail as $detail)
            <th>{{ Str::title($detail) }}</th>
        @endforeach
        <th>Actions</th>
    </tr>
    @foreach($items as $item)
        <tr>
            @foreach($showDetail as $detail)
                @if($detail === 'lodgingType' || $detail === 'city')
                    <td class="text-center">
                        <span class="badge bg-info rounded-pill fs-6">
                            {{ Str::limit(
                            $item->$detail ? $item->$detail->name : '-- empty --'
                            , 70)
                        }}
                        </span>
                    </td>
                @elseif($detail === 'lodging' || $detail === 'lodgings')
                    <td>
                        @if(($item->$detail instanceof Collection && $item->$detail->isEmpty()) || null === $item->$detail)
                            -- empty --
                        @elseif($item->$detail instanceof Collection)
                            @if(count($item->$detail) <= 2)
                                @foreach($item->$detail as $lodging)
                                    <span class="m-1">
                                        @include('shared/_button', [
                                            'route' => route('admin_lodging_show', ['lodging' => $lodging]),
                                            'label' => Str::limit($lodging->title, 5),
                                            'colorClass' => 'info',
                                            'iconClass' => 'eye',
                                            'size' => 'sm'
                                        ])
                                    </span>
                                @endforeach
                            @else
                                <div class="mb-3">
                                    <a class="btn btn-outline-warning rounded-pill text-nowrap"
                                       data-bs-toggle="collapse"
                                       href="#collapseDetails{{ $item->id }}"
                                       role="button" aria-expanded="false"
                                       aria-controls="collapseDetails{{ $item->id }}">
                                        {{ count($item->$detail) }} <i class="bi bi-star-fill"></i> <i
                                            class="bi bi-caret-down-fill"></i>
                                    </a>
                                </div>
                                <div class="collapse" id="collapseDetails{{ $item->id }}">
                                    <ul class="list-group list-group-flush bg-transparent">
                                        @foreach($item->$detail as $lodging)
                                            <li class="list-group-item bg-transparent p-0">
                                                @include('shared/_button', [
                                                    'route' => route('admin_lodging_show', ['lodging' => $lodging]),
                                                    'label' => Str::limit($lodging->title, 5),
                                                    'colorClass' => 'info',
                                                    'iconClass' => 'eye',
                                                    'size' => 'sm'
                                                ])
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @else
                            @php $lodging = $item->$detail instanceof Lodging ? $item->$detail : $item->$detail->first() @endphp
                            @include('shared/_button',[
                                'route' => route('admin_lodging_show', $lodging),
                                'label' => Str::limit($lodging->title, 15),
                                'colorClass' => 'info',
                                'iconClass' => 'eye',
                                'size' => 'sm'
                            ])
                        @endif
                    </td>
                @elseif(is_int($item->$detail) || is_float($item->$detail))
                    <td class="text-center">
                        <span class="badge bg-primary fs-6 rounded-pill">
                            {{ $item->$detail }}
                            @if($detail === 'surface')
                                m²
                            @elseif($detail === 'price')
                                €
                            @endif
                        </span>

                    </td>
                @elseif($item instanceof \App\Models\Media)
                    <td class="w-25">
                        <div class="rounded-4 overflow-hidden">
                            <img
                                src="{{ $item->$detail }}"
                                alt="{{ $item->$detail }}"
                                class="img-fluid object-fit-contain"
                            >
                        </div>
                    </td>
                @else
                    <td>
                        @if (strlen($item->$detail) > 50)
                            <a class="btn btn-outline-primary rounded-pill text-nowrap" data-bs-toggle="collapse"
                               href="#collapseDetail{{ $item->id }}" role="button" aria-expanded="false"
                               aria-controls="collapseDetail{{ $item->id }}">
                                See {{ $detail }} <i class="bi bi-caret-down-fill"></i>
                            </a>

                            <div class="collapse" id="collapseDetail{{ $item->id }}">
                                <div>
                                    {{ $item->$detail }}
                                </div>
                            </div>
                        @else
                            <span class="lead">{{ $item->$detail }}</span>
                        @endif
                    </td>
                @endif
            @endforeach
            <td>
                <span class="d-flex justify-content-center align-items-center py-4">
                @if(@isset($showRoute))
                        @include('shared/_button',[
                        'route' => route($showRoute, $item),
                        'label' => 'view',
                        'colorClass' => 'primary',
                        'iconClass' => 'eye',
                        'size' => 'sm'
                    ])
                    @endif
                    @include('shared/_button',[
                        'route' => route($editRoute, $item),
                        'label' => 'edit',
                        'colorClass' => 'warning',
                        'iconClass' => 'pencil',
                        'size' => 'sm'
                    ])
                    <form action="{{ route($deleteRoute, $item) }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        @include('shared/_button',[
                        'label' => 'delete',
                        'colorClass' => 'danger',
                        'iconClass' => 'trash',
                        'size' => 'sm'
                    ])
                    </form>
                </span>
            </td>
        </tr>
    @endforeach
</table>
