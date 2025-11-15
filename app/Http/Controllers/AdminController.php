<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $categories = Category::getTreeView();
        
        return view('admin.dashboard', compact('users', 'categories'));
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}