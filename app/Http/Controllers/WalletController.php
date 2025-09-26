<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function getWalletBalance()
    {
        $user = Auth::user();
        // $wallet = $user->wallet;

        $wallet = Wallet::where('user_id', $user->id)->first();
        // dd($wallet);

        return view('user.wallet', compact('wallet'));
    }

}
