<?php
namespace App\Http\Controllers\Api;

use App\Helpers\BNI;
use App\Helpers\DigiSign as HelpersDigiSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BNITest  extends Controller
{
    public function register(){
        $data = [
            "title" => "01",
            "firstName" => "Richard",
            "middleName" => "Juan",
            "lastName" => "Simbolon",
            "optNPWP" => "1",
            "NPWPNum" => "999999999988888",
            "nationality" => "ID",
            "domicileCountry" => "ID",
            "religion" => "2",
            "birthPlace" => "Semarang",
            "birthDate" => "26111980",
            "gender" => "M",
            "isMarried" => "L",
            "motherMaidenName" => "R Harianja",
            "jobCode" => "01",
            "education" => "07",
            "idNumber" => "331234766887878518",
            "idIssuingCity" => "Jakarta Barat",
            "idExpiryDate" => "26102099",
            "addressStreet" => "Jalan Mawar Melati",
            "addressRtRwPerum" => "003009Sentosa",
            "addressKel" => "Cengkareng Barat",
            "addressKec" => "Cengkareng/Jakarta Barat",
            "zipCode" => "11730",
            "homePhone1" => "021",
            "homePhone2" => "745454545",
            "officePhone1" => "",
            "officePhone2" => "",
            "mobilePhone1" => "0812",
            "mobilePhone2" => "323232",
            "faxNum1" => "",
            "faxNum2" => "",
            "email" => "richard@yahoo.com",
            "monthlyIncome" => "8000000",
            "branchOpening" => "0259"
        ];
        $bni = new BNI;
        print_r($bni->request_sit($data));
    }
    public function register_account(){
        $data = [
            "cifNumber" => "9100749959",
            "accountType" => "RDL",
            "currency" => "IDR",
            "openAccountReason" => "2",
            "sourceOfFund" => "1",
            "branchId" => "0259"
        ];
        $bni = new BNI;
        print_r($bni->request_account_sit($data));
    }
    public function inquiry_account_info(){
        $data = [
            "accountNumber" => "114476287"
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
            "accountNumber" => "0316031099",
            "beneficiaryBankCode" => "014",
            "beneficiaryAccountNumber" => "01400000"
        ];
        $bni = new BNI;
        print_r($bni->inquiry_interbank($data));
    }

    public function payment_interbank(){
        $data = [
            "accountNumber" => "0316031099",
            "beneficiaryAccountNumber"=>"01400000",
            "beneficiaryAccountName"=>"Bpk HANS",
            "beneficiaryBankCode"=>"014",
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
