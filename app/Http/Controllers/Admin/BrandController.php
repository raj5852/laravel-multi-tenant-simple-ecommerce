<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(15);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['nullable', 'image']
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        if ($request->hasFile('image')) {
            $brand->image =  fileupload($request->file('image'), 'brand');
        }
        $brand->save();
        toast('Brand created succfully', 'success');
        return to_route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['nullable', 'image']
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        if ($request->hasFile('image')) {
            $brand->image =  fileupload($request->file('image'), 'brand');
        }
        $brand->save();
        toast('brand updated successfully', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        toast('brand deleted successfully', 'success');
        return back();
    }
}
