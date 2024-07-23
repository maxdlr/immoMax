@extends('app')

@section('app_content')
    <h1>Edit LodgingType</h1>
    <form action="{{ route('admin_lodgingType_update', $lodgingType) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $lodgingType->name }}" required>
        <button type="submit">Save</button>
    </form>
@endsection
