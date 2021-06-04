<?php

namespace App\Helpers;

use App\LenderRDLAccount;
use App\LenderRDLAccountLogs;
use App\LenderRDLAccountRegistered;
use App\LenderRDLAccountRegisteredLogs;
use Illuminate\Support\Facades\Http;

class BNI
{

    private $BASE_URL = "https://apidev.bni.co.id";
    private $HOST = "8067";
    private $API_KEY = "7dcadd68-6bbb-462e-a28e-f06c9bd7c231";
    private $CLIENT_ID = "f94a5de7-243c-424a-bd46-42fcdd095621";
    private $CLIENT_SECRET = "aa5596e4-5782-4329-b69d-38eacd1a05ba";
    private $COMPANY_ID = "SIAPDANAIN";
    private $ACCESS_TOKEN = "";
    private $EXPIRES_AT;

    public function request($endpoint, $data , $uid)
    {
        $body = $this->buildBody($data , true);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $endpoint . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        $result = $this->process_register_account($response->body() , $uid , $body['request']);
        return $result;
    }
    

    private function process_register_account($body , $uid , $data){
        $this->request_log($body , $uid);
        if(!Utils::tryJson($body)){
            return;
        }
        $response = json_decode($body , true);
        if(!array_key_exists('response' , $response)){
            return false;
        }
        if(!array_key_exists('responseCode' , $response['response'])){
            return false;
        }
        if($response['response']['responseCode'] == '0001'){
            unset($data['header']);
            $data['created_at'] = date('Y-m-d H:i:s');
            LenderRDLAccount::updateorcreate(
                [
                    'uid' => $uid
                ],$this->lowercasekeydata($data)
            );
            LenderRDLAccountRegistered::create(
                [
                    'uid'=> $uid,
                    'responseuuid' => $response['response']['responseUuid'],
                    'created_at' => date('Y-m-d'),
                    'journalnum' => $response['response']['journalNum'],
                    'cifnumber' => $response['response']['cifNumber'],
                    'mobilephone' => $response['response']['mobilePhone'],
                    'status' => 'register',
                    'branchopening' => $response['response']['branchOpening'],
                    'idnumber' => $response['response']['idNumber'],
                    'customername' => $response['response']['customerName'],
                ]
            );
        }else{
            return false;
        }

        return true;
    }
    public function lowercasekeydata($data){
        $result =[];
        foreach($data as $k=>$v){
            $result[strtolower($k)] = $data[$k];
        }
        return $result;
    }

    private function request_log($response, $uid){
        LenderRDLAccountLogs::create([
            'response' => $response,
            'uid' => $uid,
            'created_at' => date('Y-m-d H:i:s')
        ]);

    }

    private function login()
    {
        $url = "/api/oauth/token";
        $response = Http::asForm()->withHeaders([
            'Authorization' => "Basic " . base64_encode($this->CLIENT_ID . ':' . $this->CLIENT_SECRET)
        ])->post($this->BASE_URL . ":" . $this->HOST . $url, [
            'grant_type' => 'client_credentials',
        ]);
        $res = json_decode($response->body(), true);
        $this->ACCESS_TOKEN = $res['access_token'];
        $expiresIn = $res['expires_in'];
        $this->EXPIRES_AT =  date("Y-m-d H:i:s", strtotime("+$expiresIn seconds"));
    }

    private function buildBody($data , $status)
    {
        $header = [
            'companyId' => $this->COMPANY_ID,
            "parentCompanyId" => "",
            "requestUuid" => "29FCB72E71D34C48"
        ];

        $data["header"] = $header;
        if($status){
            $request["request"] = $this->data_validation($data);
        }else{
            $request["request"] = $data;
        }
        

        if ($this->HOST == "8067") {
            $signature = $this->generateSignatureSandbox($request);
        } else {
            $signature = $this->generateSignature($request);
        }


        $request["request"]["header"]["signature"] = $signature;
        return $request;
    }

    private function data_validation($data){
        $data['title'] = $this->title_validation($data['title']);
        $data['NPWPNum'] = str_replace('-','' , preg_replace('/[^A-Za-z0-9\-]/', '', $data['NPWPNum']));
        $data['gender'] = $this->gender_validation($data['gender']);
        $data['religion'] = $this->religion_validation($data['religion']);
        $data['birthDate'] = $this->bod_validation($data['birthDate']);
        $data['isMarried'] = $this->marital_validation($data['isMarried'] , $data['title']);
        $data['education'] = $this->education_validation($data['education']);
        $data['mobilePhone1'] = $this->mobile_validation($data['mobilePhone1'] , '1');
        $data['mobilePhone2'] = $this->mobile_validation($data['mobilePhone2'] , '2');
        return $data;
    }
    private function mobile_validation($str1, $str2){
        $str1 = trim($str1);
        $str2 = trim($str2);
        if($str2 == '1'){
            return substr($str1, 0 ,4);
        }else{
            return substr($str1, 4);
        }
    }
    private function gender_validation($str){
        $str = trim($str);
        if($str == 'male'){
            return 'M';
        }elseif($str == 'female'){
            return 'F';
        }else{
            return 'F';
        }
    }
    private function title_validation($str){
        $str = trim($str);
        if($str == 'male'){
            return '01';
        }elseif($str == 'female'){
            return '02';
        }else{
            return '99';
        }
    }
    private function religion_validation($str){
        $str = trim($str);
        if($str == null || $str == ''){
            return '7';
        }
        return $str;
    }
    private function bod_validation($str){
        $str = trim($str);
        return date('dmY' , strtotime($str));

    }
    private function marital_validation($str1 , $str2){
        $str1 = trim($str1);
        $str2 = trim($str2);
        if($str1== '5'){
            return 'M';
        }elseif($str1== '4'){
            return 'L';
        }elseif($str1 == '6'){
            if($str2 == 'male'){
                return 'D';
            }elseif($str2 == 'female'){
                return 'J';
            }else{
                return 'L';
            }
        }
    }
    private function education_validation($str){
        $str = trim($str);
        if($str == '1' || $str == '2'){
            return '01';
        }elseif($str == '3'){
            return '02';
        }elseif($str == '4'){
            return '03';
        }elseif($str == '5' || $str == '7' || $str == '6' ||$str == '8'){
            return '04';
        }elseif($str == '9'){
            return '05';
        }elseif($str == '10'){
            return '06';
        }elseif($str == '11'){
            return '07';
        }else{
            return '01';
        }
    }


    private function generateSignatureSandbox($data)
    {
        $url = "/api/jwtCreator";
        $body = [
            "header" => [
                "alg" => "HS256",
                "typ" => "JWT"
            ],
            "body" => $data,
            "x-api-key" => $this->API_KEY
        ];
        $response = Http::post($this->BASE_URL . ":" . $this->HOST . $url, $body);

        $res = json_decode($response->body(), true);

        return $res['signature'];
    }

    private function generateSignature($data)
    {
        // Create token header as a JSON string
        $header = JSON_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]);
        // Create token payload as a JSON string
        $payload = JSON_encode($data);
        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($header)
        );
        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($payload)
        );
        // Create Signature Hash
        $signature = hash_hmac(
            'sha256',
            $base64UrlHeader . "." . $base64UrlPayload,
            $this->API_KEY,
            true
        );
        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($signature)
        );
        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        return $jwt;
    }

    public function register_investor($endpoint, $uid)
    {
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'register')->where('responseuuid' ,'29FCB72E71D34C48')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        $data = [
            "cifNumber" =>$u->cifnumber,
            "accountType"=> "RDL",
            "currency"=> "IDR",
            "openAccountReason"=> "2",
            "sourceOfFund"=> "1",
            "branchId"=> "0259"
        ]; 
        $body = $this->buildBody($data , false);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $endpoint . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        $result = $this->process_registered_account_number($response->body() , $uid, $u->cifnumber);
        return $result;
    }

    private function process_registered_account_number($body , $uid ,$cifNumber){
        $this->response_registered($body , $uid);
        if(!Utils::tryJson($body)){
            return false;
        }
        $response = json_decode($body , true);
        if(!array_key_exists('response' , $response)){
            return false;
        }
        if(!array_key_exists('responseCode' , $response['response'])){
            return false;
        }
        if($response['response']['responseCode'] == '0001'){
            $u = LenderRDLAccountRegistered::where('uid' , $uid)->where('cifnumber', $cifNumber)->first();
            $u->updated_at = date('Y-m-d H:i:s');
            $u->account_number = $response['response']['accountNumber'];
            $u->status = 'active';
            if(!$u->save()){
                return false;
            }
        }else{
            return false;
        }

        return true;
    }

    private function response_registered($body , $uid){
        LenderRDLAccountRegisteredLogs::create(
            [
                'response' => $body,
                'uid' => $uid,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }

}