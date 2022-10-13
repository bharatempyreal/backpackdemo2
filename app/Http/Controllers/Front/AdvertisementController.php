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
            $attribute_grop_ids = Attributes::where('category_id',$request->category_id)->groupBY('attributegroup_id')->pluck('attributegroup_id')->toArray();
            $data=[];
            if(isset($attribute_grop_ids) && !empty($attribute_grop_ids)){
                foreach($attribute_grop_ids as $id){
                    $result = Attributes::with('attributegroup')->where('category_id',$request->category_id)->where('attributegroup_id',$id)->get();
                    if(isset($result) && !empty($result)){
                        $data[(isset($result[0]->attributegroup->name) && $result[0]->attributegroup->name != '') ? $result[0]->attributegroup->name : 'Extra']=$result;
                    }
                }
            }
            // dd($data);
            $response = [
                'status'=>true,
                'message'=>'Data Get Successfully',
                'data'=>$data
            ];
        }
        return response($response);
    }
}
