@extends('app')

@section('title', 'Log in')

@section('app_content')
    <div class="container mt-5">
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="w-25 mx-auto">
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                           autofocus autocomplete="username">
                    @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required
                           autocomplete="current-password">
                    @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    @include('shared/_button',
                        [
                            'label' => 'Log in',
                            'colorClass' => 'primary',
                            'iconClass' => 'box-arrow-right'
                        ])
                </div>
            </div>
        </form>
    </div>
@endsection
