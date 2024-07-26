@extends('app')

@section('title', 'Profile')

@section('app_content')
    <div class="row row-cols-2">
        @include('profile/partials/update-profile-information-form')
        @include('profile/partials/update-password-form')
    </div>
    @include('profile/partials/delete-user-form')
@endsection
