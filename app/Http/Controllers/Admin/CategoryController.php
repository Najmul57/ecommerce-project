<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }
    public function categoryStore(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_bn' => 'required',
                'category_icon' => 'required',
            ]
        );

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace('', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Category Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('admin.category.edit', compact('category'));
    }
    public function categoryUpdate(Request $request)
    {
        $category_id = $request->id;
        $validated = $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_bn' => 'required',
                'category_icon' => 'required',
            ]
        );

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace('', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('category')->with($notification);
    }
    public function categoryDestroy($category_id)
    {
        Category::findOrFail($category_id)->delete();
        $notification = array(
            'message' => 'Category Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
