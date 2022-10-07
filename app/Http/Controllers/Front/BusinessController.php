<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use File;

class BusinessController extends Controller
{
    public function createbusiness(Request $request)
    {

        // dd($request->all());
        $data = [
            'user_id'=> Auth::user()->id,
            'businessname'=> $request->businessname,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'landmark'=> $request->landmark,
            'city'=> $request->choosecitys,
            'state'=> $request->choosestate,
            'zipcode'=> $request->zipcode,
            'bioinformation'=> $request->message,

        ];
        $user = Business::create($data);
        return true ;
    }
    public function updatebusiness(Request $request)
    {
        $id = Auth::user()->id;
        $business = Business::where('user_id',$id)->first();
        // dd($business);
        $business->asset_name = $request->assetname;
        $business->asset_type = $request->apartment;
        $business->asset_image = $request->assetimage;
        $business->asset_address = $request->assetaddress;
        $business->asset_landmark = $request->assetlandmark;
        $business->asset_city = $request->assetchoosecitys;
        $business->asset_state = $request->assetchoosestate;
        $business->asset_zipcode = $request->assetzipcode;
        $business->asset_advertisement_requirements = $request->assetmessage;
        $business->asset_property_gallery = $request->asset_property_gallery;
        $business->save();
        $response['data']     = 'success';
        return response()->json($response);
    }
    public function getbusinessdata(Request $request)
    {
        $user = Business::where('user_id',$request->id)->first();
        // dd($user);
        return compact('user');
    }
    public function dropimages(Request $request)
    {
        $imageNameArr = [];
        $i = 0;
        if($request->file){
            foreach($request->file as $key => $file){
                $path = storage_path('/app/public/image/');
                $imageName = uniqid(). $i++. '.' .File::extension($file->getClientOriginalName());
                $file->move($path,$imageName);
                $imageNameArr[]=$imageName;
            }
        }
        return  response($imageNameArr);
    }
    public function dropremoveimages(Request $request)
    {
        if(isset($request->file_name) && $request->file_name != ''){
            $path = storage_path('/app/public/image/'). $request->file_name;
            if (file_exists($path)) {
                if(unlink($path)){
                    return true;
                }
            }
        }
        return false;
    }
}
