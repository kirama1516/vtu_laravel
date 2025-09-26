<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCareController extends Controller
{
    public function customerCare()
    {   
        $user = Auth::user();

        return view('user.customerCare', compact('user'));
    }
}
