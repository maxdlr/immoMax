@extends('admin/admin-base')
@section('title', 'Admin - ' . $user->email)

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">{{ $user->name }}</h1>
                <p class="lead">{{ $user->email }}</p>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-auto">
                @include('shared/_button', [
                    'route' => route('admin_user_edit', $user),
                    'label' => 'Edit',
                    'colorClass' => 'warning',
                    'iconClass' => 'pencil-fill',
                    'size' => 'lg'
                ])
            </div>
            <div class="col-auto">
                <form action="{{ route('admin_user_destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    @include('shared/_button', [
                        'label' => 'Delete',
                        'colorClass' => 'danger',
                        'iconClass' => 'trash-fill',
                        'size' => 'lg'
                    ])
                </form>
            </div>
            <div class="col-auto">
                @include('shared/_button', [
                    'route' => route('admin_user_index'),
                    'label' => 'Back to list',
                    'colorClass' => 'secondary',
                    'iconClass' => 'arrow-left',
                    'size' => 'lg'
                ])
            </div>
        </div>
    </div>
@endsection
