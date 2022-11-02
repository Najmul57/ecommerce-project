<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\multiImage;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('brands', 'categories'));
    }
    public function getChildCat($subcategory_id)
    {
        $childcategory = Childcategory::where('subcategory_id', $subcategory_id)->orderBy('childcategory_name_en', 'asc')->get();
        return json_encode($childcategory);
    }
    public function storeProduct(Request $request)
    {

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/products/thumbnails/' . $name_gen);
        $save_url = 'uploads/products/thumbnails/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => str_replace('', '-', $request->product_name_en),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => str_replace('', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_bn' => $request->short_description_bn,
            'long_description_en' => $request->long_description_en,
            'long_description_bn' => $request->long_description_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multi_img');

        foreach ($images as $img) {
            $name_image = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('uploads/products/multi_image/' . $name_image);
            $save_image = 'uploads/products/multi_image/' . $name_image;

            multiImage::insert([
                'product_id' => $product_id,
                'product_photo' => $save_image,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function manageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function productEdit($product_id)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $product = Product::findOrFail($product_id);
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }
    public function updateProduct(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => str_replace('', '-', $request->product_name_en),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => str_replace('', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_bn' => $request->short_description_bn,
            'long_description_en' => $request->long_description_en,
            'long_description_bn' => $request->long_description_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Product Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);
    }


    public function productDestroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $img = $product->product_thumbnail;
        unlink($img);

        Product::findOrFail($product_id)->delete();
        $notification = array(
            'message' => 'Product Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
