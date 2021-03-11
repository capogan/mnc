<?php

namespace App\Http\Controllers;

use App\BussinessCriteria;
use App\Education;
use App\IncomeFactory;
use App\MarriedStatus;
use App\Models\Province;
use App\Models\Regency;
use App\PersonalInfo;
use App\Siblings;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\LoanRequest;
use App\Helpers\HelpCreditScoring;
use App\FeeConfig;
use function GuzzleHttp\json_encode;
use App\LogRequestInvoice;
use App\UsersFile;
use App\BusinessInfo;

class BorrowerController extends Controller
{
    static $CONFIG = [
        "title" => "Borrower",
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my_profile(Request $request){

        $uid = Auth::id();
        $get_user = PersonalInfo::where('uid',$uid)->first();
        $get_email = User::where('id',$uid)->first();
        $provinces = Province::get();
        $regency = Regency::get();
        $married_status = MarriedStatus::get();
        $education = Education::get();
        $siblings = Siblings::get();
        $industry = IncomeFactory::get();
        $criteria = BussinessCriteria::get();
        $file = UsersFile::where('uid',$uid)->first();
        $data = [
            'provinces' => $provinces,
            'regency' => $regency,
            'married_status' => $married_status,
            'get_user' =>$get_user,
            'get_email' =>$get_email,
            'education' =>$education,
            'siblings' =>$siblings,
            'industry' =>$industry,
            'criteria' =>$criteria,
            'file' => $file
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }

    public function sumbit_loan(Request $request){
        $validation = Validator::make($request->all(), [
            'invoice_number' => 'required',
            'identity_numbers_invoice'=> 'required',
            'period' => 'required'
        ]);


        if($validation->fails()) {
            return json_encode(['status'=> false, 'message'=> $validation->messages()]);
        }
        $user_data = [
            'invoice_number' => $request->invoice_number,
            'identity_numbers_invoice' => $request->identity_numbers_invoice,
            'periode' => $request->period
        ];
        if(LoanRequest::where('invoice_number' , $request->invoice_number)->first()){
            return json_encode(['status' => false , 'message' => 'Nomor invoice sudah diproses']);
        }
        $period = $request->period;
        $invoice_id = $this->get_data_from_invoice($user_data);
        $config_admin_fee = FeeConfig::where('code_fee' , 'admin_fee')->first();
        $admin_fee = $config_admin_fee ? HelpCreditScoring::calculate_admin_fee($config_admin_fee->value , $invoice_id['total_invoice']) : 0;
        $interest_fee = FeeConfig::where('code_fee' , 'interest_fee')
        ->where(function ($query) use ($period) {
            $query->where('min', '<=', $period);
            $query->where('max', '>=', $period);
        })
        ->first();
        $interest_loan = HelpCreditScoring::interest_loan($invoice_id['total_invoice'] , $period);
        $data_loan = [
            'invoice_number' => $request->invoice_number,
            'uid' => Auth::id(),
            'loan_amount' => $invoice_id['total_invoice'],
            'loan_period' => $request->period,
            'admin_fee_percentage' => $config_admin_fee->value,
            'admin_fee_amount' => $admin_fee,
            'interest_fee_percentage' => $interest_fee->value,
            'interest_fee_amount' => $interest_loan,
            'disbrusement' => ($invoice_id['total_invoice'] - $admin_fee),
            'repayment' => (($invoice_id['total_invoice'] + $admin_fee) + $interest_loan),
            'penalty_percentage' => 0,
            'penalty_max_percentage' => 45,
            'penalty_max_amount' => 45,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $id_loan_request = LoanRequest::create(
            $data_loan
        );
        $loanRequest = LogRequestInvoice::create(
            [
                'request_loan_id' => $id_loan_request->id,
                'data' => json_encode($invoice_id),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::id(),
                'status' => '1'
            ]
        );
        if(!$loanRequest){
            return json_encode(['status' => false , 'message' => 'Terjadi Kesalaha, Coba beberapa saat lagi.']);
        }

        return json_encode(['status' => true , 'message' => 'Permintaan sedang diproses , kamu akan mendapatkan notifikasi jika perminttan diterima.']);
    }

    public function get_data_from_invoice($user_data = []){
        //$data = json_decode($data , TRUE);
        $data = [
            'id' => '123123',
            'invoice_id' => 'PCG123XDER',
            'user_id' => '43522',
            'no_faktur' => 'NOXX1231OSWMW',
            'full_name' => 'Susilo Bambang Pamungkas',
            'id_number' => '1920199801289101',
            'total_invoice' => 100*20000,
            'items' => [
                [
                'product' => 'KIPAS ANGIN',
                'qty' => 100,
                'price' => 20000
                ]
            ]
        ];
        return $data;

    }

    public function add_personal_info(Request $request){

        $validation = Validator::make($request->all(), [
            'name_of_bussiness' => 'required',
            'business_province' => 'required',
            'business_partner' => 'required',
            'business_category' => 'required',
            'operation_date' => 'required',
            'number_of_employee' => 'required',
            'business_description' => 'required',
            'address_of_business' => 'required',
            'province_business' => 'required',
            'city_business' => 'required',
            'postal_code_business' => 'required|numeric',
            'phone_number_business' => 'required|numeric',
            'business_kelurahan' => 'required',
            'business_kecamatan' => 'required'
        ],
            [
                'name_of_bussiness.required' => 'required',
                'business_province.required' => 'required',
                'business_partner.required' => 'required',
                'business_category.required' => 'required',
                'operation_date.required' => 'required',
                'number_of_employee.required' => 'required',
                'business_description.required' => 'required',
                'address_of_business.required' => 'required',
                'province_business.required' => 'required',
                'city_business.required' => 'required',
                'postal_code_business.required' => 'required|numeric',
                'phone_number_business.required' => 'required|numeric',
                'business_kelurahan.required' => 'required',
                'business_kecamatan.required' => 'required'
 
            ]);
 
        if($validation->fails()) {
            $json = [
                "status"=> false,
                "message"=> $validation->messages(),
            ];
        }else{
            BusinessInfo::updateOrCreate([
                'uid' => Auth::id(),
                'business_name' => $request->name_of_bussiness,
                'id_cap_of_business' => $request->business_partner,
                'id_credit_score_income_factor' => $request->business_category,
                'business_established_since' => $request->operation_date,
                'total_employees' => $request->number_of_employee,
                'business_description' => $request->business_description,
                'business_full_address' => $request->address_of_business,
                'business_province' => $request->province_business,
                'business_city' => $request->city_business,
                'business_sub_kecamatan' => $request->business_kecamatan,
                'business_sub_kelurahan' => $request->business_kelurahan,
                'business_zip_code' => $request->postal_code_business,
                'business_phone_number' => $request->phone_number_business,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'uid' => Auth::id()
            ]
        );
 
            $json = [
                "status"=> true,
                "message"=> 'Data bisnis berhasil ditambahkan.',
            ];
        }
 
        return response()->json($json);
    }



}
