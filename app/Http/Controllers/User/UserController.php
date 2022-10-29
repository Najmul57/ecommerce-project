<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
            ],
            [
                'name.required' => 'Name de betha',
                'email.required' => 'email dibe ki tr bape',
            ]

        );
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Profile Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function userImage()
    {
        return view('user.profile-change');
    }
    public function updateImage(Request $request)
    {
        $old_image = $request->old_image;

        if (User::findOrFail(Auth::id())->image == 'front/assets/images/user/avatar.jpeg') {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('front/assets/images/user/' . $name_gen);
            $save_url = 'front/assets/images/user/' . $name_gen;
            User::findOrFail(Auth::id())->update([
                'image' => $save_url
            ]);
            $notification = array(
                'message' => 'Profile Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            unlink($old_image);

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('front/assets/images/user/' . $name_gen);
            $save_url = 'front/assets/images/user/' . $name_gen;
            User::findOrFail(Auth::id())->update([
                'image' => $save_url
            ]);
            $notification = array(
                'message' => 'Profile Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function userPassword()
    {
        return view('user.user-password');
    }
    public function updatePssword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required', 'confirmed',
        ]);

        $dbpass = Auth::user()->password;
        $current_password = $request->old_password;
        $new_password = $request->new_password;
        $password_confirmation = $request->password_confirmation;

        if (Hash::check($current_password, $dbpass)) {
            if ($new_password == $password_confirmation) {
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($new_password)
                ]);
                Auth::logout();
                $notification = array(
                    'message' => 'Password Change and Login Now!',
                    'alert-type' => 'success'
                );
                return redirect()->route('login')->with($notification);
            } else {
                $notification = array(
                    'message' => 'New Password && Confirm Password not Match',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Old Password not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
