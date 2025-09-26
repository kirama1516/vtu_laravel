<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Services\MonnifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
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
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|confirmed|min:8',
        ]);
        // if ($request->has('pin')) {
        //     $validated['pin'] = $request->input('pin');
        // } else {
        //     return redirect()->back()->withErrors(['pin' => 'Pin is required.']);
        // }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

    
        Wallet::create([
            'user_id' => $user->id,
            'mainBalance' => 0.00,
            'identifier' => 'WALLET' . mt_rand(10000000, 99999999),
            'currency' => 'NGN',
            'status' => 'active'
        ]);

    

        $monnify = new MonnifyService();

        try {
            $response = $monnify->createVirtualAccount($user);
            if (isset($response['responseCode']) && $response['responseCode'] == "0" && isset($response['responseBody'])) {
                if (isset($response['responseBody']['accounts']) && is_array($response['responseBody']['accounts'])) {
                    $accounts = $response['responseBody']['accounts'];
                    foreach($accounts as $account) {
                        $user->accNumber = $account['accountNumber'];
                        $user->accName = $account['accountName'];
                        $user->bankName = $account['bankName'];
                        $user->save();
                    }
                }
            }
        } catch(\Exception $e) {
            \Log::error("Monnify error: " . $e->getMessage());
        }

        Auth::login($user);
        return redirect()->route('auth.set-pin')->with('success', 'Registration successful. Please login');
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
