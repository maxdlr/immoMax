@php use Illuminate\Support\Str; @endphp

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>{{ucfirst($title)}}</h1>

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
                @if($detail === 'lodgingType')
                    <td>{{ Str::limit(
                            $item->$detail ? $item->$detail->name : '-- empty --'
                            , 70)
                        }}</td>
                @elseif($detail === 'lodging')
                    <td>
                        @foreach($item->$detail as $lodging)
                            <span class="m-1">
                                @include('shared/_button',[
                                    'route' => route('admin_lodging_show', $lodging),
                                    'label' => Str::limit($lodging->title, 5),
                                    'colorClass' => 'info',
                                    'iconClass' => 'eye',
                                    'size' => 'sm'
                                ])
                            </span>
                        @endforeach
                    </td>
                @else
                    <td>{{ Str::limit($item->$detail, 70) }}</td>
                @endif
            @endforeach
            <td class="d-flex justify-content-center align-items-center py-4">
                @include('shared/_button',[
                    'route' => route($showRoute, $item),
                    'label' => 'view',
                    'colorClass' => 'primary',
                    'iconClass' => 'eye',
                    'size' => 'sm'
                ])
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
            </td>
        </tr>
    @endforeach
</table>
