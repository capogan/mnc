<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Education;
use App\LenderIndividualBankAccount;
use App\LenderIndividualEmergencyContact;
use App\LenderIndividualJobInformation;
use App\LenderIndividualPersonalInfo;
use App\MarriedStatus;
use App\MasterLengthOfWork;
use App\Models\Province;
use App\Siblings;
use App\StatusOfResidence;
use App\TotalEmployee;
use App\User;
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

    public function index(Request $request)
    {
        $step = LenderIndividualPersonalInfo::where('uid', Auth::id())->first();
        if (!$step) {
            return redirect('profile/lender-individu');
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
        $data = array(
            'provinces' => Province::get(),
            'employees' => TotalEmployee::get(),
            'occupation_lender_individual' => User::select(
                'lender_individual_business_info.*',
                'lender_individual_personal_info.lender_type',
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
        $data = array(
            'provinces' => Province::get(),
            'lender_profile' => User::select('lender_business.*', 'districts.name as districts_name', 'regencies.name as regencies_name', 'villages.name as villages_name', 'provinces.name as provinces_name', 'lender_bank_info.bank', 'lender_bank_info.rdl_number', 'lender_bank_info.rekening_name', 'lender_bank_info.rekening_number')
                ->leftJoin('lender_business', 'lender_business.uid', 'users.id')
                ->leftJoin('regencies', 'lender_business.id_regency', 'regencies.id')
                ->leftJoin('districts', 'lender_business.id_district', 'districts.id')
                ->leftJoin('villages', 'lender_business.id_village', 'villages.id')
                ->leftJoin('provinces', 'lender_business.id_province', 'provinces.id')
                ->leftJoin('lender_bank_info', 'lender_bank_info.uid', 'lender_business.uid')
                ->where('users.id', Auth::id())->first(),
        );
        return view('pages.lender.individu.document', $this->merge_response($data, static::$CONFIG));
    }

    public function post_profile(Request $requests)
    {
        $validators = [
            'identity_number' => 'required|integer',
            'full_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'whatsapp_number' => 'required',
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
            'kodepos' => 'required|integer',
            'emergency_name' => 'required',
            'relationship_as' => 'required',
            'emergency_phone' => 'required',
            'emergency_full_address' => 'required',
            'bank_id' => 'required',
            'rek_number' => 'required',
            'rek_name' => 'required',
            'no_hp_in_bank' => 'required',
            'lender_type' => 'required',
        ];

        $messagesvalidator = [
            'identity_number.required' => 'Nomor KTP tidak boleh kosong',
            'identity_number.integer' => 'Nomor KTP harus angka',
            'full_name.required' => 'Nama Lengkap tidak boleh kosong',
            'phone_number.required' => 'Nomor Telepon tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'whatsapp_number.required' => 'Nomor Whatsapp tidak boleh kosong',
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
            'kodepos.integer' => 'Kode Pos harus angka',
            'emergency_name.required' => 'Nama Kerabat tidak boleh kosong',
            'relationship_as.required' => 'Hubungan tidak boleh kosong',
            'emergency_phone.required' => 'Nomor Telepon Kerabat tidak boleh kosong',
            'emergency_full_address.required' => 'Alamat Kerabat tidak boleh kosong',
            'bank_id.required' => 'Nama Bank Penerima tidak boleh kosong',
            'rek_name.required' => 'Nama Rekening tidak boleh kosong',
            'rek_number.required' => 'Nomor Rekening tidak boleh kosong',
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
            'company_phone_number' => 'required',
            'npwp_of_bussiness' => 'required',
            'occupation' => 'required',
            'total_income' => 'required',
            'payment_date' => 'required',
            'length_of_work' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'villages' => 'required',
            'office_zip_code' => 'required',
            'full_address' => 'required',
        ];

        $messagesvalidator = [
            'personal_id.required' => 'Form Informasi Pribadi tidak boleh kosong',
            'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
            'company_phone_number.required' => 'Nomor Telepon Perusahaan tidak boleh kosong',
            'npwp_of_bussiness.required' => 'Nomor NPWP tidak boleh kosong',
            'occupation.required' => 'Pekerjaan tidak boleh kosong',
            'total_income.required' => 'Tingkat Pendapatan tidak boleh kosong',
            'payment_date.required' => 'Tanggal Penggajian Setiap Bulan tidak boleh kosong',
            'length_of_work.required' => 'Lama Waktu Bekerja',
            'province.required' => 'Propinsi tidak boleh kosong',
            'city.required' => 'Kota tidak boleh kosong',
            'district.required' => 'Kecamatan tidak boleh kosong',
            'villages.required' => 'Kelurahan tidak boleh kosong',
            'office_zip_code.required' => 'Kode Pos tidak boleh kosong',
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

        return response()->json([
            "status" => true,
            "message" => 'Informasi Pekerjaan ditambahkan',
        ]);

    }
}
