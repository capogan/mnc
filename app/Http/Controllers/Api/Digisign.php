<?php
namespace App\Http\Controllers\Api;

use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $digisign->sign_document_callback($request->msg);
    }
}
