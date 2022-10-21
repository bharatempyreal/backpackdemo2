<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class NotificationController extends Controller
{
    public function notification_status_change (Request $request){
        $res=[
            'status'=>false,
            'message'=>'Somthing Went Wrong'
        ];
        if(isset($request->name) && $request->name != '' && isset($request->status) && $request->status != ''){
            $name = $request->name;
            $user_data = User::find(auth()->user()->id);
            if(isset($user_data) && !empty($user_data)){
                $user_data->$name = $request->status;
                if($user_data->save()){
                    $res=[
                        'status'=>true,
                        'message'=>'Status Changed Successfullay'
                    ];
                }
            }else{
                $res['message'] = 'Data Not Found';
            }
        }
        return response($res);
    }
}
