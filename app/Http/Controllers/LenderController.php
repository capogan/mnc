<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

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
            'lender_profile' => User::with('profile')->where('id', Auth::id())->first(),
        );
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
