<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['size' => $request->size],
                'options' => ['color' => $request->color],
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Your Product']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['size' => $request->size],
                'options' => ['color' => $request->color],
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Your Product']);
        }
    }
}
