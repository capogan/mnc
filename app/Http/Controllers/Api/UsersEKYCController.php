<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\UserEKYC;
use Illuminate\Http\Request;

class UsersEKYCController extends Controller
{
    public function index(Request $request){


        $ekyc = UserEKYC::create([
            'callback'=>$request,
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
        ]);

        if($ekyc){
            $json = [
                "status"=> true,
                "message"=> 'Data berhasil ditambahkan.',
            ];
        }else{
            if($ekyc){
                $json = [
                    "status"=> false,
                    "message"=> 'Data Error',
                ];
            }
        }
        return response()->json($json);
    }
}
