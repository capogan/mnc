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
       
        if($res != '' || $res != null){
            return redirect($res);
        }else{
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
        if($user->group == 'borrower'){
            return redirect('/profile/transaction');
        }else{
            return redirect('/profile/lender/register/sign');
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

    public function test_commissionare($uid =226 ){
        $u = User::with('digisignInfocommisioner')->where('id' , $uid)->first();
        if(!$u){
            return;
        }
        
        if(!$u->digisignInfocommisioner){
            return ;
        }
        //print_r($u->digisignInfocommisioner->provinces); exit;
        if(!$u->digisignInfocommisioner->provinces && !$u->digisignInfocommisioner->cities && !$u->digisignInfocommisioner->distritcs && !$u->digisignInfocommisioner->villages){
            return ;
        }
        $path = public_path() . '/upload/lender/file';
        $digisign =new HelpersDigiSign;
        $digisign->requestRegistration(
            $path .'/'. $u->digisignInfocommisioner->identity_photo,
            $path .'/'. $u->digisignInfocommisioner->self_photo,
            $path .'/'. $u->digisignInfocommisioner->npwp_image,
            $u->digisignInfocommisioner->address,
            $u->digisignInfocommisioner->gender,
            $u->digisignInfocommisioner->districts->name,
            $u->digisignInfocommisioner->villagess->name,
            $u->digisignInfocommisioner->kodepos,
            $u->digisignInfocommisioner->cities->name,
            $u->digisignInfocommisioner->commissioner_name,
            $u->digisignInfocommisioner->commissioner_phone_number,
            $u->digisignInfocommisioner->commissioner_dob,
            $u->digisignInfocommisioner->provinces->name,
            $u->digisignInfocommisioner->commissioner_nik,
            $u->digisignInfocommisioner->commissioner_pob,
            $u->digisignInfocommisioner->commissioner_email,
            $u->digisignInfocommisioner->commissioner_npwp,
            true,
            $uid
        );

        print_r($digisign); exit;

    }
    
}
