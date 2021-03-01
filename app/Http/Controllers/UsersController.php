<?php

namespace App\Http\Controllers;

use App\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
}
