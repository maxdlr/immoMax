@extends('app')

@section('title', 'Immo Max')

@section('app_content')

    @include('shared/_header', ['title' => 'ImmoMax', 'imgUrl' => $headerMedia?->path])

    @include('home/_filters')

    @include('lodging/index', ['lodgings' => $lodgings])

@endsection
