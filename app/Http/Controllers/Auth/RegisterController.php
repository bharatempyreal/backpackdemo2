<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Business;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // return User::create([
        //     'firstname' => $data['first-name'],
        //     'lastname' => $data['last-name'],
        //     'address' => $data['address'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        // // dd($data['last-name']);
        // // $data = [
            $datas = new User;
            $datas->firstname = $data['first-name'];
            $datas->lastname = $data['last-name'];
            $datas->address = $data['address'];
            $datas->email = $data['email'];
            $datas->password = Hash::make($data['password']);
        // // ];
            $datas->save();
            return $datas;


        // // User::create($data);
        // // dd($datas->id);
        // $business = new Business;
        // $business->user_id = $datas->id;
        // $business->save();

        // // $user = Business::create($business);
        // Auth::login($datas, true);
        // return redirect()->back();

    }
}
