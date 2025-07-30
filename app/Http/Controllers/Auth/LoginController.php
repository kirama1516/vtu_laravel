<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
   public function login(Request $request)
    {
        $credentials = $request->validate([
            'usermail' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($credentials['usermail'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $remember = $request->has('remember');

        if (Auth::attempt([$loginType => $credentials['usermail'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (!$user->has_set_pin) {
                return redirect()->route('auth.set-pin')->with('success', 'Please set your transaction PIN.');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'usermail' => 'Invalid credentials.',
        ])->onlyInput('usermail');
    }


    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
