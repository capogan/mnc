<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\LenderBusiness;
use App\LenderVerification;
use App\LoanRequest;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\DB;
use App\LenderDirectorData;
use App\LenderCommissionerData;
use App\LenderAttachmentData;
use App\RequestFunding;

class LenderController extends Controller
{
    static $CONFIG = [
        "title" => "Lender",
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = array(
            'provinces' => Province::get(),
            'lender_profile' => User::select('lender_business.*' , 'districts.name as districts_name' ,'regencies.name as regencies_name' ,'villages.name as villages_name' ,'provinces.name as provinces_name')
            ->leftJoin('lender_business' ,'lender_business.uid' , 'users.id')
            ->leftJoin('regencies' ,'lender_business.id_regency' , 'regencies.id')
            ->leftJoin('districts' ,'lender_business.id_district' , 'districts.id')
            ->leftJoin('villages' ,'lender_business.id_village' , 'villages.id')
            ->leftJoin('provinces' ,'lender_business.id_province' , 'provinces.id')
            ->where('users.id', Auth::id())->first(),
        );

      
        //print_r(User::with('business_lender')->where('id', Auth::id())->first()); exit;
        return view('pages.lender.index',$this->merge_response($data, static::$CONFIG));
    }

    public function information_business_add(Request $request){
        $arr_request = $request->all();

        //Asset Value
        $asset_value = isset($arr_request['asset_value']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['asset_value']) : $arr_request['asset_value'];
        strlen($asset_value) == 0 ? $arr_request['asset_value'] = null : $arr_request['asset_value'] ;

        //equity_value
        $equity_value = isset($arr_request['equity_value']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['equity_value']) : $arr_request['equity_value'];
        strlen($equity_value) == 0 ? $arr_request['equity_value'] = null : $arr_request['equity_value'] ;

        //short_term_liabilities
        $short_term_liabilities = isset($arr_request['short_term_liabilities']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['short_term_liabilities']) : $arr_request['short_term_liabilities'];
        strlen($short_term_liabilities) == 0 ? $arr_request['short_term_liabilities'] = null : $arr_request['short_term_liabilities'] ;

        //income_year

        $income_year = isset($arr_request['income_year']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['income_year']) : $arr_request['income_year'];
        strlen($income_year) == 0 ? $arr_request['income_year'] = null : $arr_request['income_year'] ;

        //operating_expenses

        $operating_expenses = isset($arr_request['operating_expenses']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['operating_expenses']) : $arr_request['operating_expenses'];
        strlen($operating_expenses) == 0 ? $arr_request['operating_expenses'] = null : $arr_request['operating_expenses'] ;

        //profit_loss
        $operating_expenses = isset($arr_request['profit_loss']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['profit_loss']) : $arr_request['profit_loss'];
        strlen($operating_expenses) == 0 ? $arr_request['profit_loss'] = null : $arr_request['profit_loss'] ;

        $validation = Validator::make($arr_request, [

            'name_of_bussiness'         => 'required',
            'npwp_of_bussiness'         => 'required',
            'email_of_bussiness'        => 'required',
            'phone_of_bussiness'        => 'required',
            'address_of_bussiness'      => 'required',
            'province'                  => 'required',
            'city'                      => 'required',
            'district'                  => 'required',
            'vilages'                   => 'required',
            'website_of_bussiness'      => 'required',
            'nib_of_bussiness'          => 'required',
            'tdp_number'                => 'required',
            'akta_pendirian'            => 'required',
            'asset_value'               => 'required',
            'equity_value'              => 'required',
            'short_term_liabilities'    => 'required',
            'income_year'               => 'required',
            'operating_expenses'        => 'required',
            'profit_loss'               => 'required',
        ],
        [
            'name_of_bussiness.required'    => 'Nama Usaha tidak boleh kosong',
            'npwp_of_bussiness.required'    => 'NPWP Usaha tidak boleh kosong',
            'email_of_bussiness.required'   => 'Email Usaha tidak boleh kosong',
            'phone_of_bussiness.required'   => 'Nomor telepon Usaha tidak boleh kosong',
            'address_of_bussiness.required' => 'Alamat Usaha tidak boleh kosong',
            'province.required'             => 'Propinsi tidak boleh kosong',
            'city.required'                 => 'Kota tidak boleh kosong',
            'district.required'             => 'Kecamatan tidak boleh kosong',
            'vilages.required'              => 'Kelurahan tidak boleh kosong',
            'website_of_bussiness.required' => 'Website Usaha tidak boleh kosong',
            'nib_of_bussiness.required'     => 'Nomor Induk Berusaha tidak boleh kosong',
            'tdp_number.required'           => 'Nomor Tanda Terdaftar Usaha tidak boleh kosong',
            'akta_pendirian.required'       => 'Akta Usaha tidak boleh kosong',
            'asset_value.required'          => 'Nilai Aset tidak boleh kosong',
            'equity_value.required'         => 'Nilai Ekuitas tidak boleh kosong',
            'short_term_liabilities.required'=> 'Kewajiban Jangka Pendek tidak boleh kosong',
            'income_year.required'          => 'Pendapatan Tahun tidak boleh kosong',
            'operating_expenses.required'   => 'Beban Operasional tahun berjalan tidak boleh kosong',
            'profit_loss.required'          => 'Laba - Rugi periode Tahun tidak boleh kosong',
        ]);
        

        if($validation->fails()) {
            $json = [
                "status"=> false,
                "message"=> $validation->messages(),
            ];
        }else{
                LenderBusiness::create([
                    'uid'=>Auth::user()->id ,
                    'business_name'=>$request->name_of_bussiness,
                    'npwp'=> $request->npwp_of_bussiness,
                    'address'=>$request->address_of_bussiness,
                    'id_province'=>$request->province,
                    'id_regency'=>$request->city,
                    'id_district'=>$request->district,
                    'id_village'=>$request->vilages,
                    'phone_number'=>$request->phone_of_bussiness,
                    'website'=>$request->website_of_bussiness,
                    'email'=>$request->email_of_bussiness,
                    'induk_berusaha_number'=>$request->nib_of_bussiness,
                    'tdp_number'=>$request->tdp_number,
                    'akta_pendirian'=>$request->akta_pendirian,
                    'letter_register_pengesahan_kemenkunham'=>$request->number_register_kemenkunham,
                    'last_akta_perubahan'=>$request->akta_perubahan,
                    'letter_change_pengesahan_kemenkunham'=>$request->letter_change_pengesahan_kemenkunham,
                    'amount_setoran_modal'=> str_replace(array(',', 'Rp', ' '), '',  $request->amount_setoran_modal),
                    'taxpayer'=> str_replace(array(',', 'Rp', ' '), '',  $request->taxpayer),
                    'asset_value'=>str_replace(array(',', 'Rp', ' '), '',  $request->asset_value),
                    'equity_value'=>str_replace(array(',', 'Rp', ' '), '',  $request->equity_value),
                    'short_term_obligations'=>str_replace(array(',', 'Rp', ' '), '',  $request->short_term_liabilities),
                    'annual_income'=>str_replace(array(',', 'Rp', ' '), '',  $request->income_year),
                    'operating_expenses'=>str_replace(array(',', 'Rp', ' '), '',  $request->operating_expenses),
                    'profit_and_loss'=>str_replace(array(',', 'Rp', ' '), '',  $request->profit_loss),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
                LenderVerification::updateOrCreate(
                    ['uid' => Auth::id()],
                    ['uid' => Auth::id() , 'business_verification' => true]
                );
            $json = [
                "status"=> true,
                "message"=> 'Data Personal berhasil di tambahkan',
            ];
        }

        return response()->json($json);
    }

    public function director(Request $request){
        $step = LenderVerification::where('uid' , Auth::id())->first();
        if(!$step){
           return redirect('profile/lender'); 
        }else if($step->business_verification != true){
            return redirect('profile/lender'); 
        }
        $director = LenderDirectorData::select('lender_director_data.*' , 'districts.name as districts_name' ,'regencies.name as regencies_name' ,'villages.name as villages_name' ,'provinces.name as provinces_name')
                        ->leftJoin('regencies' ,'lender_director_data.regency_id' , 'regencies.id')
                        ->leftJoin('districts' ,'lender_director_data.district_id' , 'districts.id')
                        ->leftJoin('villages' ,'lender_director_data.village_id' , 'villages.id')
                        ->leftJoin('provinces' ,'lender_director_data.province_id' , 'provinces.id')
                        ->where('uid' , Auth::id())->get();
        $data = array(
            'provinces' => Province::get(),
            'director' => $director
        );
        return view('pages.lender.information_director',$this->merge_response($data, static::$CONFIG));
    }

    public function submit_director_data(Request $request){
       //print_r($request->all()); exit;

       $is_ready_data = LenderDirectorData::where('uid' , Auth::id())->first();
        $validators = [
            'identity_number'       => 'required',
            'director_name'         => 'required',
            'dob'                   => 'required',
            'email'                 => 'required',
            'phone_number'          => 'required',
            'npwp_of_director'      => 'required',
            'director_level'        => 'required',
            'address'               => 'required',
            'province'              => 'required',
            'city'                  => 'required',
            'district'              => 'required',
            'vilages'               => 'required',
        ];
        $messagesvalidator = [
            'identity_number.required'      => 'Nomor KTP tidak boleh kosong',
            'director_name.required'        => 'Nama direktur tidak boleh kosong',
            'dob.required'                  => 'Tanggal lahir tidak boleh kosong',
            'email.required'                => 'Email tidak boleh kosong',
            'phone_number.required'         => 'Nomor Telepon tidak boleh kosong',
            'npwp_of_director.required'     => 'Npwp tidak boleh kosong',
            'director_level.required'       => 'Jabatan tidak boleh kosong',
            'address.required'              => 'Alamat tidak boleh kosong',
            'province.required'             => 'Propinsi tidak boleh kosong',
            'city.required'                 => 'Kota tidak boleh kosong',
            'district.required'             => 'Kecamatan tidak boleh kosong',
            'vilages.required'              => 'Desa tidak boleh kosong',
        ];

        for($i=0; $i<count($request->identity_number);$i++){
            $requests[$i]['identity_number'] = $request['identity_number'][$i];
            $requests[$i]['director_name'] = $request['director_name'][$i];
            $requests[$i]['dob'] = $request['dob'][$i];
            $requests[$i]['email'] = $request['email'][$i];
            $requests[$i]['phone_number'] = $request['phone_number'][$i];
            $requests[$i]['npwp_of_director'] = $request['npwp_of_director'][$i];
            $requests[$i]['director_level'] = $request['director_level'][$i];
            $requests[$i]['address'] = $request['address'][$i];
            $requests[$i]['vilages'] = $request['vilages'][$i];
            $requests[$i]['province'] = $request['province'][$i];
            $requests[$i]['city'] = $request['city'][$i];
            $requests[$i]['district'] = $request['district'][$i];
            
            foreach($request->all() as $key => $val){
                if(!$request->hasFile($key)){
                    if($val[$i] != ''){
                        $requests[$i]['active'] = 'active';
                    }
                }
                
            }
            if($i==0){
                $j = $i;
            }else{
                $j = $i+1;
            }
            if(array_key_exists('self_image'.$j, $request->all())){
                $requests[$i]['self_image'.$j] = $request['self_image'.$j];
                //$validators['self_image'.$i] = 'required|image|mimes:png,jpg';
                //$messagesvalidator['self_image'.$i.'.image' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                //$messagesvalidator['self_image'.$i.'.required' ] = 'Format tidak sesuai. Masukkan format png,jpg';
            }
            if(array_key_exists('identity_image'.$j, $request->all())){
                $requests[$i]['identity_image'.$j] = $request['identity_image'.$j];
                //$validators['identity_image'.$i] = 'required|image|mimes:png,jpg';
                //$messagesvalidator['identity_image'.$i.'.image' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                //$messagesvalidator['identity_image'.$i.'.required' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                
            }
            $validation = Validator::make($requests[$i], $validators ,$messagesvalidator);
            if(array_key_exists('active' , $requests[$i])){
                if($validation->fails()) {
                    $json = [
                        "status"=> false,
                        "message"=> $validation->messages(),
                    ];
                    return response()->json($json);
                }
            }
        }
        $path =public_path().'/upload/lender/file';
        $i=0;
        foreach($requests as $item){
            if($i==0){
                $j = $i;
            }else{
                $j = $i+1;
            }
            if(array_key_exists('active' , $item)){
                $data = [
                    'uid' => Auth::id(),
                    'director_nik' => $item['identity_number'],
                    'director_name' => $item['director_name'],
                    'director_dob' => $item['dob'],
                    'director_phone_number' => $item['phone_number'],
                    'director_email' => $item['email'],
                    'director_npwp' => $item['npwp_of_director'],
                    'director_level' => $item['director_level'],
                    'address' =>$item['address'],
                    'province_id' =>$item['province'],
                    'regency_id' =>$item['city'],
                    'village_id' =>$item['vilages'],
                    'district_id' =>$item['district'],
                    'position' => $i
                ];
                if(array_key_exists('identity_image'.$j, $request->all())){
                    if($request->hasFile('identity_image'.$j)) {
                        $identity_image= $request->file('identity_image'.$j);
                        $filename_identity = 'director_ktp_'.$j.'_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                        $identity_image->move($path, $filename_identity);
                        $data['identity_photo'] = $filename_identity;
                    }
                }
                if(array_key_exists('self_image'.$j, $request->all())){
                    if($request->hasFile('self_image'.$j)) {
                        $self_image= $request->file('self_image'.$j);
                        $filename_self_image= 'director_selfie_'.$j.'_'.Auth::id().'_'.time(). '.' . $self_image->getClientOriginalExtension();
                        $self_image->move($path, $filename_self_image);
                        $data['self_photo'] = $filename_self_image;
                    }
                }
                
                LenderDirectorData::updateOrCreate(
                    ['position' => $i,
                    'uid' => Auth::id()],
                    $data
                );
                LenderVerification::updateOrCreate(
                    ['uid' => Auth::id()],
                    ['uid' => Auth::id() , 'director_verification' => true]
                );
                    
            }
            $i++;
        }
        return response()->json([
            "status"=> true,
            "message"=> 'Data Personal berhasil di tambahkan',
        ]);
    }

    public function commissioner(Request $request){
        
        $step = LenderVerification::where('uid' , Auth::id())->first();
        if(!$step){
           return redirect('profile/lender'); 
        }else if($step->director_verification != true){
            return redirect('profile/lender/information/director'); 
        }

        $director = LenderCommissionerData::select('lender_commissioner_data.*' , 'districts.name as districts_name' ,'regencies.name as regencies_name' ,'villages.name as villages_name' ,'provinces.name as provinces_name')
        ->leftJoin('regencies' ,'lender_commissioner_data.regency_id' , 'regencies.id')
        ->leftJoin('districts' ,'lender_commissioner_data.district_id' , 'districts.id')
        ->leftJoin('villages' ,'lender_commissioner_data.village_id' , 'villages.id')
        ->leftJoin('provinces' ,'lender_commissioner_data.province_id' , 'provinces.id')
        ->where('uid' , Auth::id())->get();
        $data = array(
            'provinces' => Province::get(),
            'director' => $director
        );
        return view('pages.lender.information_commissioner',$this->merge_response($data, static::$CONFIG));
    }
    public function submit_commisioner_data(Request $request){
        //print_r($request->all()); exit;
         $validators = [
             'identity_number'       => 'required',
             'director_name'         => 'required',
             'dob'                   => 'required',
             'email'                 => 'required',
             'phone_number'          => 'required',
             'npwp_of_director'      => 'required',
             'director_level'        => 'required',
             'address'               => 'required',
             'province'              => 'required',
             'city'                  => 'required',
             'district'              => 'required',
             'vilages'               => 'required',
         ];
         $messagesvalidator = [
             'identity_number.required'      => 'Nomor KTP tidak boleh kosong',
             'director_name.required'        => 'Nama direktur tidak boleh kosong',
             'dob.required'                  => 'Tanggal lahir tidak boleh kosong',
             'email.required'                => 'Email tidak boleh kosong',
             'phone_number.required'         => 'Nomor Telepon tidak boleh kosong',
             'npwp_of_director.required'     => 'Npwp tidak boleh kosong',
             'director_level.required'       => 'Jabatan tidak boleh kosong',
             'address.required'              => 'Alamat tidak boleh kosong',
             'province.required'             => 'Propinsi tidak boleh kosong',
             'city.required'                 => 'Kota tidak boleh kosong',
             'district.required'             => 'Kecamatan tidak boleh kosong',
             'vilages.required'              => 'Desa tidak boleh kosong',
         ];
 
         for($i=0; $i<count($request->identity_number);$i++){
             $requests[$i]['identity_number'] = $request['identity_number'][$i];
             $requests[$i]['director_name'] = $request['director_name'][$i];
             $requests[$i]['dob'] = $request['dob'][$i];
             $requests[$i]['email'] = $request['email'][$i];
             $requests[$i]['phone_number'] = $request['phone_number'][$i];
             $requests[$i]['npwp_of_director'] = $request['npwp_of_director'][$i];
             $requests[$i]['director_level'] = $request['director_level'][$i];
             $requests[$i]['address'] = $request['address'][$i];
             $requests[$i]['vilages'] = $request['vilages'][$i];
             $requests[$i]['province'] = $request['province'][$i];
             $requests[$i]['city'] = $request['city'][$i];
             $requests[$i]['district'] = $request['district'][$i];
             
             foreach($request->all() as $key => $val){
                 if(!$request->hasFile($key)){
                     if($val[$i] != ''){
                         $requests[$i]['active'] = 'active';
                     }
                 }
                 
             }
             if($i==0){
                 $j = $i;
             }else{
                 $j = $i+1;
             }
             if(array_key_exists('self_image'.$j, $request->all())){
                 $requests[$i]['self_image'.$j] = $request['self_image'.$j];
                 //$validators['self_image'.$i] = 'required|image|mimes:png,jpg';
                 //$messagesvalidator['self_image'.$i.'.image' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                 //$messagesvalidator['self_image'.$i.'.required' ] = 'Format tidak sesuai. Masukkan format png,jpg';
             }
             if(array_key_exists('identity_image'.$j, $request->all())){
                 $requests[$i]['identity_image'.$j] = $request['identity_image'.$j];
                 //$validators['identity_image'.$i] = 'required|image|mimes:png,jpg';
                 //$messagesvalidator['identity_image'.$i.'.image' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                 //$messagesvalidator['identity_image'.$i.'.required' ] = 'Format tidak sesuai. Masukkan format png,jpg';
                 
             }
             $validation = Validator::make($requests[$i], $validators ,$messagesvalidator);
             //if(array_key_exists('active' , $requests[$i])){
                 if($validation->fails()) {
                     $json = [
                         "status"=> false,
                         "message"=> $validation->messages(),
                     ];
                     return response()->json($json);
                 }
             //}
         }

         //print_r($requests); exit;
         $path =public_path().'/upload/lender/file';
         $i=0;
         foreach($requests as $item){
            if($i==0){
                $j = $i;
            }else{
                $j = $i+1;
            }
             if(array_key_exists('active' , $item)){
                $data = [
                    'uid' => Auth::id(),
                    'commissioner_nik' => $item['identity_number'],
                    'commissioner_name' => $item['director_name'],
                    'commissioner_dob' => $item['dob'],
                    'commissioner_phone_number' => $item['phone_number'],
                    'commissioner_email' => $item['email'],
                    'commissioner_npwp' => $item['npwp_of_director'],
                    'commissioner_level' => $item['director_level'],
                    'address' => $item['address'],
                    'province_id' =>$item['province'],
                    'regency_id' =>$item['city'],
                    'village_id' =>$item['vilages'],
                    'district_id' =>$item['district'],
                    'sequence' => $i
                ];
                if(array_key_exists('identity_image'.$j, $request->all())){
                    if($request->hasFile('identity_image'.$j)) {
                        $identity_image= $request->file('identity_image'.$j);
                        $filename_identity = 'commissaris_ktp_'.$j.'_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                        $identity_image->move($path, $filename_identity);
                        $data['identity_photo'] = $filename_identity;
                    }
                }
                if(array_key_exists('self_image'.$j, $request->all())){
                    if($request->hasFile('self_image'.$j)) {
                        $self_image= $request->file('self_image'.$j);
                        $filename_self_image= 'commissaris_selfie_'.$j.'_'.Auth::id().'_'.time(). '.' . $self_image->getClientOriginalExtension();
                        $self_image->move($path, $filename_self_image);
                        $data['self_photo'] = $filename_self_image;
                    }
                }
                
                 LenderCommissionerData::updateOrCreate(
                     ['sequence' => $i,
                     'uid' => Auth::id()],
                     $data
                 );
                 LenderVerification::updateOrCreate(
                    ['uid' => Auth::id()],
                    ['uid' => Auth::id() , 'commissioner_verification' => true]
                );
                 
                     
             }
             $i++;
         }
         return response()->json([
             "status"=> true,
             "message"=> 'Data Personal berhasil di tambahkan',
         ]);
     }

    public function information_file(Request $request){
        $step = LenderVerification::where('uid' , Auth::id())->first();
        if(!$step){
           return redirect('profile/lender'); 
        }else if($step->commissioner_verification != true){
            return redirect('profile/lender/information/commissioner'); 
        }
        $attachment = LenderAttachmentData::where('uid' , Auth::id())->first();
       // print_r($attachment); exit;
        $data = array(
            'attachment' => $attachment
        );
       
        return view('pages.lender.information_file',$this->merge_response($data, static::$CONFIG));
    }
    public function submit_attachment_data(Request $request){
        //print_r($request->all());
        $validation = Validator::make($request->all(), 
        [
                'npwp' => 'required|image|mimes:png,jpg',
                'tdp'     => 'required|mimes:pdf',
                'nib'     => 'required|mimes:pdf',
                'doc_kta'   => 'required|mimes:pdf',
                'doc_last_ahu'   => 'required|mimes:pdf',
                'organizational_structure'   => 'required|mimes:pdf',
                'balance_report'   => 'required|mimes:pdf',
                'cash_flow'   => 'required|mimes:pdf',
                'loss_profit'   => 'required|mimes:pdf',
        ],
        [
            'npwp.required' => 'Dokumen NPWP wajib diunggah',
            'nib.required' => 'Dokumen NIB wajib diunggah',
            'tdp.required' => 'Dokumen TDP wajib diunggah',
            'doc_kta.required' => 'Dokumen kta Pendirian & Pengesahaan AHU wajib diunggah',
            'doc_last_ahu.required' => 'Dokumen akta Perubahan Terakhir & Pengesahaan AHU wajib diunggah',
            'organizational_structure.required' => 'Dokumen Struktur Organisasi Perusahaan wajib diunggah',
            'balance_report.required' => 'Dokumen Neraca wajib diunggah',
            'cash_flow.required' => 'Dokumen Dokumen Laporan Arus Kas  wajib diunggah',
            'loss_profit.required' => 'Dokumen Laporan Laba Rugi wajib diunggah',
        ]
        );
        
        $path =public_path().'/upload/lender/file/attachment';
        if($validation->fails()) {
            $json = [
                "status"=> false,
                "message"=> $validation->messages(),
            ];
        }else{
            
            if($request->hasFile('npwp')) {
                $identity_image= $request->file('npwp');
                $lender_npwp_ = 'lender_npwp_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $lender_npwp_);
            }
            if($request->hasFile('nib')) {
                $identity_image= $request->file('nib');
                $nib = 'lender_nib_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $nib);
            }

            if($request->hasFile('tdp')) {
                $identity_image= $request->file('tdp');
                $tdp = 'lender_tdp_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $tdp);
            }
            if($request->hasFile('doc_kta')) {
                $identity_image= $request->file('doc_kta');
                $doc_kta = 'lender_doc_kta_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $doc_kta);
            }
            if($request->hasFile('doc_last_ahu')) {
                $identity_image= $request->file('doc_last_ahu');
                $doc_last_ahu = 'lender_doc_last_ahu_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $doc_last_ahu);
            }
            if($request->hasFile('organizational_structure')) {
                $identity_image= $request->file('organizational_structure');
                $organizational_structure = 'lender_organizational_structure_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $organizational_structure);
            }
            if($request->hasFile('balance_report')) {
                $identity_image= $request->file('balance_report');
                $balance_report = 'lender_balance_report_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $balance_report);
            }
            if($request->hasFile('cash_flow')) {
                $identity_image= $request->file('cash_flow');
                $cash_flow = 'lender_cash_flow_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $cash_flow);
            }
            if($request->hasFile('loss_profit')) {
                $identity_image= $request->file('loss_profit');
                $loss_profit = 'lender_loss_profit_'.Auth::id().'_'.time(). '.' . $identity_image->getClientOriginalExtension();
                $identity_image->move($path, $loss_profit);
            }
            $data = [
                'uid' => Auth::id(),
                'npwp' => $lender_npwp_,
                'nib' => $nib,
                'tdp' => $tdp,
                'akta_pendirian' => $doc_kta,
                'akta_perubahan' =>  $doc_last_ahu,
                'structure_organization' =>$organizational_structure,
                'balance_sheet' => $balance_report,
                'cash_flow_statement' => $cash_flow,
                'income_statement' => $loss_profit
            ];
            DB::beginTransaction();
            LenderAttachmentData::updateOrCreate(
                ['uid' => Auth::id()],
                $data
            );
            RequestFunding::updateOrCreate(['uid' =>Auth::id()],['uid' => Auth::id() , 'status' => 1]);
            LenderVerification::updateOrCreate(
                ['uid' => Auth::id()],
                ['uid' => Auth::id() , 'document_verification' => true]
            );
            try{
                DB::commit();
            }
            catch (Exception $e) {
                $json = [
                    "status"=> false,
                    "message"=> ['message' => 'Error when save data'],
                ];
            }
            
            $json = [
                "status"=> true,
                "message"=> 'Data Personal berhasil di tambahkan',
            ];
        }

        return response()->json($json);
    }

    public function market_place(Request $request){
        $status_verification = LenderVerification::where('uid' , Auth::id())->where('status' , 'verified')->first();
        if(!$status_verification){
            return view('pages.lender.market_place',$this->merge_response(static::$CONFIG));
        }
        $borrower_data = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->where('status' , '18')->get();
        $data = [
            'borrower_request' => $borrower_data 
        ];
        return view('pages.lender.market_place_after_verification',$this->merge_response($data, static::$CONFIG));
    }

    public function register_sign_aggrement(Request $request){
        $status_verification = LenderVerification::where('uid' , Auth::id())->where('status' , 'verified')->first();
        if(!$status_verification){
            return view('pages.lender.market_place',$this->merge_response(static::$CONFIG));
        }
        $borrower_data = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->where('status' , '18')->get();
        $data = [
            'borrower_request' => $borrower_data 
        ];
        return view('pages.lender.market_place_after_verification',$this->merge_response($data, static::$CONFIG));
    }

    public function profile(){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.profile',$this->merge_response($data, static::$CONFIG));
    }





}
