@php
    $links = [];

    if (Auth::check() && Auth::user()?->roles()?->get()->first()?->name === 'ADMIN') {
        $links[] = [
            'link' => route('admin_dashboard'),
            'label' => 'Admin'
         ];
    }

    if (Auth::check()) {
        $links[] = [
            'link' => route('dashboard'),
            'label' => 'My dashboard'
        ];
    } else {
        $links[] = [
            'link' => route('login'),
            'label' => 'Log in'
        ];
    }
@endphp

<nav class="navbar navbar-expand-lg navbar-light">
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

    @if(Auth::check())

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link fw-bold text-primary mx-3 dropdown-toggle rounded-pill" href="#" id="navbarDropdown"
                   role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i>
                    {{ \Illuminate\Support\Str::title(Auth::user()->name) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    @endif

</nav>
