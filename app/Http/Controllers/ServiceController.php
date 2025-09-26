<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $services = Service::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc') 
        ->paginate();
        // dd($service);
        return view('admin.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.index');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string']
        ]);

        // $user = Auth::user();
        // $admin = $user->service;
                                                                                                                                                                                                                                              
        $data['user_id'] = $request->user()->id;
        $service = Service::create($data);
        
        return to_route('service.index', $service)->with('message', 'Service was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required', 'string']
        ]);

        $service->update($data);
        
        return to_route('service.index', $service)->with('message', 'Service was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        
        return to_route('service.index')->with('message', 'Service was deleted');
    }
}
