@extends('app')

@section('content')
    <main class="container">
        <div class="row">
            <section class="col-2">
                @include('admin/admin-navbar')
            </section>
            <section class="col-10">@yield('content')</section>
        </div>
    </main>
@endsection


