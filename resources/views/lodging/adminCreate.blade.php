@extends('app')

@section('body')
    <h1>Create Lodging</h1>
    <form action="{{ route('admin_lodging_store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Description:</label>
        <textarea name="description" required></textarea>
        <label>Room Count:</label>
        <input type="number" name="roomCount" required>
        <label>Surface:</label>
        <input type="number" name="surface" required>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>
        <button type="submit">Save</button>
    </form>
@endsection
