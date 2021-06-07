<?php

namespace App\Http\Controllers\Api;

use App\Helpers\DigiSign;
use App\Http\Controllers\Controller;
use App\UserEKYC;
use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use App\PrivyLogs;
use App\Helpers\PrivyID;

class UsersEKYCController extends Controller
{
    CONST SANDBOX_API_BASE_URL = 'https://api-sandbox.privy.id/v3/merchant';
    CONST PRODUCTION_API_BASE_URL = 'https://api-sandbox.privy.id/v3/merchant';

    CONST SANDBOX_API_BASE_URL_V1 = 'http://oauth.privydev.id';
    CONST PRODUCTION_API_BASE_URL_V1 = 'http://oauth.privy.id';

    public function index(Request $request){

        $ekyc = UserEKYC::create([
            'callback'=>$request->getContent(),
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
        ]);
        if($ekyc){
            $json = [
                "status"=> true,
                "message"=> 'Data berhasil ditambahkan.',
            ];
        }else{
            if($ekyc){
                $json = [
                    "status"=> false,
                    "message"=> 'Data Error',
                ];
            }
        }
        // $digisign = new DigiSign;
        // $digisign->callback_activation($request->getContent() , $request->msg);
        return response()->json($json);
    }

    public function callback_activation(Request $request){
        $digisign = new DigiSign;
        $digisign->callback_activation($request->msg);
    }

    public function uploadDocumentest(){
        $pathDocument = public_path() . '/upload/document/credit_aggreement/PendanaSatu_60a49a6f68b56.pdf';
        $send_to = [
            [
                'email_user' => 'blueisland2838@gmail.com',
                'name' => 'Lender Satu'
            ]
        ];
        $req_sign = [
            [
                'name' => 'Lender Satu',
                'email' => 'blueisland2838@gmail.com',
                'aksi_ttd' => 'ttd',
                'kuser' => null,
                'user' => 'ttd1',
                'page' => '3',
                'llx' => '12',
                'lly' => '13',
                'urx' => '34',
                'ury' => '45',
                'visible' => 1

            ]
        ];
        $digisign = new DigiSign;
        $endpoint = $digisign->upload_document($pathDocument , '12819280' ,true, 'Lender_Aggreement' ,false , $send_to, $req_sign , 128 , 'registration');

    }

    private function baseUrl()
    {
        return (config('privyid.is_production')) ? self::PRODUCTION_API_BASE_URL : self::SANDBOX_API_BASE_URL;
    }


    public function requestRegistration(){
        $ktp_file = fopen(public_path('/upload/lender/file/commissaris_selfie_0_51_1616943212.png'), 'r');
        $selfie_file = fopen(public_path('/upload/lender/file/commissaris_selfie_0_51_1616943212.png'), 'r');

        $data = [
            "email" => "kervin@yahoo.com",
            'phone' => '08213612332',
            'ktp' => $ktp_file,
            'selfie' =>   $selfie_file,
            'identity' =>json_encode([
                'nik' => '1234123412341234',
                'nama' => 'Richard Simbolon',
                'tanggalLahir' => '1990-08-28'
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
        print_r($client->body());
        //$response = json_decode($client->body());
        //$this->privylogs($client->body() , $uid);
    }
    public function privylogs($response , $uid){
        $data = json_decode($response , true);
        PrivyLogs::create([
            'uid' => $uid,
            'response' => $response,
            'status' => $data['message'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function ekyc22(Request $request){
        print_r($request->all());
    }

    public function ekyc2(Request $request){

        //$photo = fopen(public_path('upload/ktp_41_1616591801.jpeg'), 'r');
        $photo = fopen(public_path('/upload/lender/file/commissaris_selfie_0_51_1616943212.png'), 'r');
        //$photo = response()->download(public_path('upload/ktp_41_1616591801.jpeg'));
        $client = new Client();
        $data = [
            "email" => "ogan_my@yahoo.com",
            'phone' => '085275608369',
            'ktp' => $photo,
            'selfie' =>   $photo,
            'identity' =>json_encode([
                'nik' => '1234123412341234',
                'nama' => 'Richard Simbolon',
                'tanggalLahir' => '1990-08-28'
            ])
        ];

       //print_r($data);exit;

        $client->request('POST', 'https://api-sandbox.privy.id/v3/merchant/registration', [
            'headers' => [
                'Merchant-Key' => 'syjapxhkpm3rtwoxcqd9',
                'Content-type' => 'Multipart/form-data'
            ],
            'form_params' =>$data,
            'auth' => [
                'mnc_capio','vx6mfn4yci32cmt6ddyl'
            ],

        ]);
        exit;
        try {

                print_r($client);
            } catch (Exception $e) {
                //throw new Exception ($e->getMessage(), $e->getResponse()->getStatusCode());
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
        $owner = (config('privyid.is_production')) ? config('privyid.production.owner') : config('privyid.sandbox.owner');

        return [
            'privyId' => $owner,
            'enterpriseToken' => $this->getOwnerEnterpriseToken()
        ];
    }

    private function getOwnerEnterpriseToken() {
        return (config('privyid.is_production')) ? config('privyid.production.owner_enterprise_token') : config('privyid.sandbox.owner_enterprise_token');
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
