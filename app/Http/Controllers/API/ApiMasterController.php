<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ApiMasterController extends Controller
{
    //
    public function get_user(Request $request){


        if($request->identity_number == '122011611890003'){

            $json = [
                "identity_id"=> "122011611890003",
                "name"=> "Sahala Morgan Tobing",
                "address"=> "Jl Kramat Lontar III no 50",
                "gender"=> "male",
                "phone_number"=> "085275608469",
            ];
            $json = [
                "status"=>true,
                "message"=> "Anda adalah anggota terdaftar PCG",
                "data" => $json
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
