<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function myprofile(Request $request)
    {
        return view('front.auth.my-profile');
    }
    public function security(Request $request)
    {
        return view('front.auth.security');
    }
    public function notification(Request $request)
    {
        return view('front.auth.notification');
    }
    public function listproperty(Request $request)
    {
        return view('front.auth.list-property');
    }
    public function myadex(Request $request)
    {
        return view('front.auth.my-adex');
    }
    public function mywallet(Request $request)
    {
        return view('front.auth.my-wallet');
    }
}
