<?php
namespace App\Http\Controllers\Api;

use App\Helpers\BNI;
use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LenderRDLAccountRegistered;
use App\User;

class BNITest  extends Controller
{
    public function register(Request $request){

        $u = User::with('individuinfo')->where('id' , $request->id)->first();
        $data = [
            "title" => $u->individuinfo->gender,
            "firstName" => "",
            "middleName" => "",
            "lastName" =>$u->individuinfo->full_name,
            "optNPWP" => "1",
            "NPWPNum" => $u->individuinfo->no_npwp,
            "nationality" => "ID",
            "domicileCountry" => "ID",
            "religion" => $u->individuinfo->religion,
            "birthPlace" => $u->individuinfo->pob,
            "birthDate" => $u->individuinfo->dob,
            "gender" => $u->individuinfo->gender,
            "isMarried" => $u->individuinfo->married_status,
            "motherMaidenName" => $u->individuinfo->mother_name,
            "jobCode" => "99",
            "education" => $u->individuinfo->education,
            "idNumber" => $u->individuinfo->identity_number,
            "idIssuingCity" => $u->individuinfo->cities->name,
            "idExpiryDate" => "26102099",
            "addressStreet" => $u->individuinfo->full_address,
            "addressRtRwPerum" => $u->individuinfo->rt.$u->individuinfo->rw.$u->individuinfo->perum,
            "addressKel" => $u->individuinfo->districts->name,
            "addressKec" => $u->individuinfo->villagess->name,
            "zipCode" => $u->individuinfo->kodepos,
            "homePhone1" => "",
            "homePhone2" => "",
            "officePhone1" => "",
            "officePhone2" => "",
            "mobilePhone1" => $u->phone_number_verified,
            "mobilePhone2" => $u->phone_number_verified,
            "faxNum1" => "",
            "faxNum2" => "",
            "email" => $u->email,
            "monthlyIncome" => "8000000",
            "branchOpening" => "0259"
        ];
        $bni = new BNI;
        $result = $bni->request($data , $request->id);
       
    }
    public function register_account(Request $request){
        $bni = new BNI;
        $bni->register_investor($request->id);
    }
    public function inquiry_account_info(Request $request){
        $bni = new BNI;
        $bni->inquiry_account_info($request->id);
    }
    public function inquiry_balance(Request $request){
        
        $bni = new BNI;
        $bni->inquiry_balance($request->id);
    }
    public function account_history(Request $request){
        
        $bni = new BNI;
        $bni->account_history($request->id);
    }

    public function transfer(Request $request){
        
        $bni = new BNI;
        $bni->transfer($request->id);
    }

    public function payment_status(){
        $data = [
            "requestedUuid"=>"0U98374FN5232W98"
        ];
        $bni = new BNI;
        $bni->payment_status($data);
    }

    public function payment_rtgs(){
        // $data = [
        //     "accountNumber" => "0116724773",
        //     "beneficiaryAccountNumber"=>"987654321",
        //     "beneficiaryAddress1"=>"Jakarta",
        //     "beneficiaryAddress2"=>"",
        //     "beneficiaryBankCode" => "BRINIDJA",
        //     "beneficiaryName" =>"Panji Samudra",
        //     "currency" => "IDR",
        //     "amount" => "500000",
        //     "remark" => "Test rtgs",
        //     "chargingType" =>"BEN"
        // ];
        $data = [
            "accountNumber" => "0226356869",
            "beneficiaryAccountNumber"=>"987654321",
            "beneficiaryBankCode" => "BRINIDJA",
            "beneficiaryAddress1"=>"Jakarta",
            "beneficiaryAddress2"=>"",
            "beneficiaryName" =>"Panji Samudra",
            "currency" => "IDR",
            "amount" => "110000000",
            "remark" => "Test rtgs",
            "chargingType" =>"BEN"
        ];
        $bni = new BNI;
        $bni->payment_rtgs($data);
    }

    public function payment_clearing(){
        $data = [
            "accountNumber" => "0317246677",
            "beneficiaryAccountNumber" => "123456",
            "beneficiaryAddress1"=>"Jakarta",
            "beneficiaryAddress2"=>"",
            "beneficiaryBankCode"=>"20307",
            "beneficiaryName"=>"Panji Samudra",
            "currency"=>"IDR",
            "amount"=>"20000000",
            "remark"=>"Test kliring",
            "chargingType"=>"OUR"
        ];
        $bni = new BNI;
        $bni->payment_clearing($data);
    }

    public function inquiry_interbank(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryBankCode" => "002",
            "beneficiaryAccountNumber" => "00200000"
        ];
        $bni = new BNI;
        print_r($bni->inquiry_interbank($data));
    }

    public function payment_interbank(){
        $data = [
            "accountNumber" => "0115476117",
            "beneficiaryAccountNumber"=>"00200000",
            "beneficiaryAccountName"=>"Bpk HANS",
            "beneficiaryBankCode"=>"002",
            "beneficiaryBankName"=>"BANK BCA",
            "amount"=>"15000"
        ];
        $bni = new BNI;
        print_r($bni->payment_interbank($data));
    }

    public function login(){
        $bni = new BNI;
        //print_r($bni->login());
    }

}
