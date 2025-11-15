@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-info">
                        <h5>Welcome to User Dashboard!</h5>
                        <p class="mb-0">You are logged in as a regular user.</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Your Account Information</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Name:</strong> {{ Auth::user()->name }}</li>
                                        <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                                        <li class="list-group-item">
                                            <strong>Role:</strong> 
                                            <span class="badge bg-primary">{{ ucfirst(Auth::user()->role) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Member Since:</strong> 
                                            {{ Auth::user()->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
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