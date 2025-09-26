<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    public function showAdminDashboard()
    {
        // $user = Auth::user();

        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalUsers'));
    }
}
