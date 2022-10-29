<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use App\Models\User;
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
            'asset_name' =>$request->assetname,
            'asset_type' =>$request->asset_type,
            'asset_image' =>$request->assetimage,
            'asset_address' =>$request->assetaddress,
            'asset_landmark' =>$request->assetlandmark,
            'asset_city' =>$request->assetchoosecitys,
            'asset_state' =>$request->assetchoosestate,
            'asset_zipcode' =>$request->assetzipcode,
            'asset_advertisement_requirements' =>$request->assetmessage,
            'asset_property_gallery' =>$request->asset_property_gallery,

        ];
        if(isset($removeImages) && !empty($removeImages)){
            foreach($removeImages as $key => $file){
                $path = storage_path('/app/public/image/'). $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        $user = Business::create($data);
        return true ;
    }
    public function updatebusiness(Request $request)
    {
        // dd($request->all());
        $hide=($request->hide_half_form == 1) ? true : false;
        $response = [
            'status'=>false,
            'message'=>'Somthig Went wrong',
        ];
        $id = Auth::user()->id;
        $business = Business::where('user_id',$id)->first();

        if (is_null($business)) {
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
                'asset_name' =>$request->assetname,
                'asset_type' =>$request->asset_type,
                'asset_image' =>(isset($request->assetimage) && $request->assetimage != '')?$request->assetimage : '',
                'asset_address' =>$request->assetaddress,
                'asset_landmark' =>$request->assetlandmark,
                'asset_city' =>$request->assetchoosecitys,
                'asset_state' =>$request->assetchoosestate,
                'asset_zipcode' =>$request->assetzipcode,
                'asset_advertisement_requirements' =>$request->assetmessage,
                'asset_property_gallery' =>(isset($request->asset_property_gallery) && $request->asset_property_gallery != '')?$request->asset_property_gallery : '',
            ];
            $user = Business::create($data);
            if(isset($request->removeImages) && !empty($request->removeImages)){
                foreach(json_decode($request->removeImages) as $key => $file){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            if(isset($request->galleryremoveImages) && !empty($request->galleryremoveImages)){
                foreach(json_decode($request->galleryremoveImages) as $key => $file){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            $response = [
                'status'=>true,
                'message'=>'Profile Save Successfully',
            ];
            return response($response);
         }else{
             $business->businessname = $request->businessname;
             $business->email = $request->email;
             $business->phone = $request->phone;
             $business->address = $request->address;
             $business->landmark = $request->landmark;
             $business->city = $request->choosecitys;
             $business->state = $request->choosestate;
             $business->zipcode = $request->zipcode;
             $business->bioinformation = $request->message;
             $business->asset_name = $request->assetname;
             $business->asset_type = $request->asset_type;
             $business->asset_image = (isset($request->assetimage) && $request->assetimage != '' && count(json_decode($request->assetimage))>0)?$request->assetimage : '';
             $business->asset_address = $request->assetaddress;
             $business->asset_landmark = $request->assetlandmark;
             $business->asset_city = $request->assetchoosecitys;
             $business->asset_state = $request->assetchoosestate;
             $business->asset_zipcode = $request->assetzipcode;
             $business->asset_advertisement_requirements = $request->assetmessage;
             $business->asset_property_gallery = (isset($request->asset_property_gallery) && $request->asset_property_gallery != '' && count(json_decode($request->asset_property_gallery))>0)?$request->asset_property_gallery : '';
             if($business->save()){
                 $response = [
                     'status'=>true,
                     'message'=>'Profile Update Successfully',
                ];
            }else{
                $response = [
                    'status'=>false,
                    'message'=>'Somthig Went wrong',
                ];
            }
             if(isset($request->removeImages) && !empty($request->removeImages)){
                $removeImages = $request->removeImages;
                foreach(json_decode($removeImages) as $file){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
             if(isset($request->galleryremoveImages) && !empty($request->galleryremoveImages)){
                $galleryremoveImages = $request->galleryremoveImages;
                foreach(json_decode($galleryremoveImages) as $file){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
             return response($response);
            }
    }
    public function businessprofile(Request $request)
    {
        // dd($request->all());
        $hide=($request->hide_half_form == 1) ? true : false;
        $response = [
            'status'=>false,
            'message'=>'Somthig Went wrong',
        ];
        $id = Auth::user()->id;
        $business = User::where('id',$id)->first();
        $business->business_name = $request->businessname;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->landmark = $request->landmark;
        $business->city = $request->choosecitys;
        $business->state = $request->choosestate;
        $business->zipcode = $request->zipcode;
        $business->bio_information = $request->message;
        $business->profile_pic = $request->assetimage;
        if(isset($request->removeImages) && !empty($request->removeImages)){
            $removeImages = $request->removeImages;
            foreach(json_decode($removeImages) as $file){
                $path = storage_path('/app/public/image/'). $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        if($business->save()){
            $response = [
                'status'=>true,
                'message'=>'Profile Update Successfully',
        ];
        }else{
            $response = [
                'status'=>false,
                'message'=>'Somthig Went wrong',
            ];
        }
        return response($response);
    }
    public function getbusinessprofile(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $images = $user->profile_pic;
        if (is_null($user)) {
            return false;
        }else{
            // $images = [];
            // $images_val = [];
            // if($user->profile_pic != null){
            //     $all_images = $user->profile_pic;
            //     $all_images =  ltrim($all_images, $all_images[0]);
            //     $all_images = rtrim($all_images, ']');
            //     $all_images = explode(',',$all_images);
            //     if($all_images != null){
            //         // dd($all_images);
            //         foreach($all_images as $items){
            //             $items = ltrim($items, $items[0]);
            //             $items = rtrim($items, '"');
            //             $images[] = route('getStoragePath', ['image', $items]);
            //             $images_val[] = $items;
            //         }
            //     }
            // }
            return compact('user','images');
        }
    }


    // old getbusinessdata
    public function getbusinessdata(Request $request)
    {
        $user = Business::where('user_id',$request->id)->first();
        if (is_null($user)) {
            return false;
        }else{
            $images = [];
            $images_val = [];
            if($user->asset_image != null){
                $all_images = $user->asset_image;
                $all_images =  ltrim($all_images, $all_images[0]);
                $all_images = rtrim($all_images, ']');
                $all_images = explode(',',$all_images);
                if($all_images != null){
                    foreach($all_images as $items){
                        $items = ltrim($items, $items[0]);
                        $items = rtrim($items, '"');
                        $images[] = route('getStoragePath', ['image', $items]);
                        $images_val[] = $items;
                    }
                }
            }
            $gallary_img = [];
            $gallary_img_val = [];
            if($user->asset_property_gallery != null){
                $gallery_images = $user->asset_property_gallery;
                $gallery_images = ltrim($gallery_images, $gallery_images[0]);
                $gallery_images = rtrim($gallery_images, ']');
                $gallery_images = explode(',',$gallery_images);
                foreach($gallery_images as $items){
                    $items = ltrim($items, $items[0]);
                    // (isset($all_images) && !empty($all_images)) ? '';
                    $items = rtrim($items, '"');
                    $gallary_img[] = route('getStoragePath', ['image', $items]);
                    $gallary_img_val[] = $items;
                }
            }
                return compact('user','images','gallary_img');
        }
    }
    public function dropimages(Request $request)
    {
        $imageNameArr = [];
        $i = 0;
        if($request->file){
            $file = $request->file;
            // foreach($request->file as $key => $file){
                $path = storage_path('/app/public/image/');
                $imageName = uniqid(). $i++ . '.' .File::extension($file->getClientOriginalName());
                $file->move($path,$imageName);
                $imageNameArr[]=$imageName;
            // }
        }
        return  response($imageNameArr);
    }
    public function dropremoveimages(Request $request)
    {
        // dd($request->all());
        if(isset($request['files']) && !empty($request['files'])){
            foreach($request['files'] as $key => $file){
                $path = storage_path('/app/public/image/'). $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            return true;
        }
        return response(true);
    }
    public function editdropajaxRemoveImages(Request $request)
    {
        // dd($request->all());
        $path =  $request->file;;
        if (file_exists($path)) {
            unlink($path);
        }
        return true;
    }
}
