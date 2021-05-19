@extends('layouts.app_lender')
@section('content')
    <div class="container containers-with-margin">
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
                <div class="stepwizard-step" id="non_sme_occupation">
                    <a href="/profile/lender-individu/occupation" type="button" class="btn btn-primary btn-circle">2</a>
                    <p>Informasi Pekerjaan</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/document" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">3</a>
                    <p>Berkas</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/sign" type="button" class="btn btn-default btn-circle">4</a>
                    <p>Tanda Tangan</p>
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
                                                    <form id="form_register_lender_individu_occupation">
                                                        <input type="hidden" name="lender_type_info" id="lender_type_info"
                                                            value="{{ isset($occupation_lender_individual->lender_type) ? $occupation_lender_individual->lender_type : '' }}">
                                                        <input type="hidden" name="personal_id" id="personal_id"
                                                            value="{{ isset($occupation_lender_individual->personal_id) ? $occupation_lender_individual->personal_id : '' }}">
                                                        <h3>Informasi Pekerjaan</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Perusahaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Perusahaan" name="company_name"
                                                                    id="company_name"
                                                                    value="{{ isset($occupation_lender_individual->company_name) ? $occupation_lender_individual->company_name : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Telepon Perusahaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Telepon Perusahaan"
                                                                    name="company_phone_number" id="company_phone_number"
                                                                    value="{{ isset($occupation_lender_individual->company_phone_number) ? $occupation_lender_individual->company_phone_number : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nomor NPWP <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Nomor NPWP" id="npwp_of_bussiness"
                                                                        name="npwp_of_bussiness"
                                                                        value="{{ isset($occupation_lender_individual->npwp) ? $occupation_lender_individual->npwp : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Pekerjaan <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Pekerjaan" name="occupation"
                                                                    id="occupation"
                                                                    value="{{ isset($occupation_lender_individual->job) ? $occupation_lender_individual->job : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Tingkat Pendapatan <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Tingkat Pendapatan" id="total_income"
                                                                        name="total_income"
                                                                        value="{{ isset($occupation_lender_individual->payment_level) ? $occupation_lender_individual->payment_level : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Tanggal Penggajian <span>*</span></h6>
                                                                <input class="form-control" type="text" name="payment_date"
                                                                    id="payment_date"
                                                                    value="{{ isset($occupation_lender_individual->payment_date) ? $occupation_lender_individual->payment_date : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Lama Waktu Bekerja<span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <select class="form-control select2" id="length_of_work"
                                                                        name="length_of_work">
                                                                        <option>Lama Waktu Bekerja</option>
                                                                        @foreach ($length_of_work as $val)
                                                                            @if (isset($occupation_lender_individual->id_length_work))
                                                                                <option value="{{ $val->id }}"
                                                                                    {{ $occupation_lender_individual->id_length_work == $val->id ? 'selected' : '' }}>
                                                                                    {{ $val->length_of_work }}</option>
                                                                            @else
                                                                                <option value="{{ $val->id }}">
                                                                                    {{ $val->length_of_work }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>

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
                                                                        @if (isset($occupation_lender_individual->province))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $occupation_lender_individual->province == $val->id ? 'selected' : '' }}>
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
                                                                    @if (isset($occupation_lender_individual->city))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual->city }}">
                                                                            {{ $occupation_lender_individual->districts_name }}
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
                                                                    @if (isset($occupation_lender_individual->district))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual->district }}">
                                                                            {{ $occupation_lender_individual->regencies_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kelurahan <span>*</span></h6>
                                                                <select class="form-control" id="villages" name="villages">
                                                                    @if (isset($occupation_lender_individual->villages))
                                                                        <option
                                                                            value="{{ $occupation_lender_individual->villages }}">
                                                                            {{ $occupation_lender_individual->villages_name }}
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
                                                                    value="{{ isset($occupation_lender_individual->kode_pos) ? $occupation_lender_individual->kode_pos : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Alamat <span>*</span></h6>
                                                                <textarea class="form-control" name="full_address"
                                                                    id="full_address"> {{ isset($occupation_lender_individual->company_full_address) ? $occupation_lender_individual->company_full_address : '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mt-5">
                                                            <button type="submit" data-text="Tambahkan Informasi"
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
