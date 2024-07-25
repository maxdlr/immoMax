@include('shared/_head')
<body>
<main class="container">
    @include('shared/_navbar')
    @if (session('success'))
        <div class="text-center position-absolute top-0 start-50 my-5 flashItem">
            <span class="alert alert-success rounded-pill lead fw-bold px-4">
                {{ session('success') }}
            </span>
        </div>
    @elseif(session('error'))
        <div class="text-center position-absolute top-0 start-50 my-5 flashItem">
            <span class="alert alert-danger rounded-pill lead fw-bold px-4">
                {{ session('error') }}
            </span>
        </div>
    @endif

    <section>@yield('app_content')</section>

    @if(!\Illuminate\Support\Str::contains(Route::currentRouteName(), 'admin'))
        @include('shared/_footer')
    @endif

</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
