<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ApiMasterController extends Controller
{
    //
    public function get_user(Request $request){

         $users = DB::table('test_table')->where('identity_id',$request->identity_number)->first();

         if($users){
             $json = [
                "status"=>true,
                "message"=> "Anda adalah anggota terdaftar PCG",
                "data" => $users
            ];
         }else{
             $json = [
                "status"=> false,
                "message"=> "Data tidak ditemukan di PCG",
                "data" => ""
            ];
         }

        return response()->json($json);
    }
}
