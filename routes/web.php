<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Add home route to avoid 404
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/user-dashboard', [AdminController::class, 'userDashboard'])->name('admin.user.dashboard');
        
        // Users Management
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
        
        // Categories CRUD - Make sure this is using the correct controller reference
        Route::resource('categories', CategoryController::class);
    });
});