<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attributes;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function listproperty(Request $request)
    {
        $category_data = Category::where('status',1)->get();
        return view('front.auth.list-property',compact('category_data'));
    }

    public function getAttributeAsPerCategory(Request $request){
        $response = [
            'status'=>false,
            'message'=>'Somthig Went Wrong',
        ];
        if(isset($request->category_id) && $request->category_id != ''){
            $attribute = Attributes::where('category_id',$request->category_id)->get();
            $response = [
                'status'=>true,
                'message'=>'Data Get Successfully',
                'data'=>$attribute
            ];
        }
        return response($response);
    }
}
