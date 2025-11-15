@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <h2 class="card-text">{{ $users->count() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Quick Actions</h5>
                                    <a href="{{ route('categories.index') }}" class="btn btn-light me-2">Manage Categories</a>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-light me-2">View Users</a>
                                    <a href="{{ route('admin.user.dashboard') }}" class="btn btn-light">User Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Category Tree View</h5>
                                </div>
                                <div class="card-body">
                                    @if($categories && count($categories) > 0)
                                        <ul class="list-group">
                                            @foreach($categories as $category)
                                                <li class="list-group-item" style="padding-left: {{ ($category['level'] ?? 0) * 20 }}px">
                                                    {{ $category['name'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No categories found. <a href="{{ route('categories.create') }}">Create your first category</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection