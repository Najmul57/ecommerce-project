<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChildcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'asc')->get();
        $childcategories = Childcategory::latest()->get();
        return view('admin.childcategory.index', compact('categories', 'childcategories'));
    }

    // ajax dependency
    public function getSubCat($category_id)
    {
        $subcategory = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'asc')->get();
        return json_encode($subcategory);
    }
    public function childcategoryStore(Request $request)
    {
        // $validated = $request->validate(
        //     [
        //         'category_name_en' => 'required',
        //         'category_name_bn' => 'required',
        //         'category_icon' => 'required',
        //     ]
        // );

        Childcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_name_en' => $request->childcategory_name_en,
            'childcategory_name_bn' => $request->childcategory_name_bn,
            'childcategory_slug_en' => strtolower(str_replace('', '-', $request->childcategory_name_en)),
            'childcategory_slug_bn' => str_replace('', '-', $request->childcategory_name_bn),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'ChildCategory Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function childcategoryEdit($childcategory_id)
    {
        $childcategory = Childcategory::findOrFail($childcategory_id);
        // return $childcategory;
        return view('admin.childcategory.edit', compact('childcategory'));
    }

    public function childcategoryUpdate(Request $request)
    {
        $childcategory_id = $request->id;
        Childcategory::findOrFail($childcategory_id)->update([
            'childcategory_name_en' => $request->childcategory_name_en,
            'childcategory_name_bn' => $request->childcategory_name_bn,
            'childcategory_slug_en' => strtolower(str_replace('', '-', $request->childcategory_name_en)),
            'childcategory_slug_bn' => str_replace('', '-', $request->childcategory_name_bn),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'ChildCategory Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('childcategory')->with($notification);
    }

    public function childcategoryDestroy($childcategory_id)
    {
        Childcategory::findOrFail($childcategory_id)->delete();
        $notification = array(
            'message' => 'ChildCategory Delete!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
