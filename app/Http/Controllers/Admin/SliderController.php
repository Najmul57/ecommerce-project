<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function sliderStore(Request $request)
    {
        $validated = $request->validate(
            [
                'image' => 'required',
            ]
        );
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('uploads/sliders/' . $name_gen);
        $image = 'uploads/sliders/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider Added Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        // return $slider;
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('uploads/sliders/' . $name_gen);
            $image = 'uploads/sliders/' . $name_gen;

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('slider')->with($notification);
        } else {
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Update Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('slider')->with($notification);
        }
    }

    public function destroy($id)
    {
        $old_image = Slider::findOrFail($id);
        unlink($old_image->image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider')->with($notification);
    }

    public function inactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Inactive Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider')->with($notification);
    }
    public function active($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider active Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider')->with($notification);
    }
}
