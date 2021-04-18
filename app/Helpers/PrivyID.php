<?php
namespace App\Helpers;

use App\UserEKYC;
use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\PrivyLogs;
use App\PrivyID as ModelPriviID;
use Illuminate\Support\Facades\Auth;
use App\PrivyIDDocument;
use App\PrivyIDDocumentRecipients;

class PrivyID {
    protected $this;
    CONST SANDBOX_API_BASE_URL = 'https://api-sandbox.privy.id/v3/merchant';
    CONST PRODUCTION_API_BASE_URL = 'https://api-sandbox.privy.id/v3/merchant';
    CONST SANDBOX_API_BASE_URL_V1 = 'http://oauth.privydev.id';
    CONST PRODUCTION_API_BASE_URL_V1 = 'http://oauth.privy.id';
    
    private function baseUrl()
    {
        return (config('privyid.is_production')) ? self::PRODUCTION_API_BASE_URL : self::SANDBOX_API_BASE_URL;
    }

    public function requestRegistrationStatus($token,$uid,$position, $event){
        $client = Http::withHeaders([
            'Merchant-Key' => $this->getMerchantKey(),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->withBasicAuth('mnc_capio','vx6mfn4yci32cmt6ddyl')
        ->asMultipart()
        ->post('https://api-sandbox.privy.id/v3/merchant/registration/status', ['token' => $token]);
        $this->processResponseRegisterStatus($client->body(), $uid,$position, $event);
    }
    public function privyIDCallback($response = null){
        $res= json_decode($response , true);
        switch($res['eventName']){
            case 'register' :
                ModelPriviID::where('user_token' , $res['data']['userToken'])
                ->update(
                    [
                        'privyId' => $res['data']['privyId'],
                        'status' => $res['data']['status'],
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            break;
            case 'document-signed' :
                $doc = PrivyIDDocument::where('token' , $res['data']['docToken'])->first();
                $doc->document_status = strtolower($res['data']['documentStatus']);
                $doc->document_response_json =  $res['data']['download'];
                $doc->status_recipients =json_encode($res['data']['recipients']);
                $doc->updated_at = date('Y-m-d H:i:s');
                $doc->save();
            break;
            default :    
            break;
        }
    }
    public function processResponseRegisterStatus($response , $uid ,$position, $event ){
        $resp = json_decode($response);
        if($resp['code'] == '201'){
            switch($resp['data']['status']){
                case 'invalid' :
                    ModelPriviID::where('user_token' , $resp['data']['userToken'])
                    ->update(
                        [
                            'status' => $resp['data']['status'],
                            'updated_at' => date('Y-m-d H:i:s')
                        ]
                    );
                break;
                case 'registered' :
                    ModelPriviID::where('user_token' , $resp['data']['userToken'])
                    ->update(
                        [
                            'status' => $resp['data']['status'],
                            'privyid' => $resp['data']['privyId'],
                            'updated_at' => date('Y-m-d H:i:s')
                        ]
                    );
                break;
                case 'verified' :
                    ModelPriviID::where('user_token' , $resp['data']['userToken'])
                    ->update(
                        [
                            'status' => $resp['data']['status'],
                            'privyid' => $resp['data']['privyId'],
                            'updated_at' => date('Y-m-d H:i:s')
                        ]
                    );
                break;
                case 'rejected' :
                    ModelPriviID::where('user_token' , $resp['data']['userToken'])
                    ->update(
                        [
                            'status' => $resp['data']['status'],
                            'updated_at' => date('Y-m-d H:i:s')
                        ]
                    );
                break;

                case 'waiting' :
                    
                break;
            }
        }
        $this->privylogs($response, $uid ,$position, $event);
    }
    public function requestRegistration($email, $phone, $selfie , $ktp , $nik,$name,$dob , $uid , $position){
        $selfie = fopen('/'.$selfie, 'r');
        $ktp =  fopen('/'.$ktp, 'r');
        $data = [
            "email" => $email,
            'phone' => $phone,
            'selfie' => $selfie,
            'ktp' => $ktp,
            'identity' => json_encode([
                'nik' => $nik,
                'nama' => $name,
                'tanggalLahir' => $dob
            ])
        ];
        $client = Http::withHeaders([
            'Merchant-Key' => $this->getMerchantKey(),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->withBasicAuth('mnc_capio','vx6mfn4yci32cmt6ddyl')
        ->asMultipart()
        ->post('https://api-sandbox.privy.id/v3/merchant/registration', $data);
        $this->processResponseRegister($client->body(), $uid , $position);
    }
    public function processResponseRegister($body , $uid , $position){
        $this->privylogs($body , $uid , $position , 'register');
       // $response = '{"eventName":"register","data":{"privyId":"DEVRI2838","email":"richard.simbolon28@gmail.com","phone":"+6281260332838","processedAt":"2021-04-16 14:32:52 +0700","userToken":"4dd169d8a23d152ecf8a98fe30a9adabc2801936cfb4464ad81bf58e52356783","status":"verified","identity":{"nama":"Ridcat Simbolon","nik":"9834982394802300","tanggalLahir":"1990-06-28","tempatLahir":"Sleman"}},"message":"Data Verified"}';
        $response = json_decode($body , true);
        if($response['code'] == '201'){
            ModelPriviID::updateOrCreate(
                [
                    'uid' => $uid
                ],
                [
                'uid' => $uid,
                'position' => $position,
                'code' => $response['code'],
                'status' => $response['data']['status'],
                'user_token' => $response['data']['userToken']
            ]
            );
        }
    }

    public function requestDocumentUpload($docTitle ,$docType , $recipients , $pathDocument , $function){
        $data = [
            'documentTitle' => $docTitle,
            'docType' => $docType,
            'owner' => $this->getOwner(),
            'recipients' => json_encode($recipients),
            'document' => fopen($pathDocument, 'r')
        ];
        $client = Http::withHeaders([
            'Merchant-Key' => $this->getMerchantKey(),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->withBasicAuth($this->getUsername(),$this->getPassword())
        ->asMultipart()
        ->post('https://api-sandbox.privy.id/v3/merchant/document/upload', $data);
        //$request = '{"code":201,"data":{"docToken":"3023bd03c543f8ac7902afda2a0fcdae705dfa78c5ee28d6fa1c67e29d3072c3","urlDocument":"https://sign-sandbox.privy.id/doc/3023bd03c543f8ac7902afda2a0fcdae705dfa78c5ee28d6fa1c67e29d3072c3","recipients":[{"privyId":"DEVRI2838","type":"Signer","enterpriseToken":null,"magicLink":null}]},"message":"Document successfully upload and shared"}';
        return $this->processResponseUploadDocument($client->body(),$docTitle,$docType ,'DEVRE3368', $pathDocument , json_encode($recipients) , $function);
    }
    public function processResponseUploadDocument($body,$docTitle,$docType ,$owner, $pathDocument , $recipients , $func){
        $this->privylogs($body);
        $response = json_decode($body , true);
        $redirect = '';
        if($response['code'] == '201'){
            $save_doc = PrivyIDDocument::create([
                'token' => $response['data']['docToken'],
                'url'=>$response['data']['urlDocument'],
                'recipients'=> json_encode($response['data']['recipients']),
                'title' => $docTitle,
                'type' => $docType,
                'owner' => $this->getOwnerEnterpriseToken(),
                'document_function' => $func
            ]);
            $redirect =  $response['data']['urlDocument'];
            $this->process_recipients_data($response['data']['recipients'], $save_doc->id);
        }
        PrivyLogs::create([
            'uid' => Auth::id(),
            'response' => $body,
            'position' => '',
            'event' => 'uploaddocument',
            'status' => '',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return $redirect;
    }
    public function privylogs($response , $uid=null , $position=null , $event=''){
        $data = json_decode($response , true);
        PrivyLogs::create([
            'uid' => $uid,
            'response' => $response,
            'position' => $position,
            'event' => $event,
            'status' => $data['message'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function process_recipients_data($data , $id){
        $datas = [];
        if(count($data) > 0){
            for($i=0; $i < count($data); $i++){
                $recipientsid = '';
                if(array_key_exists('email' , $data[$i])){
                    $recipientsid = $data[$i]['email'];
                }
                if(array_key_exists('privyId' , $data[$i])){
                    $recipientsid = $data[$i]['privyId'];
                }
                $datas[$i]['privyid'] = $recipientsid;
                if(array_key_exists('signatoryStatus' , $data[$i])){
                    $datas[$i]['status'] = $data[$i]['signatoryStatus'];
                }
                if(array_key_exists('type' , $data[$i])){
                    $datas[$i]['type'] = $data[$i]['type'];
                }
                if(array_key_exists('enterpriseToken' , $data[$i])){
                    $datas[$i]['enterprise_token'] = $data[$i]['enterpriseToken'];
                }
                if(array_key_exists('magicLink' , $data[$i])){
                    $datas[$i]['magic_link'] = $data[$i]['magicLink'];
                }
                $datas[$i]['document_id'] = $id;
            }
        }
        if(count($datas) > 0){
            PrivyIDDocumentRecipients::insert($datas);
        }
    }

    private function requestHeader()
    {
        return [
            'Merchant-Key' => $this->getMerchantKey(),
            //'Content-Type' => 'multipart/form-data',
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ];
    }

    private function requestHeaderV1()
    {
        return [
            'Merchant-Key' => $this->getMerchantKey(),
            'Content-Type' => 'multipart/form-data'
        ];
    }

    private function requestHeaderV1OAuth(string $token)
    {
        return [
            'Authorization' => 'Bearer '.$token,
            'Accept' => '*/*',
            'Cache-Control' => 'no-cache'
        ];
    }

    private function dataToMultipart($data) {
        $return = [];
        foreach ($data as $index => $content) {
            if (!is_array($content)) {
                array_push($return, [
                    'name' => $index,
                    'contents' => $content
                ]);
            } else {
                array_push($return, [
                    'name' => $index,
                    'filename' => $content['filename'],
                    'contents' => $content['content'],
                    //'headers'  => ['Content-Type' => $content['mime']]
                ]);
            }
        }

        return $return;
    }

    private function clientRequest($url, $type, $data = null, $files = [])
    {
        try {
            $options = [
                'headers' => $this->requestHeader(),
                'multipart' => $this->dataToMultipart($data),
                'auth' => ['mnc_capio_2','t6ca7oh7utkqzykbb7sj'],
            ];
            foreach($files as $filename => $content) {
                $options[$filename] = $content;
            }
            $client = new Client();
            $request = $client->request($type, $url, $options);
            $response = json_decode($request->getResponse()->getBody());
            return $response;
            
        } catch (Exception $e) {
            throw new Exception ($e->getResponse()->getStatusCode());
        }
    }

    private function clientRequestV1($url, $type, $data = null)
    {
        try {
            $client = new Client($this->requestHeaderV1());

            $options = [];
            switch(strtolower($type)) {
                case 'post' :
                    $options = [
                        'multipart' => $this->dataToMultipart($data)
                    ];
                    break;
                case 'get' :
                    $options = [
                        'data' => $data
                    ];
                    break;
            }

            $request = $client->request($type, $url, $options);

            $response = json_decode($request->getBody()->getContents(),true);
            return $response;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage(), $e->getResponse()->getStatusCode());
        }
    }

    private function clientRequestV1OAuth($url, $type, $data = null, string $token)
    {
        try {
            $client = new Client();

            $options = [
                'headers' => $this->requestHeaderV1OAuth($token)
            ];
            switch(strtolower($type)) {
                case 'post' :
                    $options['multipart'] = $this->dataToMultipart($data);
                    break;
                case 'get' :
                    $options['data'] = $data;
                    break;
            }

            $request = $client->request($type, $url, $options);

            $response = json_decode($request->getBody()->getContents(),true);
            return $response;
        } catch (Exception $e) {
            throw new Exception ($e->getMessage(), $e->getResponse()->getStatusCode());
        }
    }

    public function getOwner() {
        return json_encode([
            'privyId' => (config('privyid.is_production')) ? config('privyid.production.enterprise_owner') : config('privyid.sandbox.enterprise_owner'),
            'enterpriseToken' => $this->getOwnerEnterpriseToken()
        ]);
    }

    private function getOwnerEnterpriseToken() {
        return (config('privyid.is_production')) ? config('privyid.production.enterprise_owner_token') : config('privyid.sandbox.enterprise_owner_token');
    }

    public function getMerchantKey() {
        return (config('privyid.is_production')) ? config('privyid.production.merchant_key') : config('privyid.sandbox.merchant_key');
    }

    private function getUsername() {
        return (config('privyid.is_production')) ? config('privyid.production.username') : config('privyid.sandbox.username');
    }

    private function getPassword() {
        return (config('privyid.is_production')) ? config('privyid.production.password') : config('privyid.sandbox.password');
    }

    private function getClientID() {
        return config('privyid.client_id');
    }

    private function getSecretKey() {
        return config('privyid.secret_key');
    }

    public function getResponseStatus($response) {
        if (isset($response['status'])) {
            if ($response['status'] == 1)
                return true;
        }

        return false;
    }

    public function getOAuthLink() {
        $url = 'oauth/authorize';
        $endpoint = $this->baseUrlV1() . '/'. $url ;
        $data = [
            'client_id' => $this->getClientID(),
            'redirect_uri' => 'https://kolegakapital.com/callback/privyid', //url('callback/privyid')
            'scope' => 'read',
            'response_type' => 'code'
        ];

        $query_string = '';
        foreach ($data as $name => $value) {
            $query_string .= $name.'='.urlencode($value).'&';
        }
        $query_string = substr($query_string,0,strlen($query_string)-1);

        return $endpoint.'?'.$query_string;
    }

    public function getOAuthToken(string $code) {
        $url = 'oauth/token';
        $endpoint = $this->baseUrlV1() . '/'. $url ;
        $data = [
            'client_id' => $this->getClientID(),
            'client_secret' => $this->getSecretKey(),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => 'https://kolegakapital.com/callback/privyid' //url('callback/privyid')
        ];
        $response = $this->clientRequestV1($endpoint, 'POST', $data);

        return $response;
    }

    public function refreshToken(string $refresh_token) {
        $url = 'oauth/token';
        $endpoint = $this->baseUrlV1() . '/'. $url ;
        $data = [
            'client_id' => $this->getClientID(),
            'client_secret' => $this->getSecretKey(),
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        $response = $this->clientRequestV1($endpoint, 'POST', $data);

        return $response;
    }

    public function getUserIdentity(string $token) {
        $endpoint = $this->baseUrlV1() . '/api/v1/user/identity';
        $data = [

        ];

        $response = $this->clientRequestV1OAuth($endpoint, 'GET', $data, $token);

        return $response;
    }


    // public function requestRegistration(Request $request)
    // {
    //     $file =  fopen(public_path('upload/bebelac_front_banner.png'), 'r');
    //     $email = 'richard.simbolon28@gmail.com';
    //     $phone = '081260332838';
    //     $selfie = $file;
    //     $ktp = $file;
    //     $identity ='{"nik": "2341234121230419", "nama": "Ridcat", "tanggalLahir":"1989-11-01"}';
    //     $url = 'registration';
    //     $endpoint = $this->baseUrl() . '/'. $url ;
    //     $data = [
    //         'email' => $email,
    //         'phone' => $phone,
    //         'selfie' => $selfie,
    //         'ktp' => $ktp,
    //         'identity' => $identity,
    //     ];
    //     $response = $this->clientRequest($endpoint, 'POST', $data);
    //     return $response;
    // }


    /**
     * @param string $reference_no
     * @return array
     */
    public function getRegistationStatus($token)
    {
        $endpoint = $this->baseUrl() . '/registration/status';
        $data = [
            'token' => $token
        ];

        $response = $this->clientRequest($endpoint, 'POST', $data);

        return $response;
    }


    /**
     * @param $documentTitle String Example Title	Document title
     * @param $docType String Serial	Document workflow. Value : Serial, Parallel
     * @param $owner String {"privyId":"AB1234", "enterpriseToken": "41bc84b42c8543daf448d893c255be1dbdcc722e"}	Document owner. Contains privyId and enterpriseToken, enterpriseToken on example column can be used for Development Environment. Every merchant has their own enterpriseToken and use them in Production Environment.
     * @param $document string Exampledoc.pdf	Document with pdf format.
     * @param $recipients string [{"privyId":"TES001", "type":"Signer", "enterpriseToken": "companyToken"}, {"privyId":"TES002", "type":"Signer", "enterpriseToken": ""}]	Recipients list. Type can be : Signer, Reviewer. If the document type is Serial, the signing or reviewing process will be based on the order of recipients.
     * @return mixed
     * @throws Exception
     *
     */
    public function uploadDocument($documentTitle, $docType, $owner, $filepath, $recipients)
    {
        $endpoint = $this->baseUrl() . '/document/upload';
        $data = [
            'documentTitle' => $documentTitle,
            'docType' => $docType,
            'owner' => $owner,
            'recipients' => $recipients,
            /**
            'document' => [
                'filename' => basename($filepath),
                'content' => fopen($filepath,'rb'),
                'mime' => \File::mimeType($filepath)
            ]
             */
            'document' => fopen($filepath,'rb')
        ];

        $response = $this->clientRequest($endpoint, 'POST', $data);
        return $response;
    }


    /**
     * @param $token String Document token from Upload API
     * @return mixed
     * @throws Exception
     */
    public function getDocumentStatus($docToken)
    {
        $endpoint = $this->baseUrl() . '/document/status/'.$docToken;
        $data = [
            'token' => $docToken
        ];

        $response = $this->clientRequest($endpoint, 'GET', $data);

        return $response;
    }
}
