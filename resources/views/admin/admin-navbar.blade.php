@include(
'shared/_button',
[
    'route' => route('admin_lodging_index'),
    'label' => 'lodgings',
    'colorClass' => 'primary',
    'iconClass' => '',
    'size' => 'lg'
])

@include(
'shared/_button',
[
    'route' => route('admin_lodgingType_index'),
    'label' => 'lodging types',
    'colorClass' => 'primary',
    'iconClass' => '',
    'size' => 'lg'
])

@include(
'shared/_button',
[
    'route' => route('admin_user_index'),
    'label' => 'users',
    'colorClass' => 'primary',
    'iconClass' => '',
    'size' => 'lg'
])
