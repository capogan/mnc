@extends('layouts.app_lender')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active text-light">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">1</a>
                    <p>Informasi Pribadi</p>
                </div>
                <div class="stepwizard-step" id="sme_occupation">
                    <a href="/profile/lender-individu/occupation/sme" type="button" class="btn btn-primary btn-circle"
                        disabled="disabled">2</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/document/sme" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">3</a>
                    <p>Berkas</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="sub-nav">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="service1">
                            <div class="tab-pane" id="lender-individu" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class=" bg-white ">
                                            <div class="contact-form mb60">
                                                <div class=" ">
                                                    <form id="form_register_lender_individu_occupation_sme">
                                                        <input type="hidden" name="lender_type_info" id="lender_type_info"
                                                            value="{{ isset($occupation_lender_individual_sme->lender_type) ? $occupation_lender_individual_sme->lender_type : '' }}">
                                                        <input type="hidden" name="personal_id" id="personal_id"
                                                            value="{{ isset($occupation_lender_individual_sme->personal_id) ? $occupation_lender_individual_sme->personal_id : '' }}">
                                                        <h3>Informasi Usaha</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Usaha <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Perusahaan" name="company_name"
                                                                    id="company_name"
                                                                    value="{{ isset($occupation_lender_individual_sme->company_name) ? $occupation_lender_individual_sme->company_name : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Telepon Perusahaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Telepon Perusahaan"
                                                                    name="company_phone_number" id="company_phone_number"
                                                                    value="{{ isset($occupation_lender_individual_sme->phone_number) ? $occupation_lender_individual_sme->phone_number : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Status Badan Hukum Usaha <span>*</span></h6>
                                                                <select class="form-control" id="business_legality"
                                                                    name="business_legality" style="width: 100%;">
                                                                    <option>Status Badan Hukum Usaha</option>
                                                                    @foreach ($legality as $key => $val)
                                                                        @if (isset($occupation_lender_individual_sme->id_business_legality))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $occupation_lender_individual_sme->id_business_legality == $val->id ? 'selected' : '' }}>
                                                                                {{ $val->legality_name }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->legality_name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Izin Usaha <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Izin Usaha" name="no_siup"
                                                                    id="no_siup"
                                                                    value="{{ isset($occupation_lender_individual_sme->no_siup) ? $occupation_lender_individual_sme->no_siup : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nomor NPWP Usaha <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Nomor NPWP Usaha"
                                                                        id="npwp_of_bussiness" name="npwp_of_bussiness"
                                                                        value="{{ isset($occupation_lender_individual_sme->no_npwp) ? $occupation_lender_individual_sme->no_npwp : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Tanggal Berdiri <span>*</span></h6>
                                                                <input type="date" class="form-control"
                                                                    placeholder="Tanggal Berdiri" name="founded_date"
                                                                    id="founded_date"
                                                                    value="{{ isset($occupation_lender_individual_sme->date_of_business_birth) ? $occupation_lender_individual_sme->date_of_business_birth : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Status Tempat Usaha <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <select class="form-control" id="business_place_status"
                                                                        name="business_place_status" style="width: 100%;">
                                                                        <option>Status Tempat Usaha</option>
                                                                        @foreach ($building_ownership_status as $key => $val)
                                                                            @if (isset($occupation_lender_individual_sme->business_place_status))
                                                                                <option value="{{ $val->id }}"
                                                                                    {{ $occupation_lender_individual_sme->business_place_status == $val->id ? 'selected' : '' }}>
                                                                                    {{ $val->place_status_name }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $val->id }}">
                                                                                    {{ $val->place_status_name }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Jenis Bidang Usaha <span>*</span></h6>
                                                                <select class="form-control " name="business_category"
                                                                    id="business_category">
                                                                    @foreach ($industry as $key => $val)
                                                                        @if (isset($occupation_lender_individual_sme->business_type))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $occupation_lender_individual_sme->business_type == $val->id ? 'selected' : '' }}>
                                                                                {{ $val->industry_sectore }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->industry_sectore }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Detil Jenis Bidang Usaha <span></span></h6>
                                                                <textarea class="form-control" name="business_type_detail"
                                                                    id="business_type_detail"> {{ isset($occupation_lender_individual_sme->business_type_detail) ? $occupation_lender_individual_sme->business_type_detail : '' }}</textarea>
                                                            </div>
                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h4>Informasi Alamat Tempat Usaha</h4>
                                                        <hr>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Propinsi <span>*</span></h6>
                                                                <select class="form-control" id="province" name="province"
                                                                    onChange="get_city(this.value);" style="width: 100%;">
                                                                    <option></option>
                                                                    @foreach ($provinces as $key => $val)
                                                                        @if (isset($occupation_lender_individual_sme->province))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $occupation_lender_individual_sme->province == $val->id ? 'selected' : '' }}>
                                                                                {{ $val->name }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kota <span>*</span></h6>
                                                                <select class="form-control" id="city" name="city"
                                                                    onchange="get_district(this.value)">
                                                                    @if (isset($occupation_lender_individual_sme->city))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual_sme->city }}">
                                                                            {{ $occupation_lender_individual_sme->districts_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kecamatan <span>*</span></h6>
                                                                <select class="form-control" id="district" name="district"
                                                                    onchange="get_villages(this.value)">
                                                                    @if (isset($occupation_lender_individual_sme->district))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual_sme->district }}">
                                                                            {{ $occupation_lender_individual_sme->regencies_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kelurahan <span>*</span></h6>
                                                                <select class="form-control" id="villages" name="villages">
                                                                    @if (isset($occupation_lender_individual_sme->villages))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual_sme->villages }}">
                                                                            {{ $occupation_lender_individual_sme->villages_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kode Pos <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Kode Pos" id="office_zip_code"
                                                                    name="office_zip_code"
                                                                    value="{{ isset($occupation_lender_individual_sme->kodepos) ? $occupation_lender_individual_sme->kodepos : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Alamat Lengkap Tempat Usaha <span>*</span></h6>
                                                                <textarea class="form-control" name="full_address"
                                                                    id="full_address"> {{ isset($occupation_lender_individual_sme->full_address) ? $occupation_lender_individual_sme->full_address : '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h4>Informasi Keuangan dan Karyawan</h4>
                                                        <hr>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Rata-Rata Penjualan per Bulan (6 Bulan Terakhir)
                                                                    <span>*</span>
                                                                </h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Rata-rata Penjualan per Bulan (6 Bulan Terakhir)"
                                                                    id="average_sales_revenue_six_month"
                                                                    name="average_sales_revenue_six_month"
                                                                    value="{{ isset($occupation_lender_individual_sme->average_sales_revenue_six_month) ? $occupation_lender_individual_sme->average_sales_revenue_six_month : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Rata-Rata Pengeluaran per Bulan (6 Bulan Terakhir)
                                                                    <span>*</span>
                                                                </h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Rata-rata Pengeluaran per Bulan (6 Bulan Terakhir)"
                                                                    id="average_monthly_expenditure_six_month"
                                                                    name="average_monthly_expenditure_six_month"
                                                                    value="{{ isset($occupation_lender_individual_sme->average_monthly_expenditure_six_month) ? $occupation_lender_individual_sme->average_monthly_expenditure_six_month : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Rata-Rata Keuntungan per Bulan (6 Bulan Terakhir)
                                                                    <span>*</span>
                                                                </h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Rata-rata Keuntungan per Bulan (6 Bulan Terakhir)"
                                                                    id="average_monthly_profit_six_month"
                                                                    name="average_monthly_profit_six_month"
                                                                    value="{{ isset($occupation_lender_individual_sme->average_monthly_profit_six_month) ? $occupation_lender_individual_sme->average_monthly_profit_six_month : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Total Karyawan Saat Ini <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Total Karyawan Saat Ini"
                                                                    id="total_employee" name="total_employee"
                                                                    value="{{ isset($occupation_lender_individual_sme->total_employee) ? $occupation_lender_individual_sme->total_employee : '' }}">
                                                            </div>
                                                        </div>


                                                        <div class="form-group mt-5 mb-5">
                                                            <button type="submit" data-text="Tambahkan Data"
                                                                id="btn_submit_individual_occupation_sme"
                                                                class="btn btn-primary btn-block"> Tambahkan Informasi
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .file_preview img {
            width: 35% !important;
            text-align: center;
        }

    </style>
@section('js')
    <script src="{{ asset('/script/lender-individu.js') }}"></script>
@endsection
@endsection
