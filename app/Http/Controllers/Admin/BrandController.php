<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }
    public function brandStore(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_bn' => 'required',
                'brand_image' => 'required',
            ]
        );

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/brands/' . $name_gen);
        $save_url = 'uploads/brands/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Brand Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function brandEdit($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function brandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/brands/' . $name_gen);
            $save_url = 'uploads/brands/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                'brand_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Brand Added!',
                'alert-type' => 'success'
            );
            return redirect()->route('brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn)
            ]);
            $notification = array(
                'message' => 'Brand Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('brand')->with($notification);
        }
    }

    public function brandDestroy($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($brand_id)->delete();

        $notification = array(
            'message' => 'Brand Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('brand')->with($notification);
    }
}
