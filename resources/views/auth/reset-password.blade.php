@extends('app')

@section('title', 'Reset Password')

@section('app_content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                   autocomplete="username">
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
                <span>{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>
@endsection
