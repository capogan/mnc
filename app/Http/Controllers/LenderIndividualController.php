<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BuildingStatus;
use App\Education;
use App\Helpers\PrivyID;
use App\IncomeFactory;
use App\Legality;
use App\LenderIndividualBankAccount;
use App\LenderIndividualBusinessInfo;
use App\LenderIndividualEmergencyContact;
use App\LenderIndividualFile;
use App\LenderIndividualJobInformation;
use App\LenderIndividualPersonalInfo;
use App\MarriedStatus;
use App\MasterLengthOfWork;
use App\Models\Province;
use App\RequestFunding;
use App\Siblings;
use App\StatusOfResidence;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LenderIndividualController extends Controller
{
    static $CONFIG = [
        "title" => "Lender Individu",
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function urlValidation($u)
    {
        $urlStep = [
            '1' => 'profile/lender-individu',
            '2a' => 'profile/lender-individu/occupation/sme',
            '2b' => 'profile/lender-individu/occupation/',
            '3a' => 'profile/lender-individu/document/sme',
            '3b' => 'profile/lender-individu/document',
            '4' => 'profile/lender-individu/sign',
        ];

        $lender = LenderIndividualPersonalInfo::select('lender_type', 'uid')->where('uid', $u->id)->first();
        switch ($u->step) {
            case ('1'):
                return redirect($urlStep['1']);
                break;
            case '2':
                if ($lender->lender_type == 1) {
                    return redirect($urlStep['2a']);
                } else {
                    return redirect($urlStep['2b']);
                }
                break;
            case '3':
                if ($lender->lender_type == 1) {
                    return redirect($urlStep['3a']);
                } else {
                    return redirect($urlStep['3b']);
                }
                break;
            case '4':
                return redirect($urlStep['4']);
                break;
            default:
                return redirect($urlStep['1']);
                break;
        }
    }

    public function index(Request $request)
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 1 && $u->step != null && $u->step != 5) {
            return $this->urlValidation($u);
        }

        $data = array(
            'provinces' => Province::get(),
            'married_status' => MarriedStatus::get(),
            'education' => Education::Orderby('id', 'ASC')->get(),
            'bank' => Bank::Orderby('id', 'ASC')->get(),
            'siblings' => Siblings::get(),
            'status_of_residence' => StatusOfResidence::get(),
            'lender_type' => [
                '1' => 'SME',
                '2' => 'Non SME',
            ],
            'lender_individual_personal_info' => User::select(
                'lender_individual_personal_info.*',
                'lender_individual_bank_account.*',
                'lender_individual_emergency_contact.*',
                'districts.name as districts_name',
                'regencies.name as regencies_name',
                'villages.name as villages_name',
                'provinces.name as provinces_name',
                'users.email'
            )
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->leftJoin('lender_individual_bank_account', 'lender_individual_personal_info.id', 'lender_individual_bank_account.id_lender_individual')
                ->leftJoin('lender_individual_emergency_contact', 'lender_individual_personal_info.id', 'lender_individual_emergency_contact.id_lender_individual')
                ->leftJoin('regencies', 'lender_individual_personal_info.city', 'regencies.id')
                ->leftJoin('districts', 'lender_individual_personal_info.district', 'districts.id')
                ->leftJoin('villages', 'lender_individual_personal_info.villages', 'villages.id')
                ->leftJoin('provinces', 'lender_individual_personal_info.province', 'provinces.id')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.index', $this->merge_response($data, static::$CONFIG));
    }

    public function get_occupation()
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 2 && $u->step != 5) {
            return $this->urlValidation($u);
        }

        $data = array(
            'provinces' => Province::get(),
            'length_of_work' => MasterLengthOfWork::Orderby('id', 'ASC')->get(),
            'occupation_lender_individual' => User::select(
                'lender_individual_sme_job_information.*',
                'lender_individual_personal_info.lender_type',
                'lender_individual_personal_info.id as personal_id',
                'districts.name as districts_name',
                'regencies.name as regencies_name',
                'villages.name as villages_name',
                'provinces.name as provinces_name', )
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->leftJoin('lender_individual_sme_job_information', 'lender_individual_personal_info.id', 'lender_individual_sme_job_information.id_lender_individual')
                ->leftJoin('regencies', 'lender_individual_sme_job_information.city', 'regencies.id')
                ->leftJoin('districts', 'lender_individual_sme_job_information.district', 'districts.id')
                ->leftJoin('villages', 'lender_individual_sme_job_information.villages', 'villages.id')
                ->leftJoin('provinces', 'lender_individual_sme_job_information.province', 'provinces.id')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.occupation', $this->merge_response($data, static::$CONFIG));
    }

    public function get_occupation_sme()
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 2 && $u->step != 5) {
            return $this->urlValidation($u);
        }

        $data = array(
            'provinces' => Province::get(),
            'legality' => Legality::Orderby('id', 'ASC')->get(),
            'building_ownership_status' => BuildingStatus::Orderby('id', 'ASC')->get(),
            'industry' => IncomeFactory::get(),
            'occupation_lender_individual_sme' => User::select(
                'lender_individual_business_info.*',
                'lender_individual_personal_info.lender_type',
                'lender_individual_personal_info.id as personal_id',
                'districts.name as districts_name',
                'regencies.name as regencies_name',
                'villages.name as villages_name',
                'provinces.name as provinces_name', )
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->leftJoin('lender_individual_business_info', 'lender_individual_personal_info.id', 'lender_individual_business_info.id_lender_individual')
                ->leftJoin('regencies', 'lender_individual_business_info.city', 'regencies.id')
                ->leftJoin('districts', 'lender_individual_business_info.district', 'districts.id')
                ->leftJoin('villages', 'lender_individual_business_info.villages', 'villages.id')
                ->leftJoin('provinces', 'lender_individual_business_info.province', 'provinces.id')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.occupation_sme', $this->merge_response($data, static::$CONFIG));
    }

    public function get_document()
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 3 && $u->step != 5) {
            return $this->urlValidation($u);
        }
        $data = array(
            'lender_individual_docs' => User::select(
                'lender_individual_personal_info.lender_type',
                'lender_individual_personal_info.id as personal_id',
                'lender_individual_file.*')
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->leftJoin('lender_individual_file', 'lender_individual_personal_info.id', 'lender_individual_file.id_lender_individual')
                ->leftJoin('lender_individual_sme_job_information', 'lender_individual_personal_info.id', 'lender_individual_sme_job_information.id_lender_individual')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.document', $this->merge_response($data, static::$CONFIG));
    }

    public function get_document_sme()
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 3 && $u->step != 5) {
            return $this->urlValidation($u);
        }
        $data = array(
            'lender_individual_docs' => User::select(
                'lender_individual_personal_info.lender_type',
                'lender_individual_personal_info.id as personal_id',
                'lender_individual_file.*')
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->leftJoin('lender_individual_file', 'lender_individual_personal_info.id', 'lender_individual_file.id_lender_individual')
                ->leftJoin('lender_individual_sme_job_information', 'lender_individual_personal_info.id', 'lender_individual_sme_job_information.id_lender_individual')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.document_sme', $this->merge_response($data, static::$CONFIG));
    }

    public function post_profile(Request $requests)
    {
        $validators = [
            'identity_number' => 'required|numeric',
            'full_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required',
            'whatsapp_number' => 'required|numeric',
            'gender' => 'required',
            'dob' => 'required|date',
            'pob' => 'required',
            'education' => 'required',
            'mother_name' => 'required',
            'married_status' => 'required',
            'full_address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'villages' => 'required',
            'kodepos' => 'required|numeric',
            'emergency_name' => 'required',
            'relationship_as' => 'required',
            'emergency_phone' => 'required|numeric',
            'emergency_full_address' => 'required',
            'bank_id' => 'required',
            'rek_number' => 'required|numeric',
            'rek_name' => 'required',
            'no_hp_in_bank' => 'required|numeric',
            'lender_type' => 'required',
        ];

        $messagesvalidator = [
            'identity_number.required' => 'Nomor KTP tidak boleh kosong',
            'identity_number.numeric' => 'Nomor KTP harus angka',
            'full_name.required' => 'Nama Lengkap tidak boleh kosong',
            'phone_number.required' => 'Nomor Telepon tidak boleh kosong',
            'phone_number.numeric' => 'Nomor Telepon harus angka',
            'email.required' => 'Email tidak boleh kosong',
            'whatsapp_number.required' => 'Nomor Whatsapp tidak boleh kosong',
            'whatsapp_number.numeric' => 'Nomor Whatsapp harus angka',
            'gender.required' => 'Jenis Kelamin tidak boleh kosong',
            'pob.required' => 'Tempat Lahir tidak boleh kosong',
            'dob.required' => 'Tanggal Lahir tidak boleh kosong',
            'education.required' => 'Pendidikan Terakhir tidak boleh kosong',
            'mother_name.required' => 'Nama Ibu Kandung tidak boleh kosong',
            'married_status.required' => 'Status Pernikahan tidak boleh kosong',
            'full_address.required' => 'Alamat tidak boleh kosong',
            'province.required' => 'Propinsi tidak boleh kosong',
            'city.required' => 'Kota tidak boleh kosong',
            'district.required' => 'Kecamatan tidak boleh kosong',
            'villages.required' => 'Kelurahan tidak boleh kosong',
            'kodepos.required' => 'Kode Pos tidak boleh kosong',
            'kodepos.numeric' => 'Kode Pos harus angka',
            'emergency_name.required' => 'Nama Kerabat tidak boleh kosong',
            'relationship_as.required' => 'Hubungan tidak boleh kosong',
            'emergency_phone.required' => 'Nomor Telepon Kerabat tidak boleh kosong',
            'emergency_phone.numeric' => 'Nomor Telepon Kerabat harus angka',
            'emergency_full_address.required' => 'Alamat Kerabat tidak boleh kosong',
            'bank_id.required' => 'Nama Bank Penerima tidak boleh kosong',
            'rek_name.required' => 'Nama Rekening tidak boleh kosong',
            'rek_number.required' => 'Nomor Rekening tidak boleh kosong',
            'rek_number.numeric' => 'Nomor Rekening harus angka',
            'no_hp_in_bank.required' => 'Nomor Telepon yang Didaftarkan di Bank tidak boleh kosong',
            'lender_type.required' => 'Jenis Lender Individu tidak boleh kosong',
        ];

        // Add validator if SME
        if ($requests->lender_type == "1") {
            $smeValidation = [
                'status_of_residence' => 'required',
                'no_npwp' => 'required',
                'total_credit_card' => 'required',
                'no_bpjs_tk' => 'required',
                'no_bpjs_kesehatan' => 'required',
            ];

            $smeMessage = [
                'status_of_residence.required' => 'Status Tempat Tinggal tidak boleh kosong',
                'no_npwp.required' => 'NPWP tidak boleh kosong',
                'total_credit_card.required' => 'Jumlah Kartu Kredit tidak boleh kosong',
                'no_bpjs_tk.required' => 'No BPJS TK tidak boleh kosong',
                'no_bpjs_kesehatan.required' => 'No BPJS Kesehatan tidak boleh kosong',
            ];
            $validators = array_merge($validators, $smeValidation);
            $messagesvalidator = array_merge($messagesvalidator, $smeMessage);
        }

        $validation = Validator::make($requests->all(), $validators, $messagesvalidator);
        if ($validation->fails()) {
            $json = [
                "status" => false,
                "message" => $validation->messages(),
            ];
            return response()->json($json);
        }

        DB::beginTransaction();
        try {
            $insertID = LenderIndividualPersonalInfo::updateOrCreate([
                'uid' => Auth::user()->id,
            ], [
                'identity_number' => $requests->identity_number,
                'full_name' => $requests->full_name,
                'phone_number' => $requests->phone_number,
                'email' => $requests->email,
                'whatsapp_number' => $requests->whatsapp_number,
                'gender' => $requests->gender,
                'dob' => $requests->dob,
                'pob' => $requests->pob,
                'education' => $requests->education,
                'mother_name' => $requests->mother_name,
                'married_status' => $requests->married_status,
                'full_address' => $requests->full_address,
                'province' => $requests->province,
                'city' => $requests->city,
                'district' => $requests->district,
                'villages' => $requests->villages,
                'kodepos' => $requests->kodepos,
                'lender_type' => $requests->lender_type,
                'status_of_residence' => $requests->status_of_residence,
                'no_npwp' => $requests->no_npwp,
                'total_credit_card' => $requests->total_credit_card,
                'no_bpjs_tk' => $requests->no_bpjs_tk,
                'no_bpjs_kesehatan' => $requests->no_bpjs_kesehatan,
            ]);

            LenderIndividualEmergencyContact::updateOrCreate([
                'id_lender_individual' => $insertID->id,
            ], [
                'emergency_name' => $requests->emergency_name,
                'emergency_siblings' => $requests->relationship_as,
                'emergency_phone_number' => $requests->emergency_phone,
                'emergency_full_address' => $requests->emergency_full_address,
            ]);

            LenderIndividualBankAccount::updateOrCreate([
                'id_lender_individual' => $insertID->id,
            ], [
                'account_name' => $requests->rek_number,
                'id_bank' => $requests->bank_id,
                'account_number' => $requests->rek_name,
                'phone_number_register_in_bank' => $requests->no_hp_in_bank,
            ]);

            User::where('id', Auth::id())->update(['step' => 2]);
            DB::commit();
        } catch (Exception $e) {
            $json = [
                "status" => false,
                "message" => $e->messages(),
            ];
            return response()->json($json);
            DB::rollback();
        }

        return response()->json([
            "status" => true,
            "message" => 'Informasi Pribadi ditambahkan',
        ]);
    }

    public function post_occupation(Request $requests)
    {
        $validators = [
            'personal_id' => 'required',
            'company_name' => 'required',
            'company_phone_number' => 'required|numeric',
            'npwp_of_bussiness' => 'required',
            'occupation' => 'required',
            'total_income' => 'required|numeric',
            'payment_date' => 'required',
            'length_of_work' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'villages' => 'required',
            'office_zip_code' => 'required|numeric',
            'full_address' => 'required',
        ];

        $messagesvalidator = [
            'personal_id.required' => 'Form Informasi Pribadi tidak boleh kosong',
            'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
            'company_phone_number.required' => 'Nomor Telepon Perusahaan tidak boleh kosong',
            'company_phone_number.numeric' => 'Nomor Telepon Perusahaan harus angka',
            'npwp_of_bussiness.required' => 'Nomor NPWP tidak boleh kosong',
            'occupation.required' => 'Pekerjaan tidak boleh kosong',
            'total_income.required' => 'Tingkat Pendapatan tidak boleh kosong',
            'total_income.numeric' => 'Tingkat Pendapatan harus angka',
            'payment_date.required' => 'Tanggal Penggajian Setiap Bulan tidak boleh kosong',
            'length_of_work.required' => 'Lama Waktu Bekerja',
            'province.required' => 'Propinsi tidak boleh kosong',
            'city.required' => 'Kota tidak boleh kosong',
            'district.required' => 'Kecamatan tidak boleh kosong',
            'villages.required' => 'Kelurahan tidak boleh kosong',
            'office_zip_code.required' => 'Kode Pos tidak boleh kosong',
            'office_zip_code.numeric' => 'Kode Pos harus angka',
            'full_address.required' => 'Alamat tidak boleh kosong',
        ];

        $validation = Validator::make($requests->all(), $validators, $messagesvalidator);
        if ($validation->fails()) {
            $json = [
                "status" => false,
                "message" => $validation->messages(),
            ];
            return response()->json($json);
        }

        DB::beginTransaction();
        try {
            LenderIndividualJobInformation::updateOrCreate([
                'id_lender_individual' => $requests->personal_id,
            ], [
                'payment_level' => $requests->total_income,
                'npwp' => $requests->npwp_of_bussiness,
                'payment_date' => $requests->payment_date,
                'job' => $requests->occupation,
                'id_length_work' => $requests->length_of_work,
                'company_phone_number' => $requests->company_phone_number,
                'province' => $requests->province,
                'city' => $requests->city,
                'district' => $requests->district,
                'villages' => $requests->villages,
                'company_full_address' => $requests->full_address,
                'company_name' => $requests->company_name,
                'kode_pos' => $requests->office_zip_code,
            ]);

            User::where('id', Auth::id())->update(['step' => 3]);
            DB::commit();
        } catch (Exception $e) {
            $json = [
                "status" => false,
                "message" => $e->messages(),
            ];
            return response()->json($json);
            DB::rollback();
        }

        return response()->json([
            "status" => true,
            "message" => 'Informasi Pekerjaan ditambahkan',
        ]);

    }

    public function post_occupation_sme(Request $requests)
    {
        $validators = [
            'personal_id' => 'required',
            'company_name' => 'required',
            'company_phone_number' => 'required|numeric',
            'business_legality' => 'required',
            'no_siup' => 'required',
            'npwp_of_bussiness' => 'required',
            'founded_date' => 'required',
            'business_place_status' => 'required',
            'business_category' => 'required',
            'business_type_detail' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'villages' => 'required',
            'office_zip_code' => 'required|numeric',
            'full_address' => 'required',
            'average_sales_revenue_six_month' => 'required|numeric',
            'average_monthly_expenditure_six_month' => 'required|numeric',
            'average_monthly_profit_six_month' => 'required|numeric',
            'total_employee' => 'required|numeric',
        ];

        $messagesvalidator = [
            'personal_id.required' => 'Form Informasi Pribadi tidak boleh kosong',
            'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
            'company_phone_number.required' => 'Nomor Telepon Perusahaan tidak boleh kosong',
            'company_phone_number.numeric' => 'Nomor Telepon Perusahaan harus angka',
            'npwp_of_bussiness.required' => 'Nomor NPWP tidak boleh kosong',
            'business_legality.required' => 'Status Badan Hukum Usaha tidak boleh kosong',
            'no_siup.required' => 'Nomor Izin Usaha tidak boleh kosong',
            'founded_date.required' => 'Tanggal Berdiri tidak boleh kosong',
            'business_place_status.required' => 'Status Tempat Usaha tidak boleh kosong',
            'business_category.required' => 'Jenis Bidang Usaha tidak boleh kosong',
            'business_type_detail.required' => 'Detil Jenis Bidang Usaha tidak boleh kosong',
            'province.required' => 'Propinsi tidak boleh kosong',
            'city.required' => 'Kota tidak boleh kosong',
            'district.required' => 'Kecamatan tidak boleh kosong',
            'villages.required' => 'Kelurahan tidak boleh kosong',
            'office_zip_code.required' => 'Kode Pos tidak boleh kosong',
            'office_zip_code.numeric' => 'Kode Pos harus angka',
            'full_address.required' => 'Alamat Lengkap Tempat Usaha tidak boleh kosong',
            'average_sales_revenue_six_month.required' => 'Rata-Rata Penjualan per Bulan (6 bulan terakhir) tidak boleh kosong',
            'average_sales_revenue_six_month.numeric' => 'Rata-Rata Penjualan per Bulan (6 bulan terakhir) harus angka',
            'average_monthly_expenditure_six_month.required' => 'Rata-Rata Pengeluaran per Bulan (6 bulan terakhir) tidak boleh kosong',
            'average_monthly_expenditure_six_month.numeric' => 'Rata-Rata Pengeluaran per Bulan (6 bulan terakhir) harus angka',
            'average_monthly_profit_six_month.required' => 'Rata-Rata Keuntungan per Bulan (6 bulan terakhir) tidak boleh kosong',
            'average_monthly_profit_six_month.numeric' => 'Rata-Rata Keuntungan per Bulan (6 bulan terakhir) harus angka',
            'total_employee.required' => 'Total Karyawan Saat Ini tidak boleh kosong',
            'total_employee.numeric' => 'Total Karyawan Saat Ini harus angka',
        ];

        $validation = Validator::make($requests->all(), $validators, $messagesvalidator);
        if ($validation->fails()) {
            $json = [
                "status" => false,
                "message" => $validation->messages(),
            ];
            return response()->json($json);
        }

        DB::beginTransaction();
        try {
            LenderIndividualBusinessInfo::updateOrCreate([
                'id_lender_individual' => $requests->personal_id,
            ], [
                'id_business_legality' => $requests->business_legality,
                'company_name' => $requests->company_name,
                'no_siup' => $requests->no_siup,
                'phone_number' => $requests->company_phone_number,
                'date_of_business_birth' => $requests->founded_date,
                'business_place_status' => $requests->business_place_status,
                'province' => $requests->province,
                'city' => $requests->city,
                'district' => $requests->district,
                'villages' => $requests->villages,
                'no_npwp' => $requests->npwp_of_bussiness,
                'average_sales_revenue_six_month' => $requests->average_sales_revenue_six_month,
                'average_monthly_expenditure_six_month' => $requests->average_monthly_expenditure_six_month,
                'average_monthly_profit_six_month' => $requests->average_monthly_profit_six_month,
                'business_type' => $requests->business_category,
                'business_type_detail' => $requests->business_type_detail,
                'total_employee' => $requests->total_employee,
                'full_address' => $requests->full_address,
                'kodepos' => $requests->office_zip_code,
            ]);

            User::where('id', Auth::id())->update(['step' => 3]);
            DB::commit();
        } catch (Exception $e) {
            $json = [
                "status" => false,
                "message" => $e->messages(),
            ];
            return response()->json($json);
            DB::rollback();
        }

        return response()->json([
            "status" => true,
            "message" => 'Informasi Usaha ditambahkan',
        ]);

    }

    public function post_document(Request $requests)
    {
        $validators = [
            'personal_id' => 'required',
            'photo_ktp' => 'required|image|mimes:png,jpg,jpeg|',
            'selfie_photo' => 'required|image|mimes:png,jpg,jpeg|',
            'photo_npwp' => 'required|image|mimes:png,jpg,jpeg|',
            'photo_salary_slip' => 'required|image|mimes:png,jpg|',
        ];

        $messagesvalidator = [
            'personal_id.required' => 'Form Informasi Pribadi tidak boleh kosong',
            'photo_ktp.image' => 'Foto KTP harus dalam format gambar',
            'photo_ktp.required' => 'Foto KTP tidak boleh kosong',
            'selfie_photo.required' => 'Swafoto tidak boleh kosong',
            'photo_npwp.required' => 'Foto NPWP tidak boleh kosong',
            'photo_salary_slip.required' => 'Foto Slip Gaji tidak boleh kosong',
        ];

        // $validation = Validator::make($requests->all(), $validators, $messagesvalidator);
        // if ($validation->fails()) {
        //     $json = [
        //         "status" => false,
        //         "message" => $validation->messages(),
        //     ];
        //     return response()->json($json);
        // }

        $imageData = [];
        $path = public_path() . '/upload/lender/individu/file/attachment';
        if ($requests->hasFile('photo_ktp')) {
            $photo_ktp = $requests->file('photo_ktp');
            $imageData['identity_image'] = 'lender_ktp' . Auth::id() . '_' . time() . '.' . $photo_ktp->getClientOriginalExtension();
            $photo_ktp->move($path, $imageData['identity_image']);
        }

        if ($requests->hasFile('selfie_photo')) {
            $selfie_photo = $requests->file('selfie_photo');
            $imageData['self_image'] = 'lender_self_image' . Auth::id() . '_' . time() . '.' . $selfie_photo->getClientOriginalExtension();
            $selfie_photo->move($path, $imageData['self_image']);
        }

        if ($requests->hasFile('photo_npwp')) {
            $photo_npwp = $requests->file('photo_npwp');
            $imageData['npwp_image'] = 'lender_npwp_image' . Auth::id() . '_' . time() . '.' . $photo_npwp->getClientOriginalExtension();
            $photo_npwp->move($path, $imageData['npwp_image']);
        }

        if ($requests->hasFile('photo_id_card')) {
            $photo_id_card = $requests->file('photo_id_card');
            $imageData['id_card_image'] = 'lender_id_card_image' . Auth::id() . '_' . time() . '.' . $photo_id_card->getClientOriginalExtension();
            $photo_id_card->move($path, $imageData['id_card_image']);
        }

        if ($requests->hasFile('photo_salary_slip')) {
            $photo_salary_slip = $requests->file('photo_salary_slip');
            $imageData['sallary_slip_image'] = 'lender_sallary_slip_image' . Auth::id() . '_' . time() . '.' . $photo_salary_slip->getClientOriginalExtension();
            $photo_salary_slip->move($path, $imageData['sallary_slip_image']);
        }

        DB::beginTransaction();
        try {
            LenderIndividualFile::updateOrCreate([
                'id_lender_individual' => $requests->personal_id,
            ], $imageData);

            User::where('id', Auth::id())->update(['step' => 4]);
            RequestFunding::updateOrCreate(['uid' => Auth::id()], ['uid' => Auth::id(), 'status' => 1]);

            //get user data
            $u = User::leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->select(
                    'users.email',
                    'users.phone_number_verified',
                    'lender_individual_personal_info.identity_number',
                    'lender_individual_personal_info.full_name',
                    'lender_individual_personal_info.dob',
                )
                ->where('users.id', Auth::id())
                ->first();

            //send data to privy
            $privy = new PrivyID();
            $privy->requestRegistration(
                $u->email,
                $u->phone_number_verified,
                $path .'/'. $imageData['self_image'],
                $path .'/'. $imageData['identity_image'],
                $u->identity_number,
                $u->full_name,
                $u->dob,
                Auth::id(),
                'individu'
            );

            DB::commit();
        } catch (Exception $e) {
            $json = [
                "status" => false,
                "message" => $e->messages(),
            ];
            return response()->json($json);
            DB::rollback();
        }

        return response()->json([
            "status" => true,
            "message" => 'Informasi Berkas ditambahkan',
        ]);
    }

    public function post_document_sme(Request $requests)
    {
        $validators = [
            'personal_id' => 'required',
            'photo_ktp' => 'required|image|mimes:png,jpg,jpeg|',
            'selfie_photo' => 'required|image|mimes:png,jpg,jpeg|',
            'photo_npwp' => 'required|image|mimes:png,jpg,jpeg|',
            'business_npwp_image' => 'required|image|mimes:png,jpg,jpeg|',
            'business_place_image' => 'required|image|mimes:png,jpg,jpeg|',
            'license_business_document_image' => 'required|image|mimes:png,jpg,jpeg|',
            'proof_of_ownership_image' => 'required|image|mimes:png,jpg,jpeg|',
            'document_image' => 'required|image|mimes:png,jpg,jpeg|',
            'business_activity_image' => 'required|image|mimes:png,jpg,jpeg|',
        ];

        $messagesvalidator = [
            'personal_id.required' => 'Form Informasi Pribadi tidak boleh kosong',
            'photo_ktp.image' => 'Foto KTP harus dalam format gambar',
            'photo_ktp.required' => 'Foto KTP tidak boleh kosong',
            'selfie_photo.required' => 'Swafoto tidak boleh kosong',
            'photo_npwp.required' => 'Foto NPWP tidak boleh kosong',
            'business_npwp_image.required' => 'Foto NPWP Usaha tidak boleh kosong',
            'business_place_image.required' => 'Foto Tempat Usaha tidak boleh kosong',
            'license_business_document_image.required' => 'Foto Foto Surat Izin Usaha atau Sejenisnya tidak boleh kosong',
            'proof_of_ownership_image.required' => 'Foto Bukti Kepemilikan / Kontrak Tempat Usaha tidak boleh kosong',
            'document_image.required' => 'Foto Dokumen Usaha tidak boleh kosong',
            'business_activity_image.required' => 'Foto Aktifitas Usaha tidak boleh kosong',
        ];

        $validation = Validator::make($requests->all(), $validators, $messagesvalidator);
        if ($validation->fails()) {
            $json = [
                "status" => false,
                "message" => $validation->messages(),
            ];
            return response()->json($json);
        }

        $imageData = [];
        $path = public_path() . '/upload/lender/individu/file/attachment';
        if ($requests->hasFile('photo_ktp')) {
            $photo_ktp = $requests->file('photo_ktp');
            $imageData['identity_image'] = 'lender_ktp' . Auth::id() . '_' . time() . '.' . $photo_ktp->getClientOriginalExtension();
            $photo_ktp->move($path, $imageData['identity_image']);
        }

        if ($requests->hasFile('selfie_photo')) {
            $selfie_photo = $requests->file('selfie_photo');
            $imageData['self_image'] = 'lender_self_image' . Auth::id() . '_' . time() . '.' . $selfie_photo->getClientOriginalExtension();
            $selfie_photo->move($path, $imageData['self_image']);
        }

        if ($requests->hasFile('photo_npwp')) {
            $photo_npwp = $requests->file('photo_npwp');
            $imageData['npwp_image'] = 'lender_npwp_image' . Auth::id() . '_' . time() . '.' . $photo_npwp->getClientOriginalExtension();
            $photo_npwp->move($path, $imageData['npwp_image']);
        }

        if ($requests->hasFile('business_npwp_image')) {
            $business_npwp_image = $requests->file('business_npwp_image');
            $imageData['business_npwp_image'] = 'lender_business_npwp_image' . Auth::id() . '_' . time() . '.' . $business_npwp_image->getClientOriginalExtension();
            $business_npwp_image->move($path, $imageData['business_npwp_image']);
        }

        if ($requests->hasFile('business_place_image')) {
            $business_place_image = $requests->file('business_place_image');
            $imageData['business_place_image'] = 'lender_business_place_image' . Auth::id() . '_' . time() . '.' . $business_place_image->getClientOriginalExtension();
            $business_place_image->move($path, $imageData['business_place_image']);
        }

        if ($requests->hasFile('license_business_document_image')) {
            $license_business_document_image = $requests->file('license_business_document_image');
            $imageData['license_business_document_image'] = 'lender_license_business_document_image' . Auth::id() . '_' . time() . '.' . $license_business_document_image->getClientOriginalExtension();
            $license_business_document_image->move($path, $imageData['license_business_document_image']);
        }

        if ($requests->hasFile('proof_of_ownership_image')) {
            $proof_of_ownership_image = $requests->file('proof_of_ownership_image');
            $imageData['proof_of_ownership_image'] = 'lender_proof_of_ownership_image' . Auth::id() . '_' . time() . '.' . $proof_of_ownership_image->getClientOriginalExtension();
            $proof_of_ownership_image->move($path, $imageData['proof_of_ownership_image']);
        }

        if ($requests->hasFile('document_image')) {
            $document_image = $requests->file('document_image');
            $imageData['document_image'] = 'lender_document_image' . Auth::id() . '_' . time() . '.' . $document_image->getClientOriginalExtension();
            $document_image->move($path, $imageData['document_image']);
        }

        if ($requests->hasFile('business_activity_image')) {
            $business_activity_image = $requests->file('business_activity_image');
            $imageData['business_activity_image'] = 'lender_business_activity_image' . Auth::id() . '_' . time() . '.' . $business_activity_image->getClientOriginalExtension();
            $business_activity_image->move($path, $imageData['business_activity_image']);
        }

        DB::beginTransaction();
        try {
            LenderIndividualFile::updateOrCreate([
                'id_lender_individual' => $requests->personal_id,
            ], $imageData);

            User::where('id', Auth::id())->update(['step' => 4]);
            RequestFunding::updateOrCreate(['uid' => Auth::id()], ['uid' => Auth::id(), 'status' => 1]);
            
            //get user data
            $u = User::leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->select(
                    'users.email',
                    'users.phone_number_verified',
                    'lender_individual_personal_info.identity_number',
                    'lender_individual_personal_info.full_name',
                    'lender_individual_personal_info.dob',
                )
                ->where('users.id', Auth::id())
                ->first();

            //send data to privy
            $privy = new PrivyID();
            $privy->requestRegistration(
                $u->email,
                $u->phone_number_verified,
                $path .'/'. $imageData['self_image'],
                $path .'/'. $imageData['identity_image'],
                $u->identity_number,
                $u->full_name,
                $u->dob,
                Auth::id(),
                'individu'
            );
            DB::commit();
        } catch (Exception $e) {
            $json = [
                "status" => false,
                "message" => $e->messages(),
            ];
            return response()->json($json);
            DB::rollback();
        }

        return response()->json([
            "status" => true,
            "message" => 'Informasi Berkas ditambahkan',
        ]);
    }

    public function get_sign()
    {
        $u = User::select('id', 'step')->where('users.id', Auth::id())->first();
        if ($u->step != 4 && $u->step != 5) {
            return $this->urlValidation($u);
        }
        $data = array(
            'sign_agreement' => User::select(
                'lender_individual_personal_info.*',
                'users.email'
            )
                ->leftJoin('lender_individual_personal_info', 'lender_individual_personal_info.uid', 'users.id')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.sign_agreement', $this->merge_response($data, static::$CONFIG));
    }

    public function post_sign(Request $requests)
    {
        User::where('id', Auth::id())->update(['step' => 5]);
        return response()->json([
            "status" => true,
            "message" => 'Berhasil Ditandatangani',
        ]);
    }
}
