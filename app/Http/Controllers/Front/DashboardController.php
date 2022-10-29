<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function profile(Request $request)
    {
        return view('front.auth.profile');
    }
    public function business(Request $request)
    {
        return view('front.auth.business');
    }
    public function contract(Request $request)
    {
        return view('front.auth.contract');
    }
    public function user_dashboard(Request $request)
    {
        return view('front.auth.user-dashboard');
    }
    public function userlogout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
