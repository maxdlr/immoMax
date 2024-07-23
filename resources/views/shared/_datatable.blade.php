<h1>{{ucfirst($title)}}</h1>
@include('shared/_button',[
    'route' => route($newRoute),
    'label' => 'new',
    'colorClass' => 'primary',
    'iconClass' => 'plus'
])
<table>
    <tr>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->$showDetail }}</td>
            <td>
                @include('shared/_button',[
                    'route' => route($showRoute, $item),
                    'label' => 'view',
                    'colorClass' => 'primary',
                    'iconClass' => 'eye'
                ])
                @include('shared/_button',[
                    'route' => route($editRoute, $item),
                    'label' => 'edit',
                    'colorClass' => 'warning',
                    'iconClass' => 'pencil'
                ])
                <form action="{{ route($deleteRoute, $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    @include('shared/_button',[
                    'label' => 'delete',
                    'colorClass' => 'danger',
                    'iconClass' => 'trash'
                ])
                </form>
            </td>
        </tr>
    @endforeach
</table>
