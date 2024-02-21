<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    function addtoCart($id)
    {
        $product = Product::query()->findOrFail($id);
        $ids = collect(session()->get('product_ids'));

        if ($ids->contains($product->id)) {
            toast('Product already added', 'error');
            return back();
        } else {
            $data = $ids->push($product->id);
            session([
                'product_ids' => $data
            ]);
        }
        toast('Add to card successfully!', 'success');

        return back();
    }
}
