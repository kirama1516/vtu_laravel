<?php

namespace App\Http\Controllers;

use App\Models\Biller;
use App\Models\Service;
use Illuminate\Http\Request;

class BillerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // $services = Service::all();
        $services = Service::where('status', 'active')->get();
        $billers = Biller::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        return view('admin.biller.index', ['billers' => $billers, 'services' => $services]);
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
        $data = $request->validate([
            'title' => ['required', 'string'],
            'service_id' => ['required', 'integer'],
            'logo' => ['nullable', 'string'],
            'variation' => ['required', 'string'],
            'status' => ['nullable', 'string']
        ]);
        
        $data['user_id'] = $request->user()->id;
        $biller = Biller::create($data);
        
        return to_route('biller.index', $biller)->with('message', 'Biller was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Biller $biller)
    {
        return view('admin.biller.show', ['biller' => $biller]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biller $biller)
    {
        return view('admin.biller.edit',  ['biller' => $biller]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biller $biller)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'logo' => ['nullable', 'string'],
            'variation' => ['required', 'string']
        ]);

        $biller->update($data);
        
        return to_route('biller.index', $biller)->with('message', 'Biller was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biller $biller)
    {
        $biller->delete();
        
        return to_route('biller.index')->with('message', 'Biller was deleted');
    }
}
