@extends('app')

@section('content')
    <h1>Edit Lodging</h1>
    <form action="{{ route('admin_lodging_update', $lodging) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $lodging->title }}" required>
        <label>Description:</label>
        <textarea name="description" required>{{ $lodging->description }}</textarea>
        <label>Room Count:</label>
        <input type="number" name="roomCount" value="{{ $lodging->roomCount }}" required>
        <label>Surface:</label>
        <input type="number" name="surface" value="{{ $lodging->surface }}" required>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $lodging->price }}" required>
        <button type="submit">Save</button>
    </form>
@endsection
