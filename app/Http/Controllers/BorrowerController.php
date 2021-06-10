<?php

namespace App\Http\Controllers;

use App\BussinessCriteria;
use App\Education;
use App\IncomeFactory;
use App\LoanInstallment;
use App\MarriedStatus;
use App\Models\Province;
use App\Models\Regency;
use App\PersonalInfo;
use App\RequestLoanInstallments;
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
use App\CreditScore;
use App\Dependents;
use App\BecomePartner;
use App\BuildingStatus;
use App\DigisignActivation;
use App\Estabilished;
use App\Helpers\DigiSign;
use App\Legality;
use App\TotalEmployee;
use Illuminate\Support\Facades\Redirect;
use App\RequestFunding;

class BorrowerController extends Controller
{
    static $CONFIG = [
        "title" => "Borrower",
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function my_profile(Request $request){
        if(Auth::check()){
            if(Auth::user()->otp_verified != true){
                return Redirect::to('/otp/verified');
            }
            if(Auth::user()->group == 'lender'){
                if (Auth::user()->level == 'individu'){
                    return Redirect::to('/profile/lender-individu');
                }
                return Redirect::to('/profile/lender');
            }
        }
        $uid = Auth::id();
        $get_user = PersonalInfo::select('personal_info.*','personal_info.id as id_personal',
                    'personal_emergency_contact.*','regencies.name as personal_city','districts.name as personal_district',
                    'villages.name as personal_villages')
                    ->rightJoin('users' , 'users.id' , 'personal_info.uid')
                    ->rightJoin('personal_emergency_contact' , 'personal_emergency_contact.uid' , 'personal_info.uid')
                    ->rightJoin('regencies' , 'regencies.id' , 'personal_info.city')
                    ->leftJoin('districts' , 'districts.id' , 'personal_info.district')
                    ->leftJoin('villages' , 'villages.id' , 'personal_info.villages')
                    ->where('users.id',$uid)->first();
        $get_email = User::where('id',$uid)->first();
        $provinces = Province::get();
        $regency = Regency::get();
        $married_status = MarriedStatus::get();
        $education = Education::Orderby('id','ASC')->get();
        $siblings = Siblings::get();
        $data = [
            'header_section' => 'step1',
            'page' => 'pages.borrower.information.profile_information',
            'provinces' => $provinces,
            'regency' => $regency,
            'married_status' => $married_status,
            'education' =>$education,
            'get_user' =>$get_user,
            'get_email' =>$get_email,
            'dependents' => Dependents::get(),
            'siblings' =>$siblings,
            'request_loan' => LoanRequest::where('uid' , Auth::id())->get()
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }

    public function my_profile_business(Request $request){
        if(Auth::check()){
            if(Auth::user()->otp_verified != true){
                return Redirect::to('/otp/verified');
            }
        }
        $uid = Auth::id();
        $get_user = PersonalInfo::select('personal_info.*','personal_emergency_contact.*')
                    ->rightJoin('users' , 'users.id' , 'personal_info.uid')
                    ->rightJoin('personal_emergency_contact' , 'personal_emergency_contact.uid' , 'personal_info.uid')
                    ->where('users.id',$uid)->first();

        if(!isset($get_user->identity_number)){
            return Redirect::to('/profile');
        }
        $get_email = User::where('id',$uid)->first();
        $provinces = Province::get();
        $regency = Regency::get();
        $siblings = Siblings::get();
        $industry = IncomeFactory::orderBy('id','ASC')->get();
        $criteria = BussinessCriteria::where('status',true)->orderBy('id','ASC')->get();
        $partner_since = BecomePartner::orderBy('id','ASC')->get();
        $building_status = BuildingStatus::orderBy('id','ASC')->get();
        $estabilished = Estabilished::orderBy('id','ASC')->get();
        $legality = Legality::orderBy('id','ASC')->get();
        $employee = TotalEmployee::orderBy('id','ASC')->get();
        $business = BusinessInfo::rightJoin('users' , 'users.id' , 'personal_business.uid')->select('users.id as user_id','personal_business.*')->where('users.id',$uid)->first();
        $data = [
            'header_section' => 'step2',
            'page' => 'pages.borrower.information.bussiness_information',
            'provinces' => $provinces,
            'regency' => $regency,
            'get_user' =>$get_user,
            'get_email' =>$get_email,
            'siblings' =>$siblings,
            'industry' =>$industry,
            'criteria' =>$criteria,
            'legality' => $legality,
            'employee' => $employee,
            'partner_since' => $partner_since,
            'building_status' => $building_status,
            'estabilished' => $estabilished,
            'business' => $business,
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }

    public function my_profile_file(Request $request){
        if(Auth::check()){
            if(Auth::user()->otp_verified != true){
                return Redirect::to('/otp/verified');
            }
        }
        $uid = Auth::id();
        $get_user = PersonalInfo::select('personal_info.*','personal_emergency_contact.*')
                    ->rightJoin('users' , 'users.id' , 'personal_info.uid')
                    ->rightJoin('personal_emergency_contact' , 'personal_emergency_contact.uid' , 'personal_info.uid')
                    ->where('users.id',$uid)->first();
        $file = UsersFile::rightJoin('users' , 'users.id' , 'users_file.uid')->select('users.id as user_id','users_file.*')->where('users.id',$uid)->first();
        $data = [
            'header_section' => 'step3',
            'page' => 'pages.borrower.information.file_information',
            'dependents' => Dependents::get(),
            'file' => $file,
            'request_loan' => LoanRequest::where('uid' , Auth::id())->get()
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }


    public function my_profile_faktur(Request $request){
        if(Auth::check()){
            if(Auth::user()->otp_verified != true){
                return Redirect::to('/otp/verified');
            }
        }
        $uid = Auth::id();
        $get_user = PersonalInfo::select('personal_info.*','personal_emergency_contact.*')
                    ->rightJoin('users' , 'users.id' , 'personal_info.uid')
                    ->rightJoin('personal_emergency_contact' , 'personal_emergency_contact.uid' , 'personal_info.uid')
                    ->where('users.id',$uid)->first();

        $get_email = User::where('id',$uid)->first();
        $provinces = Province::get();
        $regency = Regency::get();
        $married_status = MarriedStatus::get();
        $education = Education::get();
        $siblings = Siblings::get();
        $industry = IncomeFactory::get();
        $criteria = BussinessCriteria::get();
        $partner_since = BecomePartner::get();
        $building_status = BuildingStatus::get();
        $estabilished = Estabilished::get();
        $legality = Legality::get();
        $employee = TotalEmployee::get();



        $file = UsersFile::rightJoin('users' , 'users.id' , 'users_file.uid')->select('users.id as user_id','users_file.*')->where('users.id',$uid)->first();
        $business = BusinessInfo::rightJoin('users' , 'users.id' , 'personal_business.uid')->select('users.id as user_id','personal_business.*')->where('users.id',$uid)->first();
        //echo $business->business_established_since; exit;
        $data = [
            'header_section' => 'step4',
            'page' => 'pages.borrower.information.invoice_information',
            'provinces' => $provinces,
            'regency' => $regency,
            'married_status' => $married_status,
            'get_user' =>$get_user,
            'get_email' =>$get_email,
            /*'tanggungan' => CreditScore::select('name_score','id_category_score','category_score.code' ,'score')
                            ->leftJoin('category_score' ,'category_score.id','=','credit_score.id_category_score')
                            ->where('category_score.status' , true)
                            ->where('siap_code' , 'dependents_number')
                            ->orderBy('id_category_score' , 'DESC')->get(),*/
            'education' =>$education,
            'dependents' => Dependents::get(),
            'siblings' =>$siblings,
            'industry' =>$industry,
            'criteria' =>$criteria,
            'legality' => $legality,
            'employee' => $employee,
            'partner_since' => $partner_since,
            'building_status' => $building_status,
            'estabilished' => $estabilished,
            'file' => $file,
            'business' => $business,
            'request_loan' => LoanRequest::where('uid' , Auth::id())->get()
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }


    public function my_profile_transaction(Request $request){
        $uid = Auth::id();
        if(Auth::check()){
            if(Auth::user()->otp_verified != true){
                return Redirect::to('/otp/verified');
            }
        }

        $loans =LoanRequest::
            leftJoin('master_status_loan_request' ,'request_loan.status','=','master_status_loan_request.id')
            ->select('request_loan.*','master_status_loan_request.title as status_title')
            ->where('uid',$uid)->get();


        $data = [
            'header_section' => 'step5',
            'page' => 'pages.borrower.information.finance_information',
            'dependents' => Dependents::get(),
            'request_loan' => $loans
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }



    public function my_business(Request $request){
        $uid = Auth::uid();
        $business = BusinessInfo::rightJoin('users' , 'users.id' , 'personal_business.uid')->select('users.id as user_id','personal_business.*')->where('users.id',$uid)->first();
    }

    public function sumbit_loan(Request $request){
        $validation = Validator::make($request->all(), [
            'invoice_number' => 'required|unique:request_loan',
            'identity_numbers_invoice'=> 'required',
            'period' => 'required',
            'member_code' => 'required',
            'total_invoice' => 'required'
        ],
            [
               'invoice_number.unique'=>'Nomor Faktur sudah terdaftar',
//                'member_code.required'=>'Kode Member harus diisi',
            ]
        );


        if($validation->fails()) {
            return json_encode(['status'=> false, 'message'=> $validation->messages()]);
        }
        $user_data = [
            'invoice_number' => $request->invoice_number,
            'identity_numbers_invoice' => $request->identity_numbers_invoice,
            'periode' => $request->period,
            'id_member_code' => $request->member_code
        ];

        $period = $request->period;

        //$invoice_id = $this->get_data_from_invoice($user_data);
        $request->total_invoice = str_replace('Rp' ,'' , $request->total_invoice);
        $request->total_invoice = str_replace('.' ,'' , $request->total_invoice);
        $request->total_invoice = (int)( $request->total_invoice);

        $invoice_id = $request->total_invoice;

        $config_admin_fee = FeeConfig::where('code_fee' , 'admin_fee')->first();
        $admin_fee = $config_admin_fee ? HelpCreditScoring::calculate_admin_fee($config_admin_fee->value , $invoice_id) : 0;
        $interest_fee = FeeConfig::where('code_fee' , 'interest_fee')
        ->where(function ($query) use ($period) {
            $query->where('min', '<=', $period);
            $query->where('max', '>=', $period);
        })
        ->first();
        $interest_loan = HelpCreditScoring::interest_loan(($invoice_id +$admin_fee)  , $period);

        $data_loan = [
            'invoice_number' => $request->invoice_number,
            'uid' => Auth::id(),
            'loan_amount' => $invoice_id + $admin_fee,
            'loan_period' => $request->period,
            'admin_fee_percentage' => $config_admin_fee->value,
            'admin_fee_amount' => $admin_fee,
            'interest_fee_percentage' => $interest_fee->value,
            'interest_fee_amount' => $interest_loan,
            'disbrusement' => ($invoice_id + $admin_fee),
            'repayment' => (($invoice_id + $admin_fee) + $interest_loan),
            'penalty_percentage' => 0,
            'penalty_max_percentage' => 45,
            'penalty_max_amount' => 45,
            'status' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'id_member_code' => $request->member_code
        ];
        $id_loan_request = LoanRequest::create(
            $data_loan
        );
        User::where('id' , Auth::id())->update(['step' => 5]);
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

    public function sign(Request $request){
        $loan = LoanRequest::where('invoice_number',$request->invoice)->first();
        if($loan){
            if($loan->status != '19'){
                return Redirect::to('/profile/transaction');
            }
            $status_activation = DigisignActivation::where('uid' , Auth::id())->first();
            if(!$status_activation){
                return abort(404, 'User belum terdaftar di digisign.');
            }
            if($status_activation->status_activation != 'active'){
                $data = array(
                    'sign_agreement' => DigisignActivation::where('uid' , Auth::id())->first(),
                );
                return view('pages.borrower.activation_digisign_account',$this->merge_response($data, static::$CONFIG));
            }
            $data = [
                'no_invoice'    => $request->invoice,
                'id_loan'       => $loan->id,
            ];
            return view('pages.borrower.sign',$this->merge_response($data, static::$CONFIG));
        }else{
            abort(404, 'Page Not Found.');
        }
    }

    public function get_document_to_sign(Request $request){
        $loan_id = LoanRequest::leftJoin('request_loan_document' ,'request_loan.id' ,'request_loan_document.request_loan_id')
                                ->where('request_loan.invoice_number' , $request->invoice)
                                ->where('request_loan.uid' , Auth::id())
                                ->where('request_loan.status' , '19')
                                ->first();
        $digisign = new DigiSign;
        $endpoint = $digisign->do_sign_the_document($loan_id->document_id);
        print_r($endpoint);
    }

    public function congratulation(Request $request){
        $loan = LoanRequest::where('invoice_number',$request->invoice)->first();
        if($loan->status != '28'){
            return Redirect::to('/profile/transaction');
        }
        $data = [

            'no_invoice'    => $request->invoice,
            'id_loan'       => $loan->id,
        ];
        return view('pages.borrower.congrats',$this->merge_response($data, static::$CONFIG));
    }

    public function confirm(Request $request){

        $id_loan = $request->id_loan;
        $number_status = $request->number_status;

        LoanRequest::where([
            ['id',$id_loan],

        ])->update
        ([
            "status" =>$number_status,
            "updated_at"=>date('Y-m-d H:i:s'),
        ]);
        if($number_status == '21'){

            $loan = LoanRequest::where('id',$id_loan)->first();
            $periode = $loan->periode;
            $loan_amount = $loan->loan_amount;
            if($periode == '14')
            {
                $amount = $loan_amount / 2 ;
                $x = 3;
            }else{
                $amount = $loan_amount / 4 ;
                $x = 5;
            }

            for ($row = 1; $row < $x; $row++){
                $startDate = time();
                $due_date = "";
                if($row == 1){
                    $due_date =   date('Y-m-d H:i:s', strtotime('+7 day', $startDate));
                }else if($row == 2){
                    $due_date =   date('Y-m-d H:i:s', strtotime('+14 day', $startDate));
                }else if($row == 3){
                    $due_date =   date('Y-m-d H:i:s', strtotime('+21 day', $startDate));
                }
                else if($row == 4){
                    $due_date =   date('Y-m-d H:i:s', strtotime('+28 day', $startDate));
                }
                RequestLoanInstallments::create([
                    'id_request_loan'=>$id_loan,
                    'stages'=>$row,
                    'amount'=>$amount,
                    'due_date_payment'=>$due_date,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'id_status_payment'=>'1',

                ]);

            }

        }
        $message = "Sukses menyimpan Data";
        return json_encode(['status'=> true, 'message'=> $id_loan]);

    }

    public function loan_installments(Request $request){

        $loan = LoanRequest::where('invoice_number',$request->invoice)->first();
        $loan_installments = LoanInstallment::
        leftJoin('master_status_payment' ,'request_loan_installments.id_status_payment','=','master_status_payment.id')->
        where('id_request_loan',$loan->id)->orderBy('stages','ASC')
            ->get();
        $data = [
            'no_invoice'    => $request->invoice,
            'id_loan'       => $loan->id,
            'loan_installments'=>$loan_installments
        ];

        return view('pages.borrower.loan',$this->merge_response($data, static::$CONFIG));
    }






}
