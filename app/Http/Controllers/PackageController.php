<?php

namespace App\Http\Controllers;

use App\Models\Biller;
use App\Models\Category;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $services = Service::all();
        $services = Service::where('status', 'active')->get();
        $billers = Biller::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        
        $packages = Package::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        return view('admin.package.index', ['packages' => $packages, 'categories' => $categories, 'billers' => $billers, 'services' => $services]);
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
            'biller_id' => ['required', 'integer'],
            'category_id' => ['nullable', 'integer'],
            'api_code' => ['nullable', 'string'],
            'size' => ['nullable', 'string'],
            'validatity' => ['nullable', 'string'],
            'cost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'status' => ['required', 'string']
        ]);
        
        $data['user_id'] = $request->user()->id;
        $package = Package::create($data);
       
        return to_route('package.index', $package)->with('message', 'Package was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view('admin.package.show', ['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.package.show', ['package' => $package]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'api_code' => ['nullable', 'string'],
            'size' => ['nullable', 'string'],
            'validatity' => ['nullable', 'string'],
            'cost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'status' => ['nullable', 'string']
        ]);

        $package->update($data);
        
        return to_route('package.index', $package)->with('message', 'Package was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        
        return to_route('package.index')->with('message', 'Package was deleted');
    }
}
