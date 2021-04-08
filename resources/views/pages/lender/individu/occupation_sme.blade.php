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
                    <a href="/profile/lender-individu/document" type="button" class="btn btn-default btn-circle"
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
                                                            value="{{ isset($occupation_lender_individual->lender_type) ? $occupation_lender_individual->lender_type : '' }}">
                                                        <input type="hidden" name="personal_id" id="personal_id"
                                                            value="{{ isset($occupation_lender_individual->personal_id) ? $occupation_lender_individual->personal_id : '' }}">
                                                        <h3>Informasi Usaha</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Perusahaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Perusahaan" name="company_name"
                                                                    id="company_name" value="">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Telepon Perusahaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Telepon Perusahaan"
                                                                    name="company_phone_number" id="company_phone_number"
                                                                    value="">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nomor NPWP <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Nomor NPWP" id="npwp_of_bussiness"
                                                                        name="npwp_of_bussiness"
                                                                        value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Pekerjaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Pekerjaan" name="occupation"
                                                                    id="occupation" value="">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Tingkat Pendapatan <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="number" class="form-control group3"
                                                                        placeholder="Tingkat Pendapatan" id="total_income"
                                                                        name="total_income" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Tanggal Penggajian Setiap Bulan <span>*</span></h6>
                                                                <input type="number" class="form-control group3"
                                                                    placeholder="Tanggal Penggajian Setiap Bulan"
                                                                    id="payday_date" name="payday_date" value="">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Lama Waktu Bekerja<span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="number" class="form-control group3"
                                                                        placeholder="Lama Waktu Bekerja" id="working_time"
                                                                        name="working_time" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Propinsi <span>*</span></h6>
                                                                <select class="form-control" id="province" name="province"
                                                                    onChange="get_city(this.value);" style="width: 100%;">
                                                                    <option></option>
                                                                    @foreach ($provinces as $key => $val)
                                                                        @if (isset($get_user->province))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $get_user->province == $val->id ? 'selected' : '' }}>
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
                                                                    @if (isset($get_user->city))
                                                                        <option value="{{ $get_user->city }}">
                                                                            {{ $get_user->personal_city }}</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kecamatan <span>*</span></h6>
                                                                <select class="form-control" id="district" name="district"
                                                                    onchange="get_villages(this.value)">
                                                                    @if (isset($get_user->district))
                                                                        <option value="{{ $get_user->district }}">
                                                                            {{ $get_user->personal_district }}</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kelurahan <span>*</span></h6>
                                                                <select class="form-control" id="vilages" name="vilages">
                                                                    @if (isset($get_user->villages))
                                                                        <option value="{{ $get_user->villages }}">
                                                                            {{ $get_user->personal_villages }}</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kode Pos <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Kode Pos" id="zip_code" name="zip_code"
                                                                    value="{{ isset($get_user->zip_code) ? $get_user->zip_code : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Alamat <span>*</span></h6>
                                                                <textarea class="form-control" name="full_address"
                                                                    id="full_address"> {{ isset($get_user->full_address) ? $get_user->full_address : '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mt-5">
                                                            <button type="submit" data-text="Tambahkan Data"
                                                                id="btn_submit_individual_occupation"
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
