@extends('app')

@section('title', 'Register')

@section('app_content')
    <div class="container mt-5">
        <h2 class="mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required
                       autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required
                       autocomplete="username">
                @if ($errors->has('email'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required
                       autocomplete="new-password">
                @if ($errors->has('password'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                       required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="btn btn-link">Already registered?</a>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection
