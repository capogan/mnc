<?php
namespace App\Http\Controllers\Api;

use App\Helpers\BNI;
use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BNITest  extends Controller
{
    public function inquiry_account_info(){
        $data = [
            "accountNumber" => "0115476117"
        ];
        $bni = new BNI;
        print_r($bni->inquiry_account_info($data));
    }
    public function inquiry_balance(){
        $data = [
            "accountNumber" => "0115476117"
        ];
        $bni = new BNI;
        print_r($bni->inquiry_balance($data));
    }
    public function account_history(){
        $data = [
            "accountNumber" => "0115476117"
        ];
        $bni = new BNI;
        print_r($bni->account_history($data));
    }

    public function transfer(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryAccountNumber"=>"0115471119",
            "currency"=>"IDR",
            "amount"=>"11500",
            "remark"=>"Test P2PL"
        ];
        $bni = new BNI;
        print_r($bni->transfer($data));
    }

    public function payment_status(){
        $data = [
            "requestedUuid"=>"E8C6E0027F6E429F"
        ];
        $bni = new BNI;
        print_r($bni->payment_status($data));
    }

    public function payment_rtgs(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryAccountNumber"=>"3333333333",
            "beneficiaryAddress1"=>"Jakarta",
            "beneficiaryAddress2"=>"",
            "beneficiaryBankCode" => "CENAIDJA",
            "beneficiaryName" =>"Panji Samudra",
            "currency" => "IDR",
            "amount" => "150000000",
            "remark" => "Test rtgs",
            "chargingType" =>"OUR"
        ];
        $bni = new BNI;
        print_r($bni->payment_rtgs($data));
    }

    public function payment_clearing(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryAccountNumber" => "3333333333",
            "beneficiaryAddress1"=>"Jakarta",
            "beneficiaryAddress2"=>"",
            "beneficiaryBankCode"=>"140397",
            "beneficiaryName"=>"Panji Samudra",
            "currency"=>"IDR",
            "amount"=>"15000",
            "remark"=>"Test kliring",
            "chargingType"=>"OUR"
        ];
        $bni = new BNI;
        print_r($bni->payment_clearing($data));
    }

    public function inquiry_interbank(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryBankCode" => "014",
            "beneficiaryAccountNumber" => "3333333333"
        ];
        $bni = new BNI;
        print_r($bni->inquiry_interbank($data));
    }

    public function payment_interbank(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryAccountNumber"=>"3333333333",
            "beneficiaryAccountName"=>"KEN AROK",
            "beneficiaryBankCode"=>"014",
            "beneficiaryBankName"=>"BANK BCA",
            "amount"=>"15000"
        ];
        $bni = new BNI;
        print_r($bni->payment_interbank($data));
    }

        

        

    

}
