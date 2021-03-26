<?php

namespace App\Http\Controllers;

use App\LenderBusiness;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LenderController extends Controller
{
    static $CONFIG = [
        "title" => "Lender",
    ];

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.index',$this->merge_response($data, static::$CONFIG));
    }

    public function information_business_add(Request $request){
        $arr_request = $request->all();

        //amount_setoran_modal
        $amount_setoran_modal = isset($arr_request['amount_setoran_modal']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['amount_setoran_modal']) : $arr_request['amount_setoran_modal'];
        strlen($amount_setoran_modal) == 0 ? $arr_request['amount_setoran_modal'] = null : $arr_request['amount_setoran_modal'] ;

        //taxpayer
        $taxpayer = isset($arr_request['taxpayer']) ? str_replace(array(',', 'Rp', ' '), '',  $arr_request['taxpayer']) : $arr_request['taxpayer'];
        strlen($taxpayer) == 0 ? $arr_request['taxpayer'] = null : $arr_request['taxpayer'] ;


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
            'amount_setoran_modal'      => 'required',
            'taxpayer'                  => 'required',
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
            'amount_setoran_modal.required' => 'Jumlah setoran modal tidak boleh kosong',
            'taxpayer.required'             => 'Wajib Pajak tidak boleh kosong',
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

            $json = [
                "status"=> true,
                "message"=> 'Data Personal berhasil di tambahkan',
            ];
        }

        return response()->json($json);
    }

    public function director(Request $request){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.information_director',$this->merge_response($data, static::$CONFIG));
    }

    public function commissioner(Request $request){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.information_commissioner',$this->merge_response($data, static::$CONFIG));
    }

    public function information_file(Request $request){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.information_file',$this->merge_response($data, static::$CONFIG));
    }

    public function market_place(Request $request){
        $data = array(
            'provinces' => Province::get(),
        );
        return view('pages.lender.market_place',$this->merge_response($data, static::$CONFIG));
    }





}
