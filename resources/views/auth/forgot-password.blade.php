@extends('app')

@section('title', 'Forgotten password')

@section('app_content')
    <div>
        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div>
            <button type="submit">Email Password Reset Link</button>
        </div>
    </form>
@endsection
