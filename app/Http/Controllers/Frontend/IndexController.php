<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\multiImage;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('category_name_en', 'asc')->get();
        $products = Product::where('status', 1)->orderby('id', 'desc')->get();
        $sliders = Slider::where('status', 1)->orderby('id', 'desc')->limit(5)->get();
        $featured = Product::where('featured', 1)->where('status', 1)->orderby('id', 'desc')->get();
        $hot_deals = Product::where('hot_deals', 1)->where('status', 1)->orderby('id', 'asc')->get();
        $special_offer = Product::where('special_offer', 1)->where('status', 1)->orderby('id', 'asc')->get();
        $special_deals = Product::where('special_deals', 1)->where('status', 1)->orderby('id', 'asc')->get();
        $skip_category_1 = Category::skip(1)->first();
        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'skip_category_1'));
    }
    public function singleProduct($id)
    {
        $products = Product::findOrFail($id);

        $color = $products->product_color_en;
        $product_color_en = explode(',', $color);

        $size = $products->product_size_en;
        $product_size_en = explode(',', $size);

        $related_products = Product::where('category_id', $products->category_id)->orderby('id', 'desc')->get();
        $multi_img = multiImage::where('product_id', $id)->get();
        return view('frontend.single-product', compact('products', 'multi_img', 'product_color_en', 'product_size_en', 'related_products'));
    }
    public function tagWiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orderby('id', 'desc')->paginate(1);
        $categories = Category::orderby('category_name_en', 'asc')->get();
        return view('frontend.product_tags', compact('products', 'categories'));
    }
    public function subcategoryProduct($id)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $id)->orderby('id', 'desc')->paginate(1);
        $categories = Category::orderby('category_name_en', 'asc')->get();
        return view('frontend.inc.category-product', compact('products', 'categories'));
    }

    // product with ajax
    public function productView($product_id)
    {
        $product = Product::with('category', 'brand')->findOrFail($product_id);
        // $product = Product::findOrFail($product_id);
        $color = $product->product_color_en;
        $product_color = explode(',', $color);
        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
}
