<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkSMSController extends Controller
{
     public function showBulkSMS()
    {
        return view('user.bulkSMS');
    }
}
