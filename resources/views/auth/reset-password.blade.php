@extends('app')

@section('title', 'Reset Password')

@section('app_content')
    <div class="container mt-5">
        <h2 class="mb-4">Reset Password</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control"
                       value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
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

            <div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
@endsection
