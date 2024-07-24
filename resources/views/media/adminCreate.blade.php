@extends('admin/admin-base')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create Media</h1>
        <form action="{{ route('admin_media_store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('shared/_upload-input')

            @include('shared/_button', [
                'label' => 'save',
                'colorClass' => 'primary',
                'iconClass' => 'floppy-fill'
            ])
        </form>
    </div>
@endsection
