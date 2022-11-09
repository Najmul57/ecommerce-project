<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //for bangla
    public function bangla()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'bangla');
        return redirect()->back();
    }
    //for english
    public function english()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('languate', 'english');
        return redirect()->back();
    }
}
