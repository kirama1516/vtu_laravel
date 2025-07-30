<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
   public function showData()
    {
        return view('user.buyData');
    }
}
