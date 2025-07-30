<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class pinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPin()
    {
        return view('auth.set-pin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePin(Request $request)
    {
    //    dd('Hit the controller!', Auth::user(), $request->all());

        $request->validate([
            'pin' => 'required|digits:4|confirmed',
        ]);

        $user = Auth::user();
        $user->pin = Hash::make($request->pin);
        $user->has_set_pin = true;
        $user->save();


        Auth::login($user);

        return redirect()->route('auth.login')->with('success', 'PIN set successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
