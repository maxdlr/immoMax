@php
    $links = [
        [
            'link' => route('app_home'),
            'label' => 'Home'
        ],
    ];

    if (Auth::user()?->roles()->get()->first()->name === 'ADMIN') {
        $links[] = [
            'link' => route('admin_dashboard'),
            'label' => 'Admin'
         ];
    }

    if (Auth::user() !== null) {
        $links[] = [
            'link' => route('dashboard'),
            'label' => 'My dashboard'
        ];

        $links[] = [
            'link' => route('logout'),
            'label' => 'Log out'
        ];
    } else {
        $links[] = [
            'link' => route('login'),
            'label' => 'Log in'
        ];
    }
@endphp


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('app_home') }}">Immo Max</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($links as $link)

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                           href="{{ $link['link'] }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
