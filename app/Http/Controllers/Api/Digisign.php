<?php
namespace App\Http\Controllers\Api;

use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserEKYC;
use Illuminate\Support\Facades\Validator;

class Digisign  extends Controller
{
    public function sign_callback(Request $request){
        $validator = Validator::make( $request->all(), [
            'msg' => 'required'
        ]);
        if($validator->fails()) {
            return  [
                "status"=> false,
                "message"=> 'Can\'t Proses document.',
            ];
        }
        $digisign = new HelpersDigiSign;
        $res = $digisign->sign_document_callback($request->msg);
        if($res){
            return redirect('sign/success');
        }
        $ekyc = UserEKYC::create([
            'callback'=>$request->msg,
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
        ]);
    }

    public function activation_callback(Request $request){
        $validator = Validator::make( $request->all(), [
            'msg' => 'required'
        ]);
        if($validator->fails()) {
            return  [
                "status"=> false,
                "message"=> 'Can\'t Proses activation.',
            ];
        }
        $digisign = new HelpersDigiSign;
        $res = $digisign->callback_activation($request->msg);
        if($res){
            return redirect('sign/success');
        }
        $ekyc = UserEKYC::create([
            'callback'=>$request->msg,
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
        ]);
    }
}
