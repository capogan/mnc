<?php
namespace App\Helpers;
use App\DigiInternalSignLogs;
use App\DigisignActivation;
use App\DigiSignDocument;
use App\DigiSignDocumentLogs;
use App\DigiSignDocumentSigners;
use App\DigiSignLogs;
use App\DigiSignSignersLogs;
use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LenderVerification;
use App\User;
class DigiSign {
    const DUMMY_RESPONSE = '{"JSONFile":{"data":{"name":true,"birthplace":true,"birthdate":true,"address":"T***N W***A A**I B**K 1"},"result":"00","notif":"Pendaftaran berhasil, silahkan check email untuk aktivasi akun anda."}}';
    const DUMMY_RESPONSE_ACTIVATION = '{"JSONFile":{"result":"00","link":"https:\/\/wv.tandatanganku.com\/activationpage.html?act=YYSQN6ewqCxlo8sTb2BOmDaeHdYyHvb5jYnQWeoBgvuMX6gKyNWLmd4zrrCyjJuavzJtVTV6yrGtRZqIrqlEz2fgap4%2FNGdTs4ro8eDF0zYrUNZ4%2F4MpGQeprV6SKxflXqf9tOOeoPOYhpH5ClG1aQ%3D%3D"}}';
    const ERROR_CODE = [
        '00' => 'Succsess' ,
        '05'=> 'Data not found' ,
        '07' => 'Customer not allowed for automatic signing' ,
        '08' => 'Redirect page not found',
        '12' => 'Authentication not valid',
        '14' => 'Email/NIK have registered',
        '28' => 'Data request incomplete',
        '30' => 'Format request is wrong',
        '55' => 'Token not valid',
        '61' => 'Insufficient balance',
        '06' => 'General error',
        '01' => 'Back / cancel',
        'A1' => 'Verfier id not found'
    ];
    public function lender_verification($uid){
        if(!$uid){
            return ;
        }
        $lender_verification = LenderVerification::where('uid' , $uid)->first();
        if(!$lender_verification){
            LenderVerification::create(
                [
                    'uid' => $uid,
                    'status' => 'waiting',
                    'business_verification' => false,
                    'director_verification'=> false,
                    'commissioner_verification'=> false,
                    'sign_agreement'=> false,
                    'document_verification' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
    public function checkrequestRegistration($uid){
        $u = User::with('borrower_file')
        ->with('borrower_personal_info')
        ->where('id' , $uid)->first();
        $this->requestRegistration(
            public_path().'/'.$u->borrower_file->identity_photo,
            public_path().'/'.$u->borrower_file->self_photo,
            public_path().'/'.$u->borrower_file->npwp_photo,
        $u->borrower_personal_info->address,
        $u->borrower_personal_info->gender,
        $u->borrower_personal_info->districts->name,
        $u->borrower_personal_info->villagess->name,
        $u->borrower_personal_info->zip_code,
        $u->borrower_personal_info->cities->name,
        $u->borrower_personal_info->first_name. ' ' .$u->borrower_personal_info->last_name,
        $u->phone_number_verified,
        $u->borrower_personal_info->date_of_birth,
        $u->borrower_personal_info->provinces->name,
        $u->borrower_personal_info->identity_number,
        $u->borrower_personal_info->place_of_birth,
        $u->email,
        $u->borrower_personal_info->npwp_number,
        true,
        $uid
        );
    }
    public function requestRegistration(
        $fotoktp,
        $fotodiri,
        $fotonpwp,
        $alamat,
        $jenis_kelamin,
        $kecamatan,
        $kelurahan,
        $kodepos,
        $kota,
        $nama,
        $tlp,
        $tgl_lahir,
        $provinci,
        $idktp,
        $tempat_lahir,
        $email,
        $npwp,
        $redirect,
        $uid
        )
    {
        $fotodiri = fopen('/'.$fotodiri, 'r');
        $fotoktp =  fopen('/'.$fotoktp, 'r');
        $data = [
                'fotoktp' => $fotoktp,
                'fotodiri' => $fotodiri,
                'fotonpwp' => null,
                'jsonfield' => json_encode([
                    'JSONFile' => [
                    'userid' => env('DIGISIGN_USER_ID'),
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin == 'male' ? 'Laki-laki' : 'Perempuan',
                    'kecamatan' => $kecamatan,
                    'kelurahan' => $kelurahan,
                    'kode-pos' => $kodepos,
                    'kota' => $kota,
                    'nama' => $nama,
                    'tlp' => $tlp,
                    'tgl_lahir' => $tgl_lahir,
                    'provinci' => $provinci,
                    'idktp' => $idktp,
                    'tmp_lahir' => $tempat_lahir,
                    'email' => $email,
                    'npwp' => $npwp,
                    'redirect' => $redirect
                ]
            ])
        ];
       
        $client = Http::withHeaders([
            'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->asMultipart()
        ->post('https://api.tandatanganku.com/REG-MITRA.html', $data);
        $this->processResponseRegistration($client->body() , $uid , 'registration' , $email , $idktp , $tlp , $nama);
    }
    public function processResponseRegistration($body , $uid , $event , $email , $idktp , $tlp , $nama){

        $this->logs($body , $uid , $event);
        if(!Utils::tryJson($body)){
            return;
        }
        $response = json_decode($body , true);
        if(!array_key_exists('result' , $response['JSONFile'])){
            return ;
        }
        switch($response['JSONFile']['result']){
            case '00' :
                // update status of lender
                $this->verified_lender('register' , false , $uid , $email);
                $this->lender_verification($uid);
                $this->activate_account('waiting activate' , $email , $uid, $idktp,  $response , $tlp, $nama);
                break;
            case '55' :
                // SEND email to admin to check the token
                break;
            default :
            // $this->logs($body , $uid , 'registration');
        }
    }
    public function activation_account($email , $uid , $nik){
        $data = [
            'jsonfield' => json_encode([
                'JSONFile' => [
                    'userid' => env('DIGISIGN_USER_ID'),
                    'email_user' => $email
                ]
            ])
        ];
        $client = Http::withHeaders([
            'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->asMultipart()
        ->post('https://api.tandatanganku.com/gen/genACTPage.html', $data);
        //print_r($client->body()); exit;
        $this->processResponseActivation($client->body(), $uid ,$email,$nik,'activation');

    }
    public function processResponseActivation($body , $uid , $email , $nik, $event){
        $this->logs($body , $uid , $event);
        $response = json_decode($body , true);
        if(!array_key_exists('result' , $response['JSONFile'])){
            return ;
        }
        switch($response['JSONFile']['result']){
            case '00' :
                // update status of lender
                //$this->activate_account('waiting activate' , $email , $uid, $nik,  $response['JSONFile']['link']);
                break;
            case '55' :
                // SEND email to admin to check the token
                break;
            default :
                return;
            // $this->logs($body , $uid , 'registration');
        }
    }
    public function activate_account($status , $email, $uid, $nik, $body , $phone = null , $nama){
        $data  =  [
            'status_activation' => $status,
            'uid' => $uid,
            'email' => $email,
            'nik' => $nik,
            'full_name' => $nama,
            'created_at' => date('Y-m-d'),
            'phone_number' => $phone
        ];
        if(count($body) > 0){
            if(array_key_exists('info' , $body['JSONFile'])){
                $data['link_activation'] = $body['JSONFile']['info'];
            }
            if(array_key_exists('expired_aktifasi' , $body['JSONFile'])){
                $data['activation_expired'] = date('Y-m-d , H:i:s' , strtotime($body['JSONFile']['expired_aktifasi']));
            }
            if(array_key_exists('kode_user' , $body['JSONFile'])){
                $data['user_code'] = $body['JSONFile']['kode_user'];
            }
        }
        $res_act = DigisignActivation::updateOrcreate(
            [
              'uid' => $uid,
              'email' => $email,
              'nik' => $nik
            ],$data
            );
        if(!$res_act){
            return false;
        }

        return true;
    }
    public function verified_lender($status , $agreement , $uid){
        $user_type = User::select('group')->where('id' , $uid)->first();
        if(!$user_type){
            return ;
        }
        if($user_type->group == 'lender'){
            $lender = LenderVerification::where('uid' ,$uid)->first();
            if($lender){
                $lender->status = $status;
                $lender->updated_at = date('Y-m-d H:i:s');
                $lender->sign_agreement = $agreement;
                $lender->save();
            }
        }
    }
    public function logs($response , $uid=null , $event=''){
        $data = json_decode($response , true);
        if(is_object($data) == true){
            if(array_key_exists('JSONFile' , $data)){
                if(array_key_exists('data' , $data['JSONFile']) && count($data['JSONFile']['data']) > 0){
                    $msg = '';
                    foreach($data['JSONFile']['data'] as $k=>$v){
                        $msg .= $k.'->';
                        $msg .= $v ? 'true' : 'false';
                        $msg .= ';';
                    }
                    $logs['message'] =  $msg;
                }
                if(array_key_exists('notif' , $data['JSONFile'])){
                    $logs['notif'] = $data['JSONFile']['notif'];
                }
                if(array_key_exists('info' , $data['JSONFile'])){
                    $logs['info'] = $data['JSONFile']['info'];
                }
            }else{
                if(array_key_exists('information' , $data)){
                    $logs['info'] = $data['information'];
                    $logs['notif'] = 'Connection timeout';
                }

                if(array_key_exists('notif' , $data)){
                    $logs['notif'] = $data['notif'];
                }
            }
        }
        $logs['uid'] = $uid;
        $logs['response'] = $response;
        $logs['created_at'] = date('Y-m-d H:i:s');
        $logs['event'] = $event;
        DigiSignLogs::create($logs);
    }
    public function logs_internal($res='' , $msg=''){
        DigiInternalSignLogs::create(
            [
                'message' => $msg ,
                'response' => $res ,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }
    public function callback_activation($msg){
        if(!isset($msg)){
            $this->logs_internal('' , 'Digisign call callback url without encript message.');
            return;
        }
        $data = $this->aes_128_ecb_decrypt($msg);
        $acc = json_decode($data , true);
        if($acc['result'] == '00'){
            $u_acc = DigisignActivation::where('email' , $acc['email_user'])->first();
            if(!$u_acc){
                $this->logs_internal($data , 'User with criteria not found after received callback from Digisign.');
            }
            $u_acc->status_activation = 'active';
            $u_acc->updated_at = date('Y-m-d H:i:s');
            $u_acc->activation_date = date('Y-m-d H:i:s');
            if($u_acc->save()){
                $this->logs($data,$u_acc->uid , 'activation');
                $this->verified_lender('register' , false , $u_acc->uid);
            }else{
                $this->logs_internal($acc , 'User with this criteria can/\'t. updated.');
            }
        }
    }
    public function aes_128_ecb_decrypt($msg){
        //$msg2='lyCQTnTnUio4pMyP4wB1PAzvNXHF6Dpd1I2dVVJWOsMylzR099wacLjoa%2ByHglI4FZtHUwSsQXEh%0AyDLuPArgMDJ%2FOlhjI8ghho1di9gxDAL%2FTl4Np8IxTZASE71nYafV';
        $encrypted = $msg; //urldecode($msg);
        return openssl_decrypt(base64_decode($encrypted), 'aes-128-ecb', 'Qd6iiPGAAYnqOfqo', OPENSSL_RAW_DATA);
    }

    public static function update_data($newemail , $email , $newphone, $phone , $uid){
        $data = [
            'userid' => env('DIGISIGN_USER_ID'),
            'email_lama' => $email,
            'email_baru' => $newemail,
            'nohp_lama' => $phone,
            'nohp_baru' => $newphone
        ];
        // $client = Http::withHeaders([
        //     'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
        //     'Accept' => '*/*',
        //     'Connection' => 'keep-alive'
        // ])
        // ->asMultipart()
        // ->post('https://api-sandbox.privy.id/v3/merchant/registration', $data);
        //$response = $client->body();

        $response = '{"JSONFile":{"result":"00","notif":"Sukses update data"}}';
        $this->logs($response,$uid,'update data');
    }
    public function upload_document($file, $document_id , $redirect, $brach, $sequence_option,$send_to , $req_sign,$uid ,$step){
        $data = [
                'file' => fopen($file,'rb'),
                'jsonfield' => json_encode([
                    'JSONFile' =>
                        [
                            'userid' => env('DIGISIGN_USER_ID'),
                            'document_id' => $document_id,
                            'redirect' => $redirect,
                            'branch' => $brach,
                            'sequence_option' => $sequence_option,
                            'send-to' => $send_to,
                            'req-sign' => $req_sign,
                        ]
                    ])
                ];
        $client = Http::withHeaders([
            'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->timeout(9000)
        ->asMultipart()
        ->post('https://api.tandatanganku.com/SendDocMitraAT.html', $data);
        //print_r($client->body()); exit;
        //$response = '{"JSONFile":{ "result":"00", "notif":"upload data sukses."}}';
        $document = $this->process_upload_file_response( $client->body() , $data , $uid , $step);
        return $document;
        // if($document){
        //     $this->do_sign_the_document($document_id);
        // }
    }
    public function process_upload_file_response($response , $data , $uid ,$step){
        $res = json_decode($response , true);
        if(array_key_exists('JSONFile' , $res)){
            if(array_key_exists('result' , $res['JSONFile'])){
                if($res['JSONFile']['result'] == '00'){
                    if(!$this->process_document($data , $uid , $step)){
                        return false;
                    }
                }else{
                    $this->upload_data_logs($res , $data , $uid);
                    return false;
                }
            }
        }else{
            $this->upload_data_logs($res , $data , $uid);
        }
       
        return true;
    }
    public function upload_data_logs($res , $data , $uid){
        DigiSignDocumentLogs::create(
            [
                'uid' => $uid,
                'message' => $res['JSONFile']['notif'],
                'response' => json_encode($res),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }
    public function process_document($data , $uid , $step){
        $JSonfield = json_decode($data['jsonfield'] , true);
        $document = DigiSignDocument::create(
            [
                'document_id' => $JSonfield['JSONFile']['document_id'],
                'uid' => $uid,
                'branch' => $JSonfield['JSONFile']['branch'],
                'redirect' => $JSonfield['JSONFile']['redirect'],
                'send_to' => json_encode($JSonfield['JSONFile']['send-to']),
                'req_sign' => json_encode($JSonfield['JSONFile']['req-sign']),
                'status_document' => 'waiting',
                'user_id' => env('DIGISIGN_USER_ID'),
                'sequence_option' => $JSonfield['JSONFile']['sequence_option'],
                'created_at' => date('Y-m-d H:i:s'),
                'step' => $step
            ]
        );
        if($document){
            $signers = [];
            foreach($JSonfield['JSONFile']['req-sign'] as $v){
                $v['document_id'] = $JSonfield['JSONFile']['document_id'];   
                $v['email'] = $v['email'];
                //unset($v['email']);
                $signers[] = $v;               
            }
            DigiSignDocumentSigners::insert($signers);
            return true;
        }

        return false;
    }
    public function do_sign_the_document($document_id){
        $email = DigisignActivation::where('uid' , Auth::id())->first();
        if(!$email){
            return ['status' => 'error' , 'document tidak ditemukan.'];
        }
        $data = [
            'jsonfield' => json_encode([
                'JSONFile' => [
                    'userid' => env('DIGISIGN_USER_ID'),
                    'document_id' => $document_id,
                    'email_user' => $email->email,
                    'view_only' => false
                ]
            ])
        ];
        $client = Http::withHeaders([
            'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
            'Accept' => '*/*',
            'Connection' => 'keep-alive'
        ])
        ->asMultipart()
        ->post('https://api.tandatanganku.com/gen/genSignPage.html', $data);
        $response = $client->body();
        $link = $this->response_call_document_to_assign($response);
        return $link;
    }

    public function response_call_document_to_assign($response){
        $res= json_decode($response , true);
        if(array_key_exists('JSONFile' , $res)){
            if(array_key_exists('result' , $res['JSONFile'])){
                if($res['JSONFile']['result'] == '00'){
                    return $res['JSONFile']['link'];
                }
            }
        }
        return 'document/not-found';
    }

    public function sign_document_callback($msg){
        $response = $this->aes_128_ecb_decrypt($msg);
        //$response = '{"document_id":"2021-05-27_60af751516472_142","status_document":"complete","result":"00","email_user":"blueisland2838@gmail.com","notif":"Sukses"}';
        $prc = $this->process_signers_callback($response , []);
        if(!$prc){
            return false;
        }else{
            return true;
        }
    }

    public function process_signers_callback($response, $data){
        $res= json_decode($response , true);
        if(array_key_exists('result' , $res)){
            if($res['result'] == '00'){
                $document_signers = DigiSignDocumentSigners::leftJoin('digisign_document' ,'digisign_document.document_id' ,'=' , 'digisign_document_signers.document_id')
                                    ->where('digisign_document_signers.email' , $res['email_user'])
                                    ->where('digisign_document_signers.document_id' , $res['document_id'])
                                    ->where('digisign_document.status_document' , '!=' , 'complete')
                                    ->first();
                if(!$document_signers){
                    return $this->signers_logs($response, $res);
                }
                $doc_signer = DigiSignDocumentSigners::where('document_id' , $res['document_id'])->where('email' , $res['email_user'])->first();
                $doc_signer->status_sign = 'complete';
                $doc_signer->updated_at =  date('Y-m-d H:i:s');
                if(!$doc_signer->save()){
                    $this->signers_logs($response, $res);
                    return false;
                }
                if($res['status_document'] == 'complete'){
                    DigiSignDocument::where('document_id' , $res['document_id'])->update(
                        [
                            'status_document' => 'completed',
                            'updated_at' => date('Y-m-d H:i:s')
                        ]
                    );
                    $updt_status_user = DigisignActivation::where('email' , $res['email_user'])->first();
                    if($updt_status_user){
                        $updt_status_user->status_agreement_sign = true;
                        if(!$updt_status_user->save()){
                            return false;
                        }

                    }
                }
            }
        }
        $this->signers_logs($response, $res);
        return true;
    }
    public function signers_logs($res , $data){
        DigiSignSignersLogs::create(
            [
                'document_id' => $data['document_id'],
                'response' => $res,
                'email_user' => $data['email_user'],
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }
    public function download_file($data){
        $playload = [
            'jsonfield' => [
                'JSONFile' => [
                    'userid' => env(''),
                    'document_id' => $data['document_id']
                ]
            ]
        ];
        //echo json_encode($data);
        // $client = Http::withHeaders([
        //     'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
        //     'Accept' => '*/*',
        //     'Connection' => 'keep-alive'
        // ])
        // ->asMultipart()
        // ->post('https://api.tandatanganku.com/DWMITRA.html', json_encode($playload));
        // $response = $client->body();
        $response = '{"document_id":"2021-05-08_001","status_document":"complete","result":"00","email_user":"tangan2@gmail.com","notif":"Sukses"}';
        $this->process_signers_callback($response , $data);
    }
    public function download_file_base_64($data){
        $playload = [
            'jsonfield' => [
                'JSONFile' => [
                    'userid' => env(''),
                    'document_id' => $data['document_id']
                ]
            ]
        ];
        //echo json_encode($data);
        // $client = Http::withHeaders([
        //     'Authorization' => 'Bearer '.env('DIGISIGN_TOKEN'),
        //     'Accept' => '*/*',
        //     'Connection' => 'keep-alive'
        // ])
        // ->asMultipart()
        // ->post('https://api.tandatanganku.com/DWMITRA64.html', json_encode($playload));
        // $response = $client->body();
        $response = '{"document_id":"2021-05-08_001","status_document":"complete","result":"00","email_user":"tangan2@gmail.com","notif":"Sukses"}';
        $this->process_signers_callback($response , $data);
    }
}
