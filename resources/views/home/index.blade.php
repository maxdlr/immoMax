@extends('app')

@section('title', 'Immo Max')

@section('app_content')
    
    <header class="rounded-4 overflow-hidden my-5">
        @include('shared/_header',
        [
            'title' => 'ImmoMax',
            'imgUrl' => $headerMedia?->path
        ])
    </header>

    @include('lodging/index', ['lodgings' => $lodgings])

@endsection
