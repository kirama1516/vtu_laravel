<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectricityController extends Controller
{
     public function showElectricity()
    {
        return view('user.buyElectricity');
    }
}
