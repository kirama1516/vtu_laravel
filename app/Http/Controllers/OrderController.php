<?php

namespace App\Http\Controllers;

use App\Models\Biller;
use App\Models\Category;
use App\Models\Package;
use App\Models\Order;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function orderIndex()
    {
        $user = Auth::user();

        $orders = Order::with(['user', 'biller', 'service', 'package', 'category'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.order.index', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showAirtime()
    {
        // $service = Service::all();
        $service = Service::where('id', 1)->first();
        $billers = Biller::where('service_id', 1)->get();
        $categories = Category::where('service_id', 1)->get();
        $userPin = Auth::user()->pin;

        if (empty($userPin)) {
            return redirect()->route('auth.set-pin')->with('error', 'You need to set your PIN before buying airtime.');
        }

        return view('user.buyAirtime', [
            'billers' => $billers,
            'categories' => $categories,
            'service' => $service,
            'userPin' => $userPin
        ]);
    }

    public function buyAirtime(Request $request)
    { 
        $data = $request->validate([
            'biller_id'   => 'required|exists:billers,id',
            'service_id'  => 'required|exists:services,id',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:50',
            'beneficiary' => 'required|digits_between:10,11',
            'total'       => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'    => 'required|integer',
            'pin'         => 'required|digits:4',                                                                                   
        ]);
        
        $user = $request->user();
        
        if (!Hash::check($request->pin, Auth::user()->pin)) {
            return back()->withErrors(['pin' => 'Incorrect PIN entered.']);
        }
        
        $service = Service::findOrFail($request->service_id);
        if ($service->status !== 'active') {
            return back()->withErrors(['service' => 'Airtime is no longer available.']);
        }

        $data['user_id'] = $user->id;
        
        $biller = Biller::findOrFail($request->biller_id);
        $variation = $biller->variation;

        $wallet = Wallet::where('user_id', $user->id)->firstOrFail();
        if ($wallet->mainBalance < $request->total) {
            return back()->withErrors(['balance' => 'Insufficient wallet balance.']);
        }

        $order = Order::create([
            'user_id'     => $user->id,
            'biller_id'   => $request->biller_id,
            'service_id'  => $request->service_id,
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'beneficiary' => $request->beneficiary,
            'total'       => $request->total,
            'quantity'    => $request->quantity,
            'status'      => 'Pending',
            'reference'   => 'ORDER_' . mt_rand(10000000, 99999999), 
        ]);

        $check_balance = $wallet->mainBalance;
        $wallet->mainBalance -= $request->total;
        $wallet->save();
        $new_balance = $wallet->mainBalance;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('SMEPLUG_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://smeplug.ng/api/v1/data/purchase', [
            'network_id'  => $variation,
            'beneficiary' => $request->beneficiary,
            'price'       => $request->price,
        ]);

        // dd($response);

        $responses = $response->json();

        $pReference = $responses['reference'] ?? null;
        $pMessage   = $responses['msg'] ?? '';
        $pStatus    = $responses['status'] ?? false;

        if ($pStatus) {
            // Success → Mark Order as Completed
            $order->update([
                'provider_reference' => $pReference,
                'provider_message'   => $pMessage,
                'status'             => 'Completed',
                'provider'           => 'SMEPlug',
                'provider_response'  => json_encode($responses),
            ]);

            // Log Transaction
            Transaction::create([
                'user_id'       => $user->id,
                'wallet_id'     => $wallet->id,
                'order_id'      => $order->id,
                'reference'     => uniqid("TXN_"),
                'type'          => 'Debit',
                'price'         => $request->price,
                'balanceBefore' => $check_balance,
                'balanceAfter'  => $new_balance,
                'note'          => "Airtime purchase of {$request->price} for {$request->beneficiary}",
                'status'        => 'Completed',
            ]);

            return back()->with('message', 'Airtime purchase successful!');
        } else {
            $balanceAfter = $wallet->mainBalance;   
            $wallet->mainBalance += $request->total;
            $wallet->save();
            $balanceBefore = $wallet->mainBalance; 

            // $wallet->mainBalance = $balanceBefore;
            // $wallet->save();

            $order->update([
                'provider_reference' => $pReference,
                'provider_message'   => $pMessage,
                'status'             => 'Failed',
                'provider'           => 'SMEPlug',
                'provider_response'  => json_encode($responses),
            ]);

            Transaction::create([
                'user_id'       => $user->id,
                'wallet_id'     => $wallet->id,
                'order_id'      => $order->id,
                'reference'     => uniqid("FTXN_"),
                'type'          => 'Credit',
                'price'        => $request->price,
                'balanceBefore' => $balanceAfter,
                'balanceAfter'  => $balanceBefore,
                'note'          => "Transaction failed airtime purchase of {$request->price} for {$request->beneficiary}",
                'status'        => 'Failed',
            ]);

            Transaction::create([
                'user_id'       => $user->id,
                'wallet_id'     => $wallet->id,
                'order_id'      => $order->id,
                'reference'     => uniqid("RVS_"),
                'type'          => 'Credit',
                'price'        => $request->price,
                'balanceBefore' => $balanceAfter,
                'balanceAfter'  => $balanceBefore,
                'note'          => "Refund for failed airtime purchase of {$request->price} for {$request->beneficiary}",
                'status'        => 'Completed',
            ]);

            return back()->withErrors(['error' => "Airtime purchase failed: {$pMessage}"]);
        }
       
        // return redirect()->route('user.showAirtime')->with('message', 'Order was successful')->with('order', $order);
    }

    public function showData()
    {
         // $service = Service::all();
        $service = Service::where('id', 4)->first();
        $billers = Biller::where('service_id', 4)->get();
        $categories = Category::where('service_id', 4)->get();
        $packages = Package::where('service_id', 4)->get();
        $userPin = Auth::user()->pin;

        if (empty($userPin)) {
            return redirect()->route('auth.set-pin')->with('error', 'You need to set your PIN before buying airtime.');
        }

        return view('user.buyData', [
            'billers' => $billers,
            'packages' => $packages,
            'categories' => $categories,
            'service' => $service,
            'userPin' => $userPin
        ]);
    }

    public function loadCategories(Request $request)
    {
        $categories = Category::where('biller_id', $request->biller_id)->get();
        return response()->json($categories);
    }

    public function loadPackages(Request $request)
    {
        $packages = Package::where('category_id', $request->category_id)->get();
        return response()->json($packages);
    }

    public function loadAmount(Request $request)
    {
        $package = Package::findOrFail($request->package_id);
        return response()->json(['amount' => $package->price]);
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
    public function orderView(Order $order)
    {
        return view('user.order.view', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
