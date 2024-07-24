@extends('app')

@section('title', 'Confirm Password')

@section('app_content')
    <div>
        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div>
            <button type="submit">Confirm</button>
        </div>
    </form>
@endsection
