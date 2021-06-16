<?php

namespace App\Http\Controllers;

use App\DigisignActivation;
use App\DigiSignDocument;
use App\Helpers\BNI;
use App\Helpers\DigiSign;
use App\Helpers\LenderHelper;
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
use App\LoanInstallment;
use App\LenderBankInfo;
use App\Helpers\PrivyID;
use App\PrivyID as AppPrivyID;
use PDF;
use App\Helpers\Utils;
use App\LenderIndividualPersonalInfo;
use App\LenderRDLAccount;
use App\LenderRDLAccountRegistered;
use App\MasterReligion;
use App\Providers\DigiSignServiceProvider;
use App\RequestLoanDocument;

class LenderController extends Controller
{
    static $CONFIG = [
        "title" => "Lender",
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function editable_bio(){
        $has_complete = DigisignActivation::where('uid' , Auth::id())->count();
        $editable = true;
        if(Auth::user()->level == 'individu'){
            if($has_complete > 0){
                $editable = false;
            }
        }elseif(Auth::user()->level == 'business'){
            if($has_complete > 1){
                $editable = false;
            }
        }
        return $editable;
    }

    public function index(Request $request){
        $active_lender = LenderHelper::active_lender();
        if($active_lender){
            return redirect('/myprofile');
        }
        $editable = $this->editable_bio();
        $data = array(
            'provinces' => Province::get(),
            'lender_profile' => User::select('lender_business.*' , 'districts.name as districts_name' ,'regencies.name as regencies_name' ,'villages.name as villages_name' ,'provinces.name as provinces_name' ,'lender_bank_info.bank','lender_bank_info.rdl_number','lender_bank_info.rekening_name','lender_bank_info.rekening_number')
            ->leftJoin('lender_business' ,'lender_business.uid' , 'users.id')
            ->leftJoin('regencies' ,'lender_business.id_regency' , 'regencies.id')
            ->leftJoin('districts' ,'lender_business.id_district' , 'districts.id')
            ->leftJoin('villages' ,'lender_business.id_village' , 'villages.id')
            ->leftJoin('provinces' ,'lender_business.id_province' , 'provinces.id')
            ->leftJoin('lender_bank_info' , 'lender_bank_info.uid' , 'lender_business.uid')
            ->where('users.id', Auth::id())->first(),
            'editable' => $editable
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
            //'email_of_bussiness'        => 'required',
            //'phone_of_bussiness'        => 'required',
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
            'bank'                      => 'required',
            'rek_number'                => 'required',
            'rek_name'                  => 'required',
            'rek_lender'                => 'required',
        ],
        [
            'name_of_bussiness.required'    => 'Nama Usaha tidak boleh kosong',
            'npwp_of_bussiness.required'    => 'NPWP Usaha tidak boleh kosong',
            //'email_of_bussiness.required'   => 'Email Usaha tidak boleh kosong',
            //'phone_of_bussiness.required'   => 'Nomor telepon Usaha tidak boleh kosong',
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
            'bank.required'                      => 'Bank harus dipilih',
            'rek_number.required'                => 'Nomor rekening tidak boleh kosong',
            'rek_name.required'                  => 'Nama rekening tidak boleh kosong',
            'rek_lender.required'                => 'Nomor rekening lender tidak boleh kosong',

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
                    'phone_number'=>Auth::user()->phone_number_verified,
                    'website'=>$request->website_of_bussiness,
                    'email'=>Auth::user()->email,
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
                LenderBankInfo::updateOrCreate(
                    ['uid' => Auth::id()],
                    [
                        'uid' => Auth::id(),
                        'rekening_number' => $request->rek_number,
                        'rekening_name' => $request->rek_name,
                        'rdl_number' => $request->rek_lender,
                        'bank' => $request->bank
                    ]
                );
            $json = [
                "status"=> true,
                "message"=> 'Data Personal berhasil di tambahkan',
            ];
        }
        return response()->json($json);
    }

    public function director(Request $request){
        $editable = $this->editable_bio();
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
            'director' => $director,
            'editable' => $editable
        );
        return view('pages.lender.information_director',$this->merge_response($data, static::$CONFIG));
    }

    public function submit_director_data(Request $request){
        //$this->store_data_to_digisign(Auth::id());

       $is_ready_data = LenderDirectorData::where('uid' , Auth::id())->first();

        $validators = [
            'identity_number'       => ['required','min:16','max:16'],
            'director_name'         => 'required',
            'dob'                   => 'required',
            'email'                 => ['required','email'],
            'phone_number'          => ['required','min:11','max:12'],
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
            'identity_number.min'           => 'Nomor KTP harus 16 angka',
            'identity_number.max'           => 'Nomor KTP harus 16 angka',
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

        if(!$is_ready_data){
            // $validators['self_image'] = 'required|image|mimes:png,jpg';
            // $validators['identity_image'] = 'required|image|mimes:png,jpg';
            // $messagesvalidator['self_image.required'] = 'Swafoto tidak boleh kosong';
            // $messagesvalidator['identity_image.required'] = 'Foto KTP tidak boleh kosong';
        }

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

                if($i == 0){
                    $this->store_data_to_digisign(Auth::id());
                    // $privy = new PrivyID();
                    // $privy->requestRegistration($item['email'],$item['phone_number'], $path.'/'.$filename_identity,$path.'/'.$filename_self_image,$item['identity_number'],$item['director_name'],$item['dob'],Auth::id() , 'director');
                }

            }
            $i++;

        }
        return response()->json([
            "status"=> true,
            "message"=> 'Data Personal berhasil di tambahkan',
        ]);
    }

    public function store_data_to_digisign($uid){
        $u = User::with('digisignInfo')->where('id' , $uid)->first();

        if(!$u){
            return;
        }
        if(!$u->digisigninfo){
            return ;
        }
        if(!$u->digisigninfo->provinces && !$u->digisigninfo->cities && !$u->digisigninfo->distritcs && !$u->digisigninfo->villages){
            return ;
        }
        $path = public_path() . '/upload/lender/file';
        $digisign =new DigiSign;
        $digisign->requestRegistration(
            $path .'/'. $u->digisigninfo->identity_photo,
            $path .'/'. $u->digisigninfo->self_photo,
            $path .'/'. $u->digisigninfo->npwp_image,
            $u->digisigninfo->address,
            $u->digisigninfo->gender,
            $u->digisigninfo->districts->name,
            $u->digisigninfo->villagess->name,
            $u->digisigninfo->kodepos,
            $u->digisigninfo->cities->name,
            $u->digisigninfo->director_name,
            $u->phone_number_verified,
            $u->digisigninfo->director_dob,
            $u->digisigninfo->provinces->name,
            $u->digisigninfo->director_nik,
            $u->digisigninfo->director_pob,
            $u->digisigninfo->director_email,
            $u->digisigninfo->no_npwp,
            true,
            $uid
        );
    }

    public function commissioner(Request $request){
        $editable = $this->editable_bio();
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
            'director' => $director,
            'editable' => $editable
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

                if($i == 0){
                    $privy = new PrivyID();
                    $privy->requestRegistration($item['email'],$item['phone_number'], $path.'/'.$filename_identity,$path.'/'.$filename_self_image,$item['identity_number'],$item['director_name'],$item['dob'],Auth::id() , 'commissioner');
                }


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
        $editable = $this->editable_bio();
        if(!$step){
           return redirect('profile/lender');
        }else if($step->commissioner_verification != true){
            return redirect('profile/lender/information/commissioner');
        }
        $attachment = LenderAttachmentData::where('uid' , Auth::id())->first();
       // print_r($attachment); exit;
        $data = array(
            'attachment' => $attachment,
            'editable' =>$editable
        );

        return view('pages.lender.information_file',$this->merge_response($data, static::$CONFIG));
    }
    public function submit_attachment_data(Request $request){
        //print_r($request->all());
        $validation = Validator::make($request->all(),
        [
                'npwp' => 'required|image|mimes:png,jpg|max:1000',
                'tdp'     => 'required|mimes:pdf|max:1000',
                'nib'     => 'required|mimes:pdf|max:1000',
                'doc_kta'   => 'required|mimes:pdf|max:1000',
                'doc_last_ahu'   => 'required|mimes:pdf|max:1000',
                'organizational_structure'   => 'required|mimes:pdf|max:1000',
                'balance_report'   => 'required|mimes:pdf|max:1000',
                'cash_flow'   => 'required|mimes:pdf|max:1000',
                'loss_profit'   => 'required|mimes:pdf|max:1000',
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
            //RequestFunding::updateOrCreate(['uid' =>Auth::id()],['uid' => Auth::id() , 'status' => 1]);
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
        // print_r($borrower_data);
        // exit;
        $data = [
            'borrower_request' => $borrower_data
        ];
        return view('pages.lender.market_place_after_verification',$this->merge_response($data, static::$CONFIG));
    }

    public function marketplace_agreement(Request $request){
        $ready_rdl_account = LenderRDLAccountRegistered::where('uid', Auth::id())->where('status', 'active')->exists();
        if(!$ready_rdl_account){
            $u = User::with('individuinfo')->where('id' , Auth::id())->first();
            $data = ['u' => $u , 'religion' => MasterReligion::get()];
            return view('pages.lender.rdl_account', $data);
        }
        if(!isset($request->mark)){
            return abort('404');
        }

        $loan = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->where('status' , '18')->where('id' ,Utils::decrypt($request->mark))->first();
        $data = [
            'loan' => $loan ? $loan : false,
            'id_loan' => $request->mark,
        ];
        return view('pages.lender.sign',$this->merge_response($data, static::$CONFIG));
    }

    public function lender_sign_document_fund_aggreement(Request $request){
        $check_balance = new BNI;
        if(!isset($request->id)){
            return $json = [
                "status"=> 'error',
                "message"=> 'Data tidak ditemukan.',
            ];
        }
        $loan = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->where('status' , '18')->where('id' ,Utils::decrypt($request->id))->first();
        if(!$loan){
            return $json = [
                "status"=> 'error',
                "message"=> 'Tidak dapat didanai.',
            ];
        }
        $borrower = User::where('id' , $loan->uid)
                    ->with('digisigndata')
                    ->first();

        $lender = User::where('id' ,Auth::id())
                    ->with('digisigndata')
                    ->first();
        if(!$lender->digisigndata || !$borrower->digisigndata){
            return $json = [
                "status"=> 'error',
                "message"=> 'Pinjaman tidak dapat didanai.',
            ];
        }
        $data = [
            'title' => 'PERJANJIAN PENGGUNAAN LAYANAN P2P LENDING',
            'date_request_loan' => date('d m Y'),
            'borrower' => $borrower,
            'lender' => $lender,
            'loan' => $loan
        ];

        $pathDocument = public_path('upload/document/credit_aggreement/' . str_replace(' ', '', $data['title'] . '_' . uniqid()) . '.pdf');
        PDF::loadView('agreement.credit_agreement_lender', $data)->save($pathDocument);

        $create_borrower_file = $this->created_borrower_document($data , $borrower,$request->id);
        if(!$create_borrower_file){
            return $json = [
                "status"=> 'error',
                "message"=> 'Pinjaman tidak dapat didanai , terjadi kesalahan proses dokumen peminjam.',
            ];
        }
        
        $send_to = [
            // [
            //     'email' => $borrower->digisigndata->email,
            //     'name' => $borrower->digisigndata->full_name
            // ],
            [
                'email' => $lender->digisigndata->email,
                'name' => $lender->digisigndata->full_name
            ]
        ];
        $req_sign = [
            // [
            //     'name' => $borrower->digisigndata->full_name,
            //     'email' => $borrower->digisigndata->email,
            //     'aksi_ttd' => 'ttd',
            //     'kuser' => null,
            //     'user' => 'ttd2',
            //     'page' => '4',
            //     'llx' => '193',
            //     'lly' => '13',
            //     'urx' => '89.3',
            //     'ury' => '192.3',
            //     'visible' => 1
            // ],
            [
                'name' => $lender->digisigndata->full_name,
                'email' => $lender->digisigndata->email,
                'aksi_ttd' => 'ttd',
                'kuser' => null,
                'user' => 'ttd1',
                'page' => '4',
                'llx' => '430',
                'lly' => '192.3',
                'urx' => '330',
                'ury' => '193.7',
                'visible' => 1
            ]
        ];
        $doc_id = date('Ymd').'_'.uniqid().'_'.$lender->id;
        $digisign = new DigiSign;
        $response = $digisign->upload_document($pathDocument , $doc_id ,true, 'Lender_Aggreement' ,false , $send_to, $req_sign , $lender->id , 'credit_agreement');
        if(!$response){
            return [
                "status"=> 'error',
                "message"=> 'Error ketika menyimpan data, silahkan coba beberapa saat lagi.',
            ];
        }
        $create_doc_aggreement = RequestLoanDocument::create(
            [
                'document_id' => $doc_id,
                'request_loan_id' => Utils::decrypt($request->id),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'active'
            ]
        );
        if(!$create_doc_aggreement){
            return $json = [
                "status"=> 'error',
                "message"=> 'Upload document gagal.',
            ];
        }
        if(!$loan){
            return $json = [
                "status"=> 'error',
                "message"=> 'Data tidak ditemukan.',
            ];
        }
        $loan->status = '19';
        $loan->lender_uid = Auth::id();
        if($loan->save()){
            $this->loan_request_log($loan , Auth::id() , 19);
            return $json = [
                "status"=> 'success',
                "message"=> 'Data berhasil di update.',
                "url"=> 'portofolio/detail?p='.$request->id,
            ];
        }

        return $json = [
            "status"=> 'error',
            "message"=> 'Error ketika menyimpan data, silahkan coba beberapa saat lagi.',
        ];
    }

    public static function created_borrower_document($data , $lender ,$id){
        $pathDocument = public_path('upload/document/credit_aggreement/borrower/' . str_replace(' ', '', $data['title'] . '_' . uniqid()) . '.pdf');
        PDF::loadView('agreement.credit_agreement_borrower', $data)->save($pathDocument);
        $doc_id = date('Ymd').'_'.uniqid().'_'.$lender->id;
        $create_doc_aggreement = RequestLoanDocument::create(
            [
                'document_id' => $doc_id,
                'request_loan_id' => Utils::decrypt($id),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'active'
            ]
        );
        if(!$create_doc_aggreement){
            return $json = [
                "status"=> 'error',
                "message"=> 'Upload document gagal.',
            ];
        }
    }
    


    public function loan_request_log($json , $created_by , $status){
        $data = array(
            'id_request_loan' => $json->id,
            'json_log' => json_encode($json),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $created_by,
            'status' => $status
        );
    }


    public function post_sign(Request $requests)
    {
        $digisign = new DigiSign();
        $dc = DigiSignDocument::where('uid' , Auth::id())->where('step' ,'registration')->first();
        //echo $dc->document_id; exit;
        if($dc){
            $endpoint = $digisign->do_sign_the_document($dc->document_id);
            return response()->json([
                "status" => true,
                'url' => $endpoint,
                "message" => 'Berhasil Ditandatangani',
            ]);
        }
        $u = LenderDirectorData::with('digisign')->where('uid' , Auth::id())->where('position' ,'0')->first();

        if(!$u){
            return response()->json([
                "status" => false,
                'url' => 'false',
                "message" => 'Dokumen tidak tersedia.',
            ]);
        }
        $data = [
            'title' => 'PERJANJIAN KREDIT',
            'date_request_loan' => date('Y-m-d'),
            'individu' => $u,
        ];
        $pathDocument = public_path('upload/document/' . str_replace(' ', '', $u->director_name . '_' . uniqid()) . '.pdf');
        PDF::loadView('agreement.register_lender', $data)->save($pathDocument);
        $send_to = [
            [
                'email' => $u->digisign->email,
                'name' => $u->director_name
            ]
        ];
        $req_sign = [
            [
                'name' => $u->director_name,
                'email' => $u->digisign->email,
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
        $uid =Auth::id();
        $document_id = date('Y-m-d').'_'.uniqid().'_'.$uid;
        $upload = $digisign->upload_document($pathDocument , $document_id ,true, 'Lender_Aggreement' ,false , $send_to, $req_sign , $uid , 'registration');
        if($upload == true){
            $endpoint = $digisign->do_sign_the_document($document_id);
        }
        return response()->json([
            "status" => true,
            'url' => $endpoint,
            "message" => 'Berhasil Ditandatangani',
        ]);
    }

    public function upload_document_aggreement(Request $request){
        $lender = LenderBusiness::where('uid' , Auth::id())->first();
        $director_profile = LenderDirectorData::where('uid' , Auth::id())->where('position' ,'0')->first();
        $data = [
            'title' => 'PERJANJIAN KREDIT',
            'date_request_loan' => date('Y-m-d'),
            'business' => $lender->business_name,
            'director' => $director_profile,
        ];
        $recipient = AppPrivyID::where('uid' , Auth::id())->where('position' ,'director')->first();
        if(!$recipient || !$director_profile || !$lender){
            return false;
        }
        $pathDocument = public_path('upload/document/'.str_replace(' ' , '' ,$lender->business_name.uniqid()).'.pdf');
        PDF::loadView('agreement.loan', $data)->save($pathDocument);
        $recipients = [
            [
                'privyId' => $recipient->privyId,
                'type' => 'Signer',
                'enterpriseToken' =>''
            ]
        ];
        $privy = new PrivyID;
        $endpoint = $privy->requestDocumentUpload('Dokumen Perjanjian Pendanaan' , 'Serial' , $recipients , $pathDocument ,'registration');
        echo json_encode(['status' => 'true' , 'url' => $endpoint]);
    }

    public function register_sign_aggrement(Request $request){

        $active_lender = LenderHelper::active_lender();
        if($active_lender){
            return redirect('/myprofile');
        }
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        // if ($u->step != 4 && $u->step != 5) {
        //     return $this->urlValidation($u);
        // }
        $data = array(
            'sign_agreement' => DigisignActivation::where('uid' , Auth::id())->first(),
            'type' => LenderIndividualPersonalInfo::select('lender_type')->where('uid' , Auth::id())->first()
        );
        return view('pages.lender.sign_agreement',$this->merge_response($data, static::$CONFIG));

        // $verified_user = LenderVerification::where('uid' , Auth::id())->where('status' , 'verified')->first();
        // if($verified_user){
        //     return redirect('lender/funding');
        // }
        // $check_status = AppPrivyID::where('uid' , Auth::id())
        //                 ->whereIn('status' , ['registered' , 'verified'])
        //                 ->count();
        // $allow_sign = true;
        // if(Auth::user()->level == 'business'){
        //     if($check_status >= 2 ){
        //         $allow_sign = true;
        //     }
        // }else{
        //     if($check_status > 0){
        //         $allow_sign = true;
        //     }
        // }
        // $data = [
        //     'borrower_request' => [],
        //     'allow_to_sign' => $allow_sign
        // ];
        // return view('pages.lender.sign_agreement',$this->merge_response($data, static::$CONFIG));
    }

    public function sign_success(){
        $data = array(
        );
        return view('agreement.sign_success',$this->merge_response($data, static::$CONFIG));
    }

    public function profile(){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.profile',$this->merge_response($data, static::$CONFIG));
    }

    public function update_status_sign(Request $request){
        RequestFunding::updateOrCreate(['uid' =>Auth::id()],['uid' => Auth::id() , 'status' => 1, 'id_request_loan' => 1]);
        LenderVerification::updateOrCreate(
            ['uid' => Auth::id()],
            ['uid' => Auth::id() , 'sign_agreement' => true]
        );
    }

    public function submit_request_loan(Request $request){

    }
    public function portofolio(){

        $portofolio = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->with('status_title')
        ->where('lender_uid' , Auth::id())
        ->get();
        $data = [
            'portofolio' => $portofolio
        ];

        //print_r($portofolio->toArray()); exit;
        return view('pages.lender.portofolio',$this->merge_response($data, static::$CONFIG));
    }

    public function portofolio_detail(Request $request){
        if(!isset($request->p)){
            return abort('404');
        }
        $loan = LoanRequest::with('personal_info')
        ->with('business_info')
        ->with('scoring')
        ->where('id' ,Utils::decrypt($request->p))->where('lender_uid' , Auth::id())->first();

        $loan_installments = LoanInstallment::
        leftJoin('master_status_payment' ,'request_loan_installments.id_status_payment','=','master_status_payment.id')->
        where('id_request_loan',$loan->id)->orderBy('stages','ASC')
            ->get();
        $document = LoanRequest::with('loandocument')->where('id' , $loan->id)->first();
        //print_r($loan->toArray());exit;
        $data = [
            'no_invoice'    => $loan->invoice_number,
            'id_loan'       => $loan->id,
            'loan_installments'=> $loan_installments,
            'profile' => $loan,
            'document' => $document
        ];
        return view('pages.lender.loan',$this->merge_response($data, static::$CONFIG));
    }

    public function priview_document(){
        return view('agreement.document_sign');
    }

    public function myprofile(){

        $status_lender = LenderVerification::where('uid' , Auth::id())->first();
        if($status_lender){
            if($status_lender->status == 'reject'){
                $st_msg = "Maaf, permintaan kamu belum dapat disetujui.";
            }else if($status_lender->status == 'approve'){
                $st_msg = "Selamat, permintaan kamu telah disetujui kamu dapat mulai melakukan pendanaan.";
            }else{
                $st_msg = "Pendaftaran kamu akan kami proses, tunggu verifikasi maksimal 1x24 jam untuk dapat melanjutkan proses transaksi kamu.";
            }
        }else{
            return ;
        }
        if(Auth::user()->level == 'individu'){
            $profile = User::with('individuinfo')->where('id' , Auth::id())->first();
            $other_data = [];
            $data = [
                'msg' => $st_msg,
                'profile' => $profile,
                'other_data' => $other_data
            ];
            return view('pages.lender.profile_lender',$this->merge_response($data, static::$CONFIG));
        }else{
            $profile = User::select('lender_business.*' , 'districts.name as districts_name' ,'regencies.name as regencies_name' ,'villages.name as villages_name' ,'provinces.name as provinces_name' ,'lender_bank_info.bank','lender_bank_info.rdl_number','lender_bank_info.rekening_name','lender_bank_info.rekening_number')
            ->leftJoin('lender_business' ,'lender_business.uid' , 'users.id')
            ->leftJoin('regencies' ,'lender_business.id_regency' , 'regencies.id')
            ->leftJoin('districts' ,'lender_business.id_district' , 'districts.id')
            ->leftJoin('villages' ,'lender_business.id_village' , 'villages.id')
            ->leftJoin('provinces' ,'lender_business.id_province' , 'provinces.id')
            ->leftJoin('lender_bank_info' , 'lender_bank_info.uid' , 'lender_business.uid')
            ->where('users.id', Auth::id())->first();

            $other_data = User::with('commissioners')
            ->with('directors')
            ->with('document')
            ->where('id' , Auth::id())->first();
            $data = [
                'msg' => $st_msg,
                'profile' => $profile,
                'other_data' => $other_data
            ];
            return view('pages.lender.profile_lender_business',$this->merge_response($data, static::$CONFIG));

        }


    }

    public function register_rdl_account(){
        if(Auth::user()->level == 'business'){
            $msg = [
                'message' => 'Akun yang anda pilih adalah akun bisnis, silahkan update nomor rekening lender anda.'
            ];
            return view('pages.lender.create_rdl_response' , $msg);
        }
        $ready_rdl_account = LenderRDLAccountRegistered::where('uid', Auth::id())->where('status', 'active')->exists();
        if($ready_rdl_account){
            $msg = [
                'message' => 'Sudah memiliki akun RDL'
            ];
            return view('pages.lender.create_rdl_response' , $msg);
        }
        $is_registered_account = LenderRDLAccount::where('uid', Auth::id())->exists();
        if($is_registered_account){
            $msg = [
                'message' => 'Akun RDL sudah di registrasi, '
            ];
            return view('pages.lender.create_rdl_response' , $msg);
        }
        $u = User::with('individuinfo')->where('id' , Auth::id())->first();
        $data = [
            "title" => $u->individuinfo->gender,
            "firstName" => "",
            "middleName" => "",
            "lastName" =>$u->individuinfo->full_name,
            "optNPWP" => "1",
            "NPWPNum" => $u->individuinfo->no_npwp,
            "nationality" => "ID",
            "domicileCountry" => "ID",
            "religion" => $u->individuinfo->religion,
            "birthPlace" => $u->individuinfo->pob,
            "birthDate" => $u->individuinfo->dob,
            "gender" => $u->individuinfo->gender,
            "isMarried" => $u->individuinfo->married_status,
            "motherMaidenName" => $u->individuinfo->mother_name,
            "jobCode" => "99",
            "education" => $u->individuinfo->education,
            "idNumber" => $u->individuinfo->identity_number,
            "idIssuingCity" => $u->individuinfo->cities->name,
            "idExpiryDate" => "26102099",
            "addressStreet" => $u->individuinfo->full_address,
            "addressRtRwPerum" => $u->individuinfo->rt.$u->individuinfo->rw.$u->individuinfo->perum,
            "addressKel" => $u->individuinfo->districts->name,
            "addressKec" => $u->individuinfo->villagess->name,
            "zipCode" => $u->individuinfo->kodepos,
            "homePhone1" => "",
            "homePhone2" => "",
            "officePhone1" => "",
            "officePhone2" => "",
            "mobilePhone1" => $u->phone_number_verified,
            "mobilePhone2" => $u->phone_number_verified,
            "faxNum1" => "",
            "faxNum2" => "",
            "email" => $u->email,
            "monthlyIncome" => "8000000",
            "branchOpening" => "0259"
        ];
        $bni = new BNI;
        $result = $bni->request("/p2pl/register/investor", $data, Auth::id());

        if(!$result){
            $msg = [
                'message' => 'Gagal meregistrasi akun RDL, Silahkan contact administrator'
            ];
            return view('pages.lender.create_rdl_response' , $msg);
        }

        $account_number = $bni->register_investor('/p2pl/register/investor/account' , Auth::id());
        if(!$account_number){
            $msg = [
                'message' => 'Gagal membuat rekening RDL, Silahkan contact administrator'
            ];
            return view('pages.lender.create_rdl_response' , $msg);
        }
        $msg = [
            'message' => 'Akun RDL sudah di registrasi, '
        ];
        return view('pages.lender.create_rdl_response' , $msg);
    }

    public function update_rdl_account(Request $request){

        $validation = Validator::make($request->all(),
        [
                'rt' => 'required|max:3',
                'rw'     => 'required|max:3',
                'perum'     => 'required',
                'religion'   => 'required',
        ],
        [
            'rt.required' => 'RT tidak boleh kosong.',
            'rt.max' => 'RT Maksimal 3 karakter',
            'rw.required' => 'RW tidak boleh kosong.',
            'rw.max' => 'RW Maksimal 3 karakter',
            'perum.required' => 'Perum tidak boleh kosong.',
            'religion.required' => 'Agama tidak boleh kosong.',
        ]
        );
        if($validation->fails()) {
            return [
                "status"=> false,
                "message"=> $validation->messages(),
            ];
        }

        $u = LenderIndividualPersonalInfo::where('uid' , Auth::id())->first();
        if(!$u){
            return [
                "status"=> false,
                "message"=> "Data tidak ditemukan.",
            ];
        }
        $u->rt = $request->rt;
        $u->rw = $request->rw;
        $u->perum = $request->perum;
        $u->religion = $request->religion;
        if($u->save()){
            return [
                "status"=> true,
                "message"=> "",
            ];
        }else{
            return [
                "status"=> false,
                "message"=> "Terjadi kesalahan saat mengupdate data",
            ];
        }
    }

    public function get_document_to_assign(Request $request){
        if(!isset($request->doc)){
            return;
        }
        $doc_id = Utils::decrypt($request->doc);
        $document = RequestLoanDocument::select('document_id')->leftJoin('request_loan' , 'request_loan.id' ,'=','request_loan_document.request_loan_id')->where('request_loan.lender_uid' , Auth::id())->where('request_loan_document.id' , $doc_id)->first();
        if(!$document){
            return abort('404');
        }
        $digisign = new DigiSign;
        $endpoint = $digisign->do_sign_the_document($document->document_id);
        return redirect($endpoint);
    }

    public function rdl_account(){
        $lender = LenderRDLAccountRegistered::select('lender_rdl_account.*' ,'lender_rdl_account_registered.account_number')->leftJoin('lender_rdl_account' ,'lender_rdl_account_registered.uid' , '=','lender_rdl_account.uid')->where('lender_rdl_account_registered.uid' , Auth::id())->first();
        //print_r($lender->toArray()); exit;
        $msg = '';
        if(!$lender){
            $msg = 'Anda belum membuat akun RDL.';
        }
        $l_verification = LenderVerification::where('uid' , Auth::id())->first();
        if(!$l_verification){
            $msg = 'Akun kamu masih belum di setujui , silahkan kontak customer service kami jika terjadi kesalahan.';
        }
        $data = [
            'account' => $lender,
            'message' => $msg
        ];
        return view('pages.lender.rdl_info',$this->merge_response($data, static::$CONFIG));

    }

    public function aggreement_lender(){
        
    }

    public function aggreement_borrower(){
        
    }

}
