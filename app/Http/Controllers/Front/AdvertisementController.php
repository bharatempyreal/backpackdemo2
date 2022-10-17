<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\Advertisement;
use App\Models\AdvertisementValue;
use Illuminate\Http\Request;
use File;

class AdvertisementController extends Controller
{
    public function listproperty(Request $request)
    {
        $category_data = Category::where('status',1)->get();
        return view('front.auth.list-property',compact('category_data'));
    }

    public function addListProperty($id){
        $category_id = $id;
        return view('front.auth.add_to_list_property',compact('category_id'));
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

    public function saveListProperty(Request $request){
        $removeImages =[];
        $i = 0;
        // dd($request->all());
        $fields=array_keys($request->all());
        unset($fields[0]);
        unset($fields[1]);
        foreach($fields as $k=>$f){
            if(substr($f, -3) == '_id' || $f == 'save_action' || $f == 'dropzone' || $f == 'path' || $f == 'cancelImages' || $f == 'removeImages'){
                unset($fields[$k]);
            }
        }
        if(isset($request->removeImages) && $request->removeImages != ''){
            $removeImages =json_decode($request->removeImages);
        }
        $items = new Advertisement;
        $items ->category_id = $request->category_id;
        $items->created_by = auth()->user()->id;
        $items->save();
        if($items->save()){
            foreach($fields as $value){
                $attributes_id = $value.'_id';
                $advertisement_value = New AdvertisementValue;

                if($request->hasFile($value)){
                    $file = $request->file($value);
                    $path = storage_path('/app/public/image/');
                    $filename = uniqid(). $i++. '.' .File::extension($file->getClientOriginalName());
                    $file->move($path,$filename);

                    $advertisement_value->value = $filename;
                    $advertisement_value->advertisement_id = $items->id;
                    $advertisement_value->name = $value;
                    $advertisement_value->attributes_id = $request->$attributes_id;
                    $advertisement_value->save();
                } else {
                    $advertisement_value->advertisement_id = $items->id;
                    $advertisement_value->value = $request->$value;
                    $advertisement_value->name = $value;
                    $advertisement_value->attributes_id = $request->$attributes_id;
                    $advertisement_value->save();
                }
             }
        }
        if(isset($removeImages) && !empty($removeImages)){
            foreach($removeImages as $key => $file){
                $path = storage_path('/app/public/image/'). $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        return redirect()->back();
    }

    // advertisemet listing add bharat

    public function ListingProperty(Request $request)
    {
        $listing  = Advertisement::with(['advertisedata','category'])->get();
        foreach($listing as $k =>$v){
            // dd($v->category);
        }
        $response = [
            'status'=>true,
            'message'=>'Data Get Successfully',
            'listing'=>$listing
        ];
        return response($response);
    }
}
