<?php
namespace App\Http\Controllers\Api;

use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserEKYC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Digisign  extends Controller
{
    public function sign_callback(Request $request){
        $validator = Validator::make( $request->all(), [
            'msg' => 'required'
        ]);
        UserEKYC::create([
            'callback'=>$request->msg,
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
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
        $user = User::where('email' ,$res['data']['email_user'])->first();
        if(!$user){
            return redirect('/myprofile');
        }
        if($user->group == 'borrower'){
            return redirect('/profile/transaction');
        }else{
            return redirect('/myprofile');
        }

        // UserEKYC::create([
        //     'callback'=>$request->msg,
        //     'created_at'=>date('Y-m-d'),
        //     'updated_at'=>date('Y-m-d'),
        // ]);
        if($res){
            return redirect('sign/success');
        }
        // $ekyc = UserEKYC::create([
        //     'callback'=>$request->msg,
        //     'created_at'=>date('Y-m-d'),
        //     'updated_at'=>date('Y-m-d'),
        // ]);
    }
}
