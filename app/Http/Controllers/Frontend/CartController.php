<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->product_thumbnail,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added Your Product']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->product_thumbnail,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added Your Product']);
        }
    }

    public function miniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove']);
    }


    // wishlist
    public function addToWishlist(Request $request, $id)
    {
        if (Auth::check()) {
            $existas = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first();
            if (!$existas) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['error' => 'Successfully Added With Wishlist!']);
            } else {
                return response()->json(['error' => 'Product Already Exists!']);
            }
            return response()->json(['error' => 'Successfully Added With Wishlist!']);
        } else {
            return response()->json(['error' => 'Login Your Account']);
        }
    }
}
