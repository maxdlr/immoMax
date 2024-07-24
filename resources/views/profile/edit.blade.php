@extends('app')

@section('title', 'Profile')

@section('app_content')
    <div>
        @include('profile/partials/update-profile-information-form')
    </div>

    <div>
        @include('profile/partials/update-password-form')
    </div>

    <div>
        @include('profile/partials/delete-user-form')
    </div>
@endsection
