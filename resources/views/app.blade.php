@include('shared/_head')
<body>
<main class="container">
    @include('shared/_navbar')
    @include('layouts.navigation')

    <section>@yield('app_content')</section>
</main>
</body>
