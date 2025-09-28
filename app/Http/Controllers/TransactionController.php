<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function transactionIndex()
    {   
        $user = Auth::user();

        $transactions = Transaction::with(['user', 'wallet', 'order'])
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('user.transaction.index', compact('transactions'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function transactionView(Transaction $transaction)
    {
        return view('user.transaction.view', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
