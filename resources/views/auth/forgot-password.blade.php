@extends('app')

@section('title', 'Forgotten Password')

@section('app_content')
    <div class="container mt-5">
        <h2 class="mb-4">Forgot Your Password?</h2>
        <p class="mb-4">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-info mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required
                       autofocus>
                @if ($errors->has('email'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                Email Password Reset Link
            </button>
        </form>
    </div>
@endsection
