@extends('admin/admin-base')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">Welcome to your Admin Dashboard</h1>
            <p class="lead">Manage your lodgings and clients with ease.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Lodgings
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Lodgings Managed</h5>
                        <p class="card-text">
                            You manage <span class="badge bg-primary">{{ count($lodgings) }}</span> lodgings
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        @include('shared/_button', ['route' => route('admin_lodging_index'), 'colorClass' => 'primary', 'iconClass' => 'box-arrow-up-right', 'label' => 'View lodgings'])
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Clients
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Active Clients</h5>
                        <p class="card-text">
                            There are <span class="badge bg-success">{{ count($users) }}</span> active clients
                        </p>
                    </div>
                    <div class="card-footer text-muted">

                        @include('shared/_button', ['route' => route('admin_user_index'), 'colorClass' => 'success', 'iconClass' => 'box-arrow-up-right', 'label' => 'View clients'])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
