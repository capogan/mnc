<?php

namespace App\Http\Controllers;

use App\BusinessInfo;
use App\EmergencyContact;
use App\PersonalInfo;
use App\UsersFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use ValueFirst;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

   public function add_personal_info(Request $request){

       $validation = Validator::make($request->all(), [
           'identity_number' => 'required|numeric',
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required',
           'gender' => 'required',
           'pob' => 'required',
           'dob' => 'required',
           'address' => 'required',
           'province' => 'required',
           'city' => 'required',
           'zip_code' => 'required',
           'education' => 'required',
           'npwp_number' => 'required',
           'phone_number' => 'required',
           'whatsapp_number' => 'required',
           'married_status' => 'required',
           'mother_name' => 'required',
           'emergency_name' => 'required',
           'relationship_as' => 'required',
           'emergency_phone' => 'required',
           'emergency_full_address' => 'required',
           'dependents' => 'required',
       ],
           [
               'identity_number.required' => 'Nomor KTP harus diisi',
               'identity_number.numeric' => 'Nomor KTP harus berupa Angka',
               'first_name.required' => 'Nama depan harus diisi',
               'last_name.required' => 'Nama belakang harus diisi',
               'email.required' => 'email harus diisi',
               'gender.required' => 'Jenis Kelamin harus diisi',
               'pob.required' => 'Tempat lahir  harus diisi',
               'dob.required' => 'Tanggal lahir harus diisi',
               'address.required' => 'Alamat harus diisi',
               'province.required' => 'Propinsi harus diisi',
               'city.required' => 'Kota harus diisi',
               'zip_code.required' => 'Kode Pos harus diisi',
               'education.required' => 'Pendidikan terakhir harus diisi',
               'npwp_number.required' => 'Nomor NPWP harus diisi',
               'phone_number.required' => 'Nomor Telepon harus diisi',
               'whatsapp_number.required' => 'Nomor Whatsapp harus diisi',
               'married_status.required' => 'Status pernikahan harus diisi',
               'mother_name.required' => 'Nama ibu kandung harus diisi',
               'emergency_name.required' => 'Nama Saudara tidak serumah harus diisi',
               'relationship_as.required' => 'Pilih status hubungan',
               'emergency_phone.required' => 'Nomor telepon saudara tidak serumah harus diisi',
               'emergency_full_address.required' => 'Alamat saudara tidak serumah harus diisi',
               'emergency_zip_code.required' => 'Kodepos saudara tidak serumah harus diisi',
               'dependents.required' => 'Jumlah tanggungan harus diisi',

           ]);

       if($validation->fails()) {
           $json = [
               "status"=> false,
               "message"=> $validation->messages(),
           ];
       }else{

           DB::beginTransaction();
           try{
            PersonalInfo::updateOrCreate(['uid' => Auth::id()] , [
                'uid'                    => Auth::id(),
                'identity_number'        => $request->identity_number,
                'first_name'             => $request->first_name,
                'last_name'              => $request->last_name,
                'gender'                 => $request->gender,
                'place_of_birth'         => $request->pob,
                'date_of_birth'          => date("Y-m-d", strtotime($request->dob)),
                'address'                => $request->address,
                'province'               => $request->province,
                'city'                   => $request->city,
                'zip_code'               => $request->zip_code,
                'education'              => $request->education,
                'npwp_number'            => $request->npwp_number,
                'total_cc'               => $request->total_cc,
                'bpjs_employee_number'   => $request->bpjs_employee_number,
                'bpjs_health_number'     => $request->bpjs_employee_number,
                'phone_number'           => $request->phone_number,
                'whatsapp_number'        => $request->whatsapp_number,
                'married_status'         => $request->married_status,
                'mother_name'            => $request->mother_name,
                'number_of_dependents'   => $request->dependents,
                'created_at'             => date('Y-m-d H:i:s'),
                'updated_at'             =>date('Y-m-d H:i:s'),
            ] );
               EmergencyContact::updateOrCreate(['uid' => Auth::id()],[
                   'uid'                            => Auth::id(),
                   'emergency_name'                 => $request->emergency_name,
                   'id_siblings_master'             => $request->relationship_as,
                   'emergency_phone'                => $request->emergency_phone,
                   'emergency_full_address'         => $request->emergency_full_address,
                   'emergency_province'             => $request->emergency_province,
                   'emergency_city'                 => $request->emergency_city,
                   'emergency_sub_kecamatan'        => $request->emergency_sub_kecamatan,
                   'emergency_sub_kelurahan'        => $request->emergency_sub_kelurahan,
                   'emergency_zip_code'             => $request->emergency_zip_code,
                   'created_at'                     => date('Y-m-d H:i:s'),
                   'updated_at'                     => date('Y-m-d H:i:s'),
               ]);

               DB::commit();
           }
           catch (Exception $e) {
               DB::rollback();
           }


           $json = [
               "status"=> true,
               "message"=> 'Data Personal berhasil di tambahkan',
           ];
       }

       return response()->json($json);
   }

   public function upload_file(Request $request){
      /* $data_validate = [];
        if(isset($request->identity_image)){
            $data_validate['identity_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->self_image)){
            $data_validate['self_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->npwp_image)){
            $data_validate['npwp_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->business_location_image)){
            $data_validate['business_location_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->business_owner_file)){
            $data_validate['business_owner_file'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->business_document)){
            $data_validate['business_document'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->business_activity_image)){
            $data_validate['business_activity_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(isset($request->business_npwp)){
            $data_validate['business_npwp'] = 'image|mimes:jpeg,png,jpg,gif,svg';
        }
        if(count($data_validate) < 1){
            exit;
        }*/
        $uid = Auth::id();
        $validation = Validator::make($request->all(),
            [
                'identity_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'self_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'npwp_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'business_location_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'business_owner_file'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'business_document'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'business_activity_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'business_npwp'   => 'image|mimes:jpeg,png,jpg,gif,svg',
            ],
           [
               'identity_image.required' => 'Foto ktp wajib di unggah',
               'self_image.required' => 'Foto diri wajib di unggah',
               'npwp_image.required' => 'Foto npwp wajib di unggah',
               'business_owner_file.required' => 'Foto bukti kepemilikan usaha wajib di unggah',
               'business_location_image.required' => 'Foto lokasi usaha wajib di unggah',
               'business_document.required' => 'Foto dokumen usaha wajib di unggah',
               'business_activity_image.required' => 'Foto aktifitas usaha wajib di unggah',
               'identity_image.mimes' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'self_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'npwp_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'business_npwp.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'business_owner_file.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'business_location_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'business_document.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'business_activity_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
           ]
       );

       if($validation->fails()) {
           $json = [
               "status"=> false,
               "message"=> $validation->messages(),
           ];
       }else{
           $path =public_path().'/upload/';
           if($request->hasFile('identity_image')) {
               $identity_image= $request->file('identity_image');
               $filename_identity = 'ktp_'.$uid.'_'.time(). '.' . $identity_image->getClientOriginalExtension();
               $identity_image->move($path, $filename_identity);
           }

           if($request->hasFile('self_image')) {
               $self_image = $request->file('self_image');
               $filename_self_image = 'self_'.$uid.'_'.time(). '.' . $self_image->getClientOriginalExtension();
               $self_image->move($path, $filename_self_image);
           }
           if($request->hasFile('npwp_image')) {
               $npwp_image = $request->file('npwp_image');
               $filename_npwp_image = 'npwp_'.$uid.'_'.time(). '.' . $npwp_image->getClientOriginalExtension();
               $npwp_image->move($path, $filename_npwp_image);
           }

           if($request->hasFile('business_npwp')) {
            $npwp_imagebusiness_npwp = $request->file('business_npwp');
            $filename_npwp_imagebusiness_npwp = 'npwp_'.$uid.'_'.time(). '.' . $npwp_imagebusiness_npwp->getClientOriginalExtension();
            $npwp_imagebusiness_npwp->move($path, $filename_npwp_imagebusiness_npwp);
           }

           if($request->hasFile('business_location_image')) {
                $npwp_imagebusiness_location_image = $request->file('business_location_image');
                $filename_npwp_imagebusiness_location_image = 'business_location_image'.$uid.'_'.time(). '.' . $npwp_imagebusiness_location_image->getClientOriginalExtension();
                $npwp_imagebusiness_location_image->move($path, $filename_npwp_imagebusiness_location_image);
            }

            if($request->hasFile('business_owner_file')) {
                $npwp_imagebusiness_owner_file = $request->file('business_owner_file');
                $filename_npwp_imagebusiness_owner_file = 'business_owner_file'.$uid.'_'.time(). '.' . $npwp_imagebusiness_owner_file->getClientOriginalExtension();
                $npwp_imagebusiness_owner_file->move($path, $filename_npwp_imagebusiness_owner_file);
            }
            if($request->hasFile('business_activity_image')) {
                $npwp_imagebusiness_activity_image = $request->file('business_activity_image');
                $filename_npwp_imagebusiness_activity_image = 'business_activity_image'.$uid.'_'.time(). '.' . $npwp_imagebusiness_activity_image->getClientOriginalExtension();
                $npwp_imagebusiness_activity_image->move($path, $filename_npwp_imagebusiness_activity_image);
            }
            if($request->hasFile('business_document')) {
                $npwp_imagebusiness_document = $request->file('business_document');
                $filename_npwp_imagebusiness_document = 'business_document'.$uid.'_'.time(). '.' . $npwp_imagebusiness_document->getClientOriginalExtension();
                $npwp_imagebusiness_document->move($path, $filename_npwp_imagebusiness_document);
            }

            $get_user = UsersFile::where('uid',$uid)->first();
            $data_insert['uid'] = Auth::id();
            if(isset($request->identity_image)){
                $data_insert['identity_photo'] = 'upload/'.$filename_identity;
            }
            if(isset($request->self_image)){
                $data_insert['self_photo'] = 'upload/'.$filename_self_image;
            }
            if(isset($request->npwp_image)){
                $data_insert['npwp_photo'] = 'upload/'.$filename_self_image;
            }
            if(isset($request->business_location_image)){
                $data_insert['business_build_photo'] = 'upload/'.$filename_npwp_imagebusiness_location_image;
            }
            if(isset($request->business_owner_file)){
                $data_insert['business_owner_photo'] = 'upload/'.$filename_npwp_imagebusiness_owner_file;
            }
            if(isset($request->business_document)){
                $data_insert['siup_photo'] = 'upload/'.$filename_npwp_imagebusiness_document;
            }
            if(isset($request->business_activity_image)){
                $data_insert['business_activity_photo'] = 'upload/'.$filename_npwp_imagebusiness_activity_image;
            }
            if(isset($request->business_npwp)){
                $data_insert['npwp_business_photo'] = 'upload/'.$filename_npwp_imagebusiness_npwp;
            }
           if($get_user){
               DB::beginTransaction();
               try{
                   UsersFile::where([
                       ['uid',$uid],
                   ])->update($data_insert);
                   DB::commit();
               }
               catch (Exception $e) {
                   DB::rollback();
               }
           }else{
               DB::beginTransaction();
               try{
                   UsersFile::create($data_insert);
                   DB::commit();
               } catch (Exception $e) {
                   DB::rollback();
               }
           }
           $json = [
               "status"=> true,
               "message"=> 'Berkas berhasil di unggah',
           ];
       }
       return response()->json($json);
   }

    public function add_personal_business(Request $request){
        $validation = Validator::make($request->all(), [
            'name_of_bussiness' => 'required',
            'business_province' => 'required',
            'business_partner' => 'required',
            'business_category' => 'required',
            'business_established_since' => 'required',
            'address_of_business' => 'required',
            'province_business' => 'required',
            'city_business' => 'required',
            'postal_code_business' => 'required|numeric',
            'phone_number_business' => 'required|numeric',
            'business_kelurahan' => 'required',
            'business_kecamatan' => 'required',
            'business_location_status' =>'required',
            'legality_status' =>'required'
        ],
            [
                'name_of_bussiness.required' => 'Nama usaha harus diisi',
                'business_province.required' => 'Provinsi harus diisi',
                'business_partner.required' => 'Lama menjadi partner harus diisi',
                'business_category.required' => 'Bisnis harus diisi',
                'business_established_since.required' => 'Lama operasi harus diisi',
                'address_of_business.required' => 'Alamat usaha harus diisi',
                'province_business.required' => 'Provinsi tidak boleh kosong',
                'city_business.required' => 'Kota tidak boleh kosong',
                'postal_code_business.required' => 'Kode pos tidak boleh kosong',
                'phone_number_business.required' => 'Nomor telepon harus diisi',
                'business_kelurahan.required' => 'Kelurahan tidak boleh kosong',
                'business_kecamatan.required' => 'Kecamatan tidak boleh kosong',
                'business_location_status.required' => 'Pilih status tempat usaha',
                'legality_status.required' => 'Pilih status bisnis'

            ]);

        if($validation->fails()) {
            $json = [
                "status"=> false,
                "message"=> $validation->messages(),
            ];
        }else{
            BusinessInfo::updateOrCreate(
                [
                    'uid' => Auth::id()
                ],[
                    'uid' => Auth::id(),
                    'business_name' => $request->name_of_bussiness,
                    'id_cap_of_business' => $request->business_partner,
                    'id_credit_score_income_factor' => $request->business_category,
                    'business_established_since' => $request->business_established_since,
                    'total_employees' => $request->number_of_employee,
                    'business_description' => $request->business_description,
                    'business_full_address' => $request->address_of_business,
                    'business_province' => $request->province_business,
                    'business_city' => $request->city_business,
                    'business_sub_kecamatan' => $request->business_kecamatan,
                    'business_sub_kelurahan' => $request->business_kelurahan,
                    'business_zip_code' => $request->postal_code_business,
                    'business_phone_number' => $request->phone_number_business,
                    'business_place_status' => $request->business_location_status,
                    'partnership_since' => $request->business_partner,
                    'legality_status' => $request->legality_status,
                    'average_sales_revenue_six_month' => $request->revenue,
                    'average_monthly_profit_six_month' => $request->profit,
                    'average_monthly_expenditure_six_month' => $request->expenditure,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );

            $json = [
                "status"=> true,
                "message"=> 'Data bisnis berhasil ditambahkan.',
            ];
        }

        return response()->json($json);
    }

    function test(){


            $to ='085275608369'; // Phone number with country code where we want to send message(Required)
            $message ='Hello'; // Message that we want to send(Required)
            $response=ValueFirst::sendMessage($to,$message);

            echo "<pre>";
            print_r($response);



    }
}
