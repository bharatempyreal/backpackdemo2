<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Attributes;
use App\Models\Advertisement;
use App\Models\AdvertisementValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;

class AdvertisementController extends Controller
{
    public function listproperty(Request $request)
    {
        $category_data = Category::where('status',1)->get();
        return view('front.auth.list-property',compact('category_data'));
    }

    public function addListProperty($id,$advertisement_ID=''){
        $category_id = $id;
        $advertisement_id  = '';
        if(isset($advertisement_ID) && $advertisement_ID != ''){
            $check = Advertisement::where('id',$advertisement_ID)->first();
            if(isset($check) && !empty($check)){
                $user_id = $check->created_by;
                $super_admins = User::whereHas("roles", function($q){ $q->where("name", "Admin"); })->pluck('id');
                if($user_id == auth()->user()->id || in_array( $user_id ,$super_admins)){
                    $advertisement_id = $advertisement_ID;
                }else{
                    // error
                }
            }
        }
        return view('front.auth.add_to_list_property',compact('category_id'));
    }

    public function getAttributeAsPerCategory(Request $request){
        $response = [
            'status'=>false,
            'message'=>'Somthig Went Wrong',
        ];
        if(isset($request->category_id) && $request->category_id != ''){
            $attribute_grop_ids = Attributes::where('category_id',$request->category_id)->orWhere('is_default','1')->groupBY('attributegroup_id')->pluck('attributegroup_id')->toArray();
            $data=[];
            if(isset($attribute_grop_ids) && !empty($attribute_grop_ids)){
                foreach($attribute_grop_ids as $id){
                    $result = Attributes::with('attributegroup')->where(function($q) use($request){
                        $q->where('category_id',$request->category_id)->orWhere('is_default','1');
                    })->where('attributegroup_id',$id)->get();
                    if(isset($result) && !empty($result)){
                        $data[(isset($result[0]->attributegroup->name) && $result[0]->attributegroup->name != '') ? $result[0]->attributegroup->name : 'Extra']=$result;
                    }
                }
            }
            $response = [
                'status'=>true,
                'message'=>'Data Get Successfully',
                'data'=>$data
            ];
        }
        return response($response);
    }

    public function saveListProperty(Request $request){
    try{
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
                    $advertisement_value->name = str_replace("_"," ",$value);
                    $advertisement_value->attributes_id = $request->$attributes_id;
                    $advertisement_value->save();
                } else {
                    $advertisement_value->advertisement_id = $items->id;
                    $advertisement_value->value = $request->$value;
                    $advertisement_value->name = str_replace("_"," ",$value);
                    $advertisement_value->attributes_id = $request->$attributes_id;
                    $advertisement_value->save();
                }
             }
        }
        if(isset($removeImages) && !empty($removeImages)){
            foreach($removeImages as $key => $file){
                if($file != ''){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
        }
        Session::flash('message', 'Advertisement Add Successfullay');
        Session::flash('status', 'success');
    } catch (Exception $e) {
            return $e;
    }
        return redirect()->route('adex-market-place');
    }

    public function ajaxremoveImagesFront(Request $request)
    {
        if(isset($request['files']) && !empty($request['files'])){
            foreach($request['files'] as $key => $file){
                if($file != ''){
                    $path = storage_path('/app/public/image/'). $file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            return true;
        }
        return response(true);
    }

    public function propertyDetail($id,Request $request){
        if(!isset($id) || $id != ''){
            $advertisement_data = Advertisement::with('advertisedata','advertisedata.attribute')->find($id);
            if(!isset($advertisement_data) || !empty($advertisement_data)){
                $advertisedata = $advertisement_data->advertisedata->toArray();
                $attributegroup_id =  array_map(function($d1){
                    return $d1['attribute']['attributegroup_id'];
                },$advertisedata);
                $attributegroup_id=array_unique($attributegroup_id);
                $group_by_data = [];
                $ids = [3,4,5,6,1,2];
                $use = [
                    'ids'=>$ids,
                    'make_grop'=>''
                ];
                foreach($attributegroup_id as $make_grop){
                    $use['make_grop'] = $make_grop;
                    // $ad_val_data = AdvertisementValue::with('attribute','attribute.attributegroup')->where('advertisement_id',$id)->whereHas('attribute',function($q)use($use){ $q->where('attributegroup_id',$use['make_grop']);})->where(function($q1)use($use){
                    //     $q1->whereHas('attribute',function($q2)use($use){ $q2->orderByRaw('FIELD (category_type, ' . implode(', ', $use['ids']) . ') ASC');});
                    // })->get()->toArray();
                    $ad_val_data = AdvertisementValue::with('attribute','attribute.attributegroup')->where('advertisement_id',$id)->whereHas('attribute',function($q)use($use){ $q->where('attributegroup_id',$use['make_grop']);})->get()->toArray();
                    $group_by_data[$ad_val_data[0]['name']]=$ad_val_data;
                }
                // $n=[];
                // for($i=0;$i<count($group_by_data);$i++){
                //     $key=array_keys($group_by_data);
                //     $value = array_values($group_by_data);
                //     $n[$key[$i]] = usort($group_by_data[$key[$i]],function($a){
                //         return ($a['attribute']['category_type'] == 3) ? -1 : 1;
                //     });
                // }

                // foreach($group_by_data as $k=>$s_grop_data){
                //     $n[$k]= usort($s_grop_data, function ($a, $b) use ($ids) {
                //         $pos_a = array_search($a['attribute']['category_type'], $ids);
                //         $pos_b = array_search($b['attribute']['category_type'], $ids);
                //         return $pos_a - $pos_b;
                //     });
                // }
                // $group=array_column($advertisedata,'attribute');
                // dd($advertisement_data->advertisedata->attribute->toArray(),$group);
                // $data = $advertisement_data->advertisedata->toArray();
                // usort($data, function($a){
                //     $custom_short = [3];
                //     $key = 0;
                //     return ($a['attribute']['category_type'] == $custom_short[$key]) ? -1 : 1;
                // });
                // dd($advertisement_data->advertisedata->toArray(),$data);
                return view('front.auth.property_detail',compact('group_by_data'));
            }else{
                Session::flash('message', 'Data Not Found');
                Session::flash('status', 'error');
            }
        }else{
            Session::flash('message', 'Something Went Wrong');
            Session::flash('status', 'error');
        }
    }

    public function getAdvertisementData(Request $request){
        dd($request->all());
    }

    // advertisemet listing add bharat

    public function ListingProperty(Request $request)
    {
        // $listing  = Advertisement::with(['advertisedata','category','advertisedata.attribute'])->whereHas('advertisedata',function($query){
        //     $query->whereHas('attribute',function($que){
        //          $que->where('is_default','1');
        //     });
        //  })->get();
        $listing  = Advertisement::with(['advertisedata','category','advertisedata.attribute'])->get();
        $image = [];
        foreach($listing as $k =>$v){
            foreach($v->advertisedata as $k1 => $v1){
                if($v1->attribute->category_type == 3 || $v1->attribute->category_type == 6){
                    if(!isset($image[$v->id]) || $image[$v->id] == ''){
                        $image[$v->id]=$v1->value;
                    }
                }
            }
            if(!isset($image[$v->id]) || $image[$v->id] == ''){
                $image[$v->id]= $v->category->image;
            }
        }
        $listing['images'] = $image;
        $response = [
            'status'=>true,
            'message'=>'Data Get Successfully',
            'listing'=>$listing,
        ];
        return response($response);
    }
}
