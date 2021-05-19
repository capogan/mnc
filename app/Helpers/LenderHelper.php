<?php
namespace App\Helpers;

use App\DigisignActivation;
use Illuminate\Support\Facades\Auth;

class LenderHelper {

    static function active_lender(){
       // print_r(DigisignActivation::where('uid' , Auth::id())->where('status_agreement_sign' , true)->where('status_activation' , 'active')->first());
        $lender = DigisignActivation::where('uid' , Auth::id())->where('status_agreement_sign' , true)->where('status_activation' , 'active')->first();
        if($lender){
            return true;
        }
        return false;
    }

}
