<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function setting()
    {   
        $user = Auth::user();

        return view('user.setting', compact('user'));
    }
}
