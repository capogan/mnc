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
    private $HOST = "8065";
    private $API_KEY = "3b2b44d6-3334-4b0d-bcd4-26b97d529900";
    private $API_KEY_SECRET = "1111e9e3-ca9b-4a96-b167-d1498b6e947e";
    

    private $CLIENT_ID = "168a4545-f1a0-4bda-a6b1-7dce0556ef31";
    private $CLIENT_SECRET = "a867d3ec-29e7-4e5c-9d40-4c21b55645db";
    
    private $COMPANY_ID = "SIAP";
    private $ACCESS_TOKEN = "";
    private $EXPIRES_AT;

    private $REGISTER = "/p2pl/register/investor";
    private $REGISTER_ACCOUNT = "/p2pl/register/investor/account";
    private $INQUIRY_ACCOUNT = "/p2pl/inquiry/account/info";
    private $INQUIRY_BALANCE = "/p2pl/inquiry/account/balance";
    private $INQUIRY_ACCOUNT_HISTORY = "/p2pl/inquiry/account/history";
    private $INQUIRY_INTER_BANK_ACCOUNT = "/p2pl/inquiry/interbank/account";
    private $PAYMENT_TRANSFER = "/p2pl/payment/transfer";
    private $PAYMENT_STATUS = "/p2pl/inquiry/payment/status";
    private $PAYMENT_CLEARING = "/p2pl/payment/clearing";
    private $PAYMENT_RTGS = "/p2pl/payment/rtgs";
    private $PAYMENT_INTERNET_BANK = "/p2pl/payment/interbank";



    
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
    private function login(){
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
    private function requestUUID(){
        $number = "";
        for($i = 0; $i < 4; $i++){
            $chr = rand(0,3);
            $str = "";
            for($j = 0; $j < 4; $j ++){
                if($j == $chr) {
                    $str .= chr(rand(65, 90));
                } else {
                    $str .= rand(0,9);
                }
            }
            $number .= (empty($number) ? $str : "".$str);
        }

        return $number;
    }
    private function buildBody($data , $status){
        $header = [
            'companyId' => $this->COMPANY_ID,
            "parentCompanyId" => "",
            "requestUuid" => $this->requestUUID()
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
    private function buildBodyPayload($data){
        $header = [
            'companyId' => $this->COMPANY_ID,
            "parentCompanyId" => "",
            "requestUuid" => '36LM90R09T5227M8'
        ];
        $data["header"] = $header;
        $request["request"] = $data;
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
            $this->API_KEY_SECRET,
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

    public function register_investor($uid)
    {
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'register')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        $data = [
            "cifNumber" => trim($u->cifnumber),
            "accountType" => "RDL",
            "currency" => "AUD",
            "openAccountReason" => "2",
            "sourceOfFund" => "1",
            "branchId" => trim($u->branchopening)
        ];
        
        $body = $this->buildBody($data , false);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->REGISTER_ACCOUNT . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        
        // print_r($response->body());
        // echo '<br>';
        // print_r(json_encode($body));

        $result = $this->process_registered_account_number($response->body() , $uid, $u->cifnumber);
        return $result;
    }
    // REGISTER INVESTORS
    public function request($data , $uid){
        $body = $this->buildBody($data , true);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->REGISTER . "?access_token=" . $this->ACCESS_TOKEN;
        
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        $result = $this->process_register_account($response->body() , $uid , $body['request']);
        echo '<br>';
        print_r(json_encode($body));
        return $result;

        
    }
    // JUST FOR TEST
    public function request_sit($data){
        $body = $this->buildBodyPayload($data , true);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->REGISTER . "?access_token=" . $this->ACCESS_TOKEN;
        //print_r(json_encode($body));exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
       print_r($response->body());
       
    }

    public function request_account_sit($data){
        
        $body = $this->buildBodyPayload($data , true);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->REGISTER_ACCOUNT . "?access_token=" . $this->ACCESS_TOKEN;
        print_r(json_encode($body));
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
       print_r($response->body());
       
       echo '<br>';
       
       print_r(json_encode($body));
       
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

    // REGISTER INVESTOR's ACCOUNT
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

    // INQUIRY REQUEST
    public function inquiry_account_info($uid){
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'active')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        $data = [
            "accountNumber" =>$u->account_number
        ];
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->INQUIRY_ACCOUNT . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // INQUIRY BALANCE
    public function inquiry_balance($uid){
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'active')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        $data = [
            "accountNumber" => '1000079187'
        ];

        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->INQUIRY_BALANCE . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    //ACCOUNT HISTORY
    public function account_history($uid){
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'active')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        $data = [
            "accountNumber" => $u->account_number
        ];
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->INQUIRY_ACCOUNT_HISTORY . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // TRANSFER 
    public function transfer($uid){
        $u  = LenderRDLAccountRegistered::where('uid' , $uid)->where('status' , 'active')->first();
        if(!$u){
            $this->response_registered('User tidak ditemukan' , $uid);
            return false;
        }
        
        $data = [
            "accountNumber" => $u->account_number,
            "beneficiaryAccountNumber"=> '0316029783',
            "currency"=>"IDR",
            "amount"=>"100000",
            "remark"=>"Test P2PL"
        ];

        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->PAYMENT_TRANSFER . "?access_token=" . $this->ACCESS_TOKEN;
        //print_r(json_encode($body)); exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // CHECK PAYMENT STATUS
    public function payment_status($data){
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->PAYMENT_STATUS . "?access_token=" . $this->ACCESS_TOKEN;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // PAYMENT USING CLEARING
    public function payment_clearing($data){
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->PAYMENT_CLEARING . "?access_token=" . $this->ACCESS_TOKEN;
         //print_r(json_encode($body)); exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // PAYMENT USING RTGS
    public function payment_rtgs($data){
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->PAYMENT_RTGS . "?access_token=" . $this->ACCESS_TOKEN;
        //print_r(json_encode($body)); exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
    // INQUIRY INTERBANK
    public function inquiry_interbank($data){
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->INQUIRY_INTER_BANK_ACCOUNT . "?access_token=" . $this->ACCESS_TOKEN;
        //print_r(json_encode($body)); exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }

    // PAYMENT USING INTERBANK
    public function payment_interbank($data){
        $body = $this->buildBodyPayload($data);
        if (time() >= strtotime($this->EXPIRES_AT)) {
            $this->login();
        }
        $url = $this->BASE_URL . ":" . $this->HOST . $this->PAYMENT_INTERNET_BANK . "?access_token=" . $this->ACCESS_TOKEN;
        //print_r(json_encode($body)); exit;
        $response = Http::withHeaders([
            'X-API-Key' => $this->API_KEY
        ])->post($url, $body);
        print_r($response->body());
        echo '<br>';
        print_r(json_encode($body));
    }
}
