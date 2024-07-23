@extends('app')

@section('app_content')
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->email }}</p>
    <a href="{{ route('admin_user_edit', $user) }}">Edit</a>
    <form action="{{ route('admin_user_destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('admin_user_index') }}">Back to List</a>
@endsection
