<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index(){
        $products = Product::latest()

        ->when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })
        ->get();
        return view('front.home',compact('products'));
    }
}
