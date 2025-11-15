@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="fas fa-sitemap"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.dashboard') }}">
                            <i class="fas fa-eye"></i> User View
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Page Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-users"></i>
                        <h2>{{ $users->count() }}</h2>
                        <p>Total Users</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fas fa-sitemap"></i>
                        <h2>{{ $categories ? count($categories) : 0 }}</h2>
                        <p>Total Categories</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fas fa-user-shield"></i>
                        <h2>{{ $users->where('role', 'admin')->count() }}</h2>
                        <p>Admin Users</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <i class="fas fa-user"></i>
                        <h2>{{ $users->where('role', 'user')->count() }}</h2>
                        <p>Regular Users</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <i class="fas fa-bolt me-2"></i>Quick Actions
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('categories.index') }}" class="btn btn-primary w-100 py-3">
                                        <i class="fas fa-sitemap fa-2x mb-2"></i><br>
                                        Manage Categories
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-success w-100 py-3">
                                        <i class="fas fa-users fa-2x mb-2"></i><br>
                                        View Users
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('categories.create') }}" class="btn btn-info w-100 py-3">
                                        <i class="fas fa-plus-circle fa-2x mb-2"></i><br>
                                        Add Category
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('admin.user.dashboard') }}" class="btn btn-warning w-100 py-3">
                                        <i class="fas fa-eye fa-2x mb-2"></i><br>
                                        User View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Tree -->
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <i class="fas fa-project-diagram me-2"></i>Category Tree View
                        </div>
                        <div class="card-body">
                            @if($categories && count($categories) > 0)
                                <ul class="category-tree">
                                    @foreach($categories as $category)
                                        <li style="padding-left: {{ ($category['level'] ?? 0) * 25 }}px">
                                            <i class="fas fa-folder me-2 text-warning"></i>
                                            {{ $category['name'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-sitemap fa-4x text-muted mb-3"></i>
                                    <h4 class="text-muted">No Categories Found</h4>
                                    <p class="text-muted">Get started by creating your first category</p>
                                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus-circle me-2"></i>Create First Category
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection