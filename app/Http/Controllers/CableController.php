<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CableController extends Controller
{
    public function showCable()
    {
        return view('user.buyCable');
    }
}
