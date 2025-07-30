<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $admin = Auth::user();

        return view('user.dashboard', compact('user'));
    }
}
