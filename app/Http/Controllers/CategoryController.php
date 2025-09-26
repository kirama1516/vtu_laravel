<?php

namespace App\Http\Controllers;

use App\Models\Biller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $services = Service::all();
        $services = Service::where('status', 'active')->get();
        $billers = Biller::where('status', 'active')->get();
        
        $categories = Category::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        return view('admin.category.index', ['categories' => $categories, 'billers' => $billers, 'services' => $services]);
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
            'status' => ['required', 'string']
        ]);
        
        $data['user_id'] = $request->user()->id;
        $category = Category::create($data);
        
        return to_route('category.index', $category)->with('message', 'Category was created');
    }

    // public function updateStatus(Request $request)
    // {
    //     $request->validate([
    //         'id' => 'required|integer|exists:categories,id',
    //         'column' => 'required|string',
    //         'status' => 'required|boolean',
    //     ]);

    //     $category = Category::findOrFail($request->id);

    //     // allow only certain columns for security
    //     if (in_array($request->column, ['mtn', 'glo', '9mobile', 'airtel', 'status'])) {
    //         $category->{$request->column} = $request->status;
    //         $category->save();

    //         return response()->json([
    //             'success' => true,
    //             'message' => ucfirst($request->column) . ' updated successfully'
    //         ]);
    //     }

    //     return response()->json(['success' => false, 'message' => 'Invalid column'], 400);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         $data = $request->validate([
            'title' => ['required', 'string'],
            'status' => ['nullable', 'string']
        ]);

        $category->update($data);
        
        return to_route('category.index', $category)->with('message', 'Category was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return to_route('category.index')->with('message', 'Category was deleted');
    }
}
