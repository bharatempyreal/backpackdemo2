<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactas;

class ContactasController extends Controller
{
    public function contactasstore(Request $request)
    {


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Contactas::create($data);
        $response = [
            'status'=>true,
            'message'=>'Data Store Successfully',
        ];

        return response($response);
    }
}
