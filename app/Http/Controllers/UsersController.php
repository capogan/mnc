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

        $uid = Auth::id();
       $validation = Validator::make($request->all(), [
           'identity_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           'self_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'npwp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ],
           [
               'identity_image.required' => 'Foto ktp wajib di unggah',
               'self_image.required' => 'Foto diri wajib di unggah',
               'npwp_image.required' => 'Foto npwp wajib di unggah',
               'identity_image.mimes' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'self_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',
               'npwp_image.image' => 'Format tidak sesuai. Masukkan format jpeg,png,jpg,gif,svg',

           ]
       );

       if($validation->fails()) {
           $json = [
               "status"=> false,
               "message"=> $validation->messages(),
           ];
       }else{
           $path = public_path(). '/upload/';

           //image ktp

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

            $get_user = UsersFile::where('uid',$uid)->first();
           if($get_user){

               DB::beginTransaction();
               try{
                   UsersFile::where([
                       ['uid',$uid],
                   ])->update
                   ([
                       'identity_photo'=> $path.$filename_identity,
                       'self_photo'=> $path.$filename_self_image,
                       'npwp_photo'=>$path.$filename_self_image
                   ]);

                   DB::commit();
               }
               catch (Exception $e) {
                   DB::rollback();
               }


           }else{
               DB::beginTransaction();
               try{
                   UsersFile::create([
                       'uid' => Auth::id(),
                       'identity_photo'=> $path.$filename_identity,
                       'self_photo'=> $path.$filename_self_image,
                       'npwp_photo'=>$path.$filename_self_image
                   ]);
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
