<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddMoneyController extends Controller
{
    public function addMoney()
    {   
        $user = Auth::user();

        return view('user.addMoney', compact('user'));
    }
}
