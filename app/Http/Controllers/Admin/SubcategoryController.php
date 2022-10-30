<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('category_name_en', 'asc')->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }
    public function subcategoryStore(Request $request)
    {
        $validated = $request->validate(
            [
                'subcategory_name_en' => 'required',
                'subcategory_name_bn' => 'required',
                'category_id' => 'required',
            ]
        );
        Subcategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace('', '-', $request->subcategory_name_bn),
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function subcategoryEdit($subcategory_id)
    {
        $categories = Category::orderBy('category_name_en', 'asc')->get();
        $subcategory = Subcategory::findOrFail($subcategory_id);
        return view('admin.subcategory.edit', compact('categories', 'subcategory'));
    }

    public function subcategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;
        $validated = $request->validate(
            [
                'subcategory_name_en' => 'required',
                'subcategory_name_bn' => 'required',
                'category_id' => 'required',
            ]
        );
        Subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace('', '-', $request->subcategory_name_bn),
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Sub Category Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('sub-category')->with($notification);
    }

    public function subcategoryDestroy($subcategory_id)
    {
        Subcategory::findOrFail($subcategory_id)->delete();
        $notification = array(
            'message' => 'SubCategory Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
