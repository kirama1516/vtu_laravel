<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirtimeController extends Controller
{
    public function showAirtime()
    {
        return view('user.buyAirtime');
    }

    public function buyAirtime(Request $request)
    {
        $validated = $request->validate([
            
        ]);
    }
}
