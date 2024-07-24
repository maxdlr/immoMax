@extends('app')

@section('title', 'Verify Email')

@section('app_content')
    <div class="container mt-5">
        <div class="alert alert-info" role="alert">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
            we
            just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="d-flex justify-content-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-secondary">
                    Log Out
                </button>
            </form>
        </div>
    </div>
@endsection
