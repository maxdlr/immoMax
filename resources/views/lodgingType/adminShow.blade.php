@extends('admin/admin-base')
@section('title', 'Admin - ' . $lodgingType->name)

@section('content')
    <h1>{{ $lodgingType->name }}</h1>
    <a href="{{ route('admin_lodgingType_edit', $lodgingType) }}">Edit</a>
    <form action="{{ route('admin_lodgingType_destroy', $lodgingType) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('admin_lodgingType_index') }}">Back to List</a>
@endsection
