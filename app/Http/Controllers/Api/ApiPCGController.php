<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use function GuzzleHttp\json_encode;
use App\PCGUser;
use App\PersonalInfo;
use App\UsersFile;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Validator;

class ApiPCGController extends ApiController
{
    protected const FILE_FIELD_AUTO_REGISTER = [
        'file_identity_card'=>['identity_photo'],
        'file_self_image'=>['self_photo'],
        'file_npwp_image'=>['npwp_photo'],
        'file_business_image'=>['bussiness_build_photo'],
        'file_siup_image'=>['siup_photo'],
        'file_owner_image'=>['bussiness_owner_photo'],
        'file_business_document_image'=>['business_documents_photo'],
        'file_business_activity_image'=>['business_activity_photo'],
        'file_business_npwp'=>['npwp_bussiness_photo']
    ];
    protected const INFO_FIELD_AUTO_REGISTER = [
        'bio_identity_number'=>['identity_number'],
        'bio_firstname'=>['first_name'],
        'bio_lastname'=>['last_name'],
        'bio_gender'=>['gender'],
        'bio_pob'=>['place_of_birth'],
        'bio_dob'=>['date_of_birth'],
        'bio_address'=>['address'],
        'bio_province'=>['province','provinces'],
        'bio_city'=>['city','regencies'],
        'bio_zip_code'=>['zip_code'],
        'bio_last_education'=>['education','education'],
        'bio_npwp_number'=>['npwp_number'],
        'bio_total_credit_card'=>['total_cc'],
        'bio_bpjs_employew_number'=>['bpjs_employee_number'],
        'bio_bpjs_number'=>['bpjs_health_number'],
        'bio_phone'=>['phone_number'],
        'bio_whatsapp_number'=>['whatsapp_number'],
        'bio_marital_status'=>['married_status'],
        'bio_mother_name'=>['mother_name']
    ];

    protected const BASE_USER_INFO_FIELD_AUTO_REGISTER = [
        'bio_email'=>['email'],
        'bio_firstname'=>['name']
    ];

    public function auto_register(Request $request){
        //print_r($request->all()['data']);
        //exit;
        /*$base = ['data' =>[
            'bio_email'=>'richard@gmail.com',
            'bio_firstname'=>'Richard Simbolon',
            'bio_identity_number'=>'12390189038129038',
            'bio_firstname'=>'Richard Simbolon',
            'bio_lastname'=>'Simbolon',
            'bio_gender'=> "M",
            'bio_pob'=>"Pematang Siantar",
            'bio_dob'=>'1990-06-28',
            'bio_address'=>'Pematang Siantar No 96',
            'bio_province'=>'Sumatera Utara',
            'bio_city'=>'Pematang Siantar',
            'bio_zip_code'=>'201291',
            'bio_last_education'=>'SMA',
            'bio_npwp_number'=>'10983291891230',
            'bio_total_credit_card'=>'2',
            'bio_bpjs_employew_number'=>'89128398370098',
            'bio_bpjs_number'=>'8328812380130',
            'bio_phone'=>'081260123991',
            'bio_whatsapp_number'=>'081260123991',
            'bio_marital_status'=>'menikah',
            'bio_mother_name'=>'Mothers Name',
            'file_identity_card'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_self_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_npwp_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_business_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_siup_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_owner_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_business_document_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_business_activity_image'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg',
            'file_business_npwp'=>'https://i2.wp.com/help.tokotalk.com/wp-content/uploads/2020/08/identity_card_example.b686f703.jpg'
        ]];
        echo json_encode($base); exit();*/
        
        $data = [];
        if(array_key_exists('data' , $request->all())){
            $datas = $request->all()['data'] ? $request->all()['data'] : $data;
        }
        $base_data = [];
        $file_data = [];
        $bio_info = [];
        foreach(self::BASE_USER_INFO_FIELD_AUTO_REGISTER as $key=>$val){
            $base_data[$val[0]] = $this->proceed_data_response($key, $val , $datas);
        }

        foreach(self::FILE_FIELD_AUTO_REGISTER as $key=>$val){
            $file_data[$val[0]] = $this->proceed_data_response($key, $val , $datas);
        }
        
        foreach(self::INFO_FIELD_AUTO_REGISTER as $key=>$val){
            $bio_info[$val[0]] = $this->proceed_data_response($key, $val , $datas);
        }
        //print_r($bio_info); exit;
        
        $base_data['password'] = Hash::make('123123');
       
        $base_validation = Validator::make($base_data, [
            'email' => ['required','unique:users'],
            'name' => 'required'
        ]);

        if ($base_validation->fails()) {
            return $this->errorResponse($base_validation->errors(),500);
        }

        $uid = PCGUser::create($base_data);
        if($uid){
            $bio_info['uid'] = $uid->id;
            $file_data['uid'] = $uid->id;
            PersonalInfo::create($bio_info);
            UsersFile::create($file_data);
        }else{
            $this->errorResponse("Server Error", 500);
        }
        $response = [
            'message' => 'Data berhasil ditambahkan',
        ];
        return $this->successResponse($response);
    }
    protected function proceed_data_response($key ,$data, $datas){
       
        if(count($data) > 1){
            if($key == 'bio_last_education'){
                $data = DB::table($data[1])->select('id')->where('level' , $datas[$key])->first();
                $data = $data ? $data->id : null;
                
            }else{
                $data = DB::table($data[1])->select('id')->where('name' , $datas[$key])->first();
                $data = $data ? $data->id : null;
            }
            
            return $data ? $data : null;
        }else{
            return $datas[$key];
        }
    }
    protected function register_without_password($data){

    }


    public function get_data_from_invoice(Request $request){
        $data = json_decode($data , TRUE);
        /*$data = [
            'id' => '123123',
            'invoice_id' => 'PCG123XDER',
            'user_id' => '43522',
            'no_faktur' => 'NOXX1231OSWMW',
            'full_name' => 'Susilo Bambang Pamungkas',
            'id_number' => '1920199801289101', 
            'items' => [
                'product' => 'KIPAS ANGIN',
                'qty' => 10000,
                'price' => 20000,
            ]
        ];*/
       
    }
}
