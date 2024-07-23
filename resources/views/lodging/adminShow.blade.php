@extends('app')

@section('content')
    <h1>{{ $lodging->title }}</h1>
    <p>{{ $lodging->description }}</p>
    <p>Room Count: {{ $lodging->roomCount }}</p>
    <p>Surface: {{ $lodging->surface }} m²</p>
    <p>Price: ${{ $lodging->price }}</p>
    <a href="{{ route('admin_lodging_edit', $lodging) }}">Edit</a>
    <form action="{{ route('admin_lodging_destroy', $lodging) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('lodging_index') }}">Back to List</a>
@endsection
