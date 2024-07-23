@extends('app')

@section('app_content')
    <h1>Create LodgingType</h1>
    <form action="{{ route('admin_lodgingType_store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Save</button>
    </form>
@endsection
