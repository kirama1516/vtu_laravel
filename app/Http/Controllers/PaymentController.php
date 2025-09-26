<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {   
        $user = Auth::user();

        return view('user.payment', compact('user'));
    }
}
