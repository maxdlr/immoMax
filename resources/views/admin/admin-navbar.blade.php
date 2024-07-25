@php
    $navItems =
    [
        [
            'route' => 'app_home',
            'label' => 'Site',
            'iconClass' => 'house-fill'
        ],
        [
            'route' => 'admin_dashboard',
            'label' => 'Dashboard',
            'iconClass' => 'gear-fill'
        ],
        [
            'route' => 'admin_lodging_index',
            'label' => 'Lodgings',
            'iconClass' => 'houses'
        ],
        [
            'route' => 'admin_lodgingType_index',
            'label' => 'Lodging types',
            'iconClass' => 'tag-fill'
        ],
        [
            'route' => 'admin_user_index',
            'label' => 'Users',
            'iconClass' => 'person-fill'
        ],
        [
            'route' => 'admin_media_index',
            'label' => 'Media',
            'iconClass' => 'image-fill'
        ],
    ]
@endphp

<div class="d-flex flex-column flex-shrink-0 p-3">
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach($navItems as $navItem)
            <li class="nav-item mb-2">
                @include('shared/_button',
                    [
                        'route' => route($navItem['route']),
                        'label' => $navItem['label'],
                        'iconClass' => $navItem['iconClass'],
                        'extraClasses' => Request::routeIs($navItem['route']) ? 'btn-primary active' : 'btn-outline-primary'
                    ])
            </li>
        @endforeach
    </ul>
</div>
