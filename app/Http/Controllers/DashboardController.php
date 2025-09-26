<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();

        $wallet = $user->wallet;

        return view('user.dashboard', compact('user', 'wallet'));
    }
}
