@extends('app')

@section('title', 'Confirm Password')

@section('app_content')
    <div class="container mt-5">
        <div class="alert alert-info" role="alert">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required
                       autocomplete="current-password">
                @if ($errors->has('password'))
                    <div class="text-danger mt-1">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
@endsection
