<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ApiMasterController extends Controller
{
    //
    public function get_user(Request $request){

         $users = DB::table('pcg_users')->where('identity_id',$request->identity_number)->first();

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

    public function get_invoice(Request $request){

        $invoice = DB::table('pcg_invoice')->where('invoice_number',$request->invoice_number)->first();

        $invoice_detail =  DB::table('pcg_invoice_detail')->where('id_invoice',$invoice->id)->get();

        $table = "<table class='table table-striped table-bordered'><tr class='table-head'><th>No</th><th>Nama Barang</th><th>Harga Barang</th><th>Jumlah Barang</th></tr><tbody>";

        $num = 1;
        foreach ($invoice_detail as $key=> $val){
            $table .= "<tr><td>".$num."</td><td>".$val->item_name."</td><td>".$val->item_price."</td><td>".$val->quantity."</td></tr>";
            $num ++;
        }
        $table .= "</table>";

        if($invoice){
            $json = [
                "status"=> true,
                "message"=> "Data ditemukan",
                "data" => $table
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

    /**
     * @OA\Get(
     *     path="/greet",
     *     tags={"greeting"},
     *     summary="Returns a Sample API response",
     *     description="A sample greeting to test out the API",
     *     operationId="greet",
     *     @OA\Parameter(
     *          name="firstname",
     *          description="nama depan",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="lastname",
     *          description="nama belakang",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function check_loan_limit(){

    }
}
