<?php

namespace App\Http\Controllers;

use App\PersonalInfo;
use App\UsersFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

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

           ]);

       if($validation->fails()) {
           $json = [
               "status"=> false,
               "message"=> $validation->messages(),
           ];
       }else{
           PersonalInfo::create([
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
               'created_at'             => date('Y-m-d H:i:s'),
               'updated_at'             =>date('Y-m-d H:i:s'),

           ]);

           $json = [
               "status"=> true,
               "message"=> 'Data Personal berhasil di tambahkan',
           ];
       }

       return response()->json($json);
   }

   public function upload_file(Request $request){
       $data_validate = [];
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
        }
        $uid = Auth::id();
        $validation = Validator::make($request->all(), $data_validate,
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
                $data_insert['bussiness_build_photo'] = 'upload/'.$filename_npwp_imagebusiness_location_image;
            }
            if(isset($request->business_owner_file)){
                $data_insert['bussiness_owner_photo'] = 'upload/'.$filename_npwp_imagebusiness_owner_file;
            }
            if(isset($request->business_document)){
                $data_insert['siup_photo'] = 'upload/'.$filename_npwp_imagebusiness_document;
            }
            if(isset($request->business_activity_image)){
                $data_insert['business_activity_photo'] = 'upload/'.$filename_npwp_imagebusiness_activity_image;
            }
            if(isset($request->business_npwp)){
                $data_insert['npwp_bussiness_photo'] = 'upload/'.$filename_npwp_imagebusiness_npwp;
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
}
