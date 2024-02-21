<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::latest()
            ->with(['category', 'brand'])->paginate(15);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'image' => ['required', 'image'],
            'brand' => ['required', 'exists:brands,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required']
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->image = fileupload($request->file('image'), 'product');
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        toast('Product created successfully');

        return to_route('admin.product.index');
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
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image'],
            'brand' => ['required', 'exists:brands,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required']
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        if ($request->hasFile('image')) {
            $product->image = fileupload($request->file('image'), 'product');
        }
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        toast('Product updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        toast('Product deleted successfully');
        return back();
    }
}
