<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    public function showAdminDashboard()
    {
        $user = Auth::user();

        return view('admin.dashboard', compact('user'));
    }
}
