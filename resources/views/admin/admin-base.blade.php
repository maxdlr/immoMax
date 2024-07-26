@extends('app')

@section('app_content')
    <main class="container">
        <div class="row">
            <section class="col-12 col-md-2">
                @include('admin/admin-navbar')
            </section>
            <section class="col-12 col-md-10 mb-5 pb-5">
                @yield('content')
            </section>
        </div>
    </main>
@endsection


