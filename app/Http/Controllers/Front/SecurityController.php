<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SecurityController extends Controller
{
    public function profile_status(Request $request)
    {
        $response = [
            'status'=>false,
            'message'=>'Somthig Went wrong',
        ];
        $data = User::find(Auth::user()->id);
        if(!empty($data)) {
            $data->profile_status = $request->status;
            if($data->save()){
                $response = [
                    'status'=>true,
                    'message'=>'Profile Status Changed Successfully',
                ];
            }
        }else{
            $response = [
                'status'=>false,
                'message'=>'Data Not Found',
            ];
        }
        return response($response);
    }
    public function show_email(Request $request)
    {
        $response = [
            'status'=>false,
            'message'=>'Somthig Went Wrong',
        ];
        $data = User::find(Auth::user()->id);
        if(!empty($data)) {
            $data->show_email = $request->email;
            if($data->save()){
                $response = [
                    'status'=>true,
                    'message'=>'Email Status Changed Successfully',
                ];
            }
        }else{
            $response = [
                'status'=>false,
                'message'=>'Data Not Found',
            ];
        }
        return response($response);

    }
    public function change_password(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'curentpassword' => 'required|min:8',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        if(Hash::check($request->curentpassword,auth()->user()->password)){
            $user_data = User::find(auth()->user()->id);
            $user_data->password = Hash::make($request->password);
            if($user_data->save()){
                Session::flash('message', 'Password Changed Successfully');
                Session::flash('status', 'success');
            }else{
                Session::flash('message', 'Somthing Went Wrong');
                Session::flash('status', 'error');
            }
        }else{
            Session::flash('message', 'Old Password is Wrong');
            Session::flash('status', 'error');
        }

        return redirect()->back();
    }
}
