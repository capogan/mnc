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
                    <a href="/profile/lender-individu/" type="button" data-text="1" class="btn btn-primary btn-circle">1</a>
                    <p>Informasi Pribadi</p>
                </div>
                <div class="stepwizard-step" id="non_sme_occupation">
                    <a href="/profile/lender-individu/occupation" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">2</a>
                    <p>Informasi Pekerjaan</p>
                </div>
                <div class="stepwizard-step" id="sme_occupation">
                    <a href="/profile/lender-individu/occupation/sme" type="button" class="btn btn-default btn-circle"
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
                                                    <form id="form_register_lender_individu_information">
                                                        <input type="hidden" name="id_personal_info" id="id_personal_info"
                                                        value="{{ isset($lender_individual_personal_info->id) ? $lender_individual_personal_info->id : '' }}">
                                                        <input type="hidden" name="lender_type_info" id="lender_type_info"
                                                            value="{{ isset($lender_individual_personal_info->lender_type) ? $lender_individual_personal_info->lender_type : '' }}">
                                                        <h3>Informasi Pribadi</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Jenis Lender Individu <span>*</span></h6>
                                                                <select class="form-control select2" id="lender_type"
                                                                    name="lender_type">
                                                                    @foreach ($lender_type as $k => $val)
                                                                        @if (isset($lender_individual_personal_info->lender_type))
                                                                            <option value="{{ $k }}"
                                                                                {{ $lender_individual_personal_info->lender_type == $k ? 'selected' : '' }}>
                                                                                {{ $val }}</option>
                                                                        @else
                                                                            <option value="{{ $k }}">
                                                                                {{ $k == 1 ? 'selected' : '' }}
                                                                                {{ $val }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>No KTP <span>*</span></h6>
                                                                <input type="text" class="form-control" placeholder="No KTP"
                                                                    name="identity_number" id="identity_number"
                                                                    value="{{ isset($lender_individual_personal_info->identity_number) ? $lender_individual_personal_info->identity_number : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Nama Lengkap <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Lengkap" name="full_name"
                                                                    id="full_name"
                                                                    value="{{ isset($lender_individual_personal_info->full_name) ? $lender_individual_personal_info->full_name : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nomor Telepon <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Telepon" id="phone_number"
                                                                    name="phone_number"
                                                                    value="{{ Auth::user()->phone_number_verified }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Whatsapp <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Whatsapp" id="whatsapp_number"
                                                                    name="whatsapp_number"
                                                                    value="{{ isset($lender_individual_personal_info->whatsapp_number) ? $lender_individual_personal_info->whatsapp_number : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Email <span>*</span></h6>
                                                                <input type="text" class="form-control" placeholder="Email"
                                                                    name="email" id="email"
                                                                    value="{{ isset($lender_individual_personal_info->email) ? $lender_individual_personal_info->email : '' }}"
                                                                    readonly>
                                                            </div>

                                                            <div class="col">
                                                                <br>
                                                                <h6>Jenis Kelamin <span>*</span></h6>
                                                                @if (isset($lender_individual_personal_info->gender) == 'male')
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="male" value="male" checked>
                                                                        <label class="form-check-label" for="male">Laki -
                                                                            Laki</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="female" value="female">
                                                                        <label class="form-check-label"
                                                                            for="female">Perempuan</label>
                                                                    </div>
                                                                @elseif(isset($lender_individual_personal_info->gender)
                                                                    == 'female')
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="male" value="male">
                                                                        <label class="form-check-label" for="male">Laki -
                                                                            Laki</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="female" value="female"
                                                                            checked>
                                                                        <label class="form-check-label"
                                                                            for="female">Perempuan</label>
                                                                    </div>
                                                                @else
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="male" value="male">
                                                                        <label class="form-check-label" for="male">Laki -
                                                                            Laki</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="female" value="female">
                                                                        <label class="form-check-label"
                                                                            for="female">Perempuan</label>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Tempat Lahir <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tempat Lahir" name="pob" id="pob"
                                                                    value="{{ isset($lender_individual_personal_info->pob) ? $lender_individual_personal_info->pob : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Tanggal Lahir <span>*</span></h6>
                                                                <input class="form-control" type="date" name="dob"
                                                                    id="dob"
                                                                    value="{{ isset($lender_individual_personal_info->dob) ? $lender_individual_personal_info->dob : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Pendidikan Terakhir <span>*</span></h6>
                                                                <select class="form-control select2" id="education"
                                                                    name="education">
                                                                    <option>Pilih Pendidikan</option>
                                                                    @foreach ($education as $val)
                                                                        @if (isset($lender_individual_personal_info->education))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->education == $val->id ? 'selected' : '' }}>
                                                                                {{ $val->level }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->level }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nama Ibu Kandung <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Ibu Kandung" id="mother_name"
                                                                    name="mother_name"
                                                                    value="{{ isset($lender_individual_personal_info->mother_name) ? $lender_individual_personal_info->mother_name : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Status Pernikahan <span>*</span></h6>
                                                                <select class="form-control" id="married_status"
                                                                    name="married_status">
                                                                    <option value="">Pilih Status Pernikahan</option>
                                                                    @foreach ($married_status as $val)
                                                                        @if (isset($lender_individual_personal_info->married_status))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->married_status == $val->id ? 'selected' : '' }}>
                                                                                {{ ucwords($val->status) }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ ucwords($val->status) }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4" id="sme_resident">
                                                            <div class="col">
                                                                <h6>Status Tempat Tinggal <span>*</span></h6>
                                                                <select class="form-control" id="status_of_residence"
                                                                    name="status_of_residence">
                                                                    <option value="">Pilih Status Tempat Tinggal</option>
                                                                    @foreach ($status_of_residence as $val)
                                                                        @if (isset($lender_individual_personal_info->status_of_residence))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->status_of_residence == $val->id ? 'selected' : '' }}>
                                                                                {{ ucwords($val->name) }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ ucwords($val->name) }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col">
                                                                <h6>Nomor NPWP <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Nomor NPWP" id="no_npwp" name="no_npwp"
                                                                        value="{{ isset($lender_individual_personal_info->no_npwp) ? $lender_individual_personal_info->no_npwp : '' }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4" id="sme_cc">
                                                            <div class="col">
                                                                <h6>Jumlah Kartu Kredit <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="number" class="form-control group3"
                                                                        placeholder="Jumlah Kartu Kredit"
                                                                        id="total_credit_card" name="total_credit_card"
                                                                        value="{{ isset($lender_individual_personal_info->total_credit_card) ? $lender_individual_personal_info->total_credit_card : '' }}">
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4" id="sme_bpjs">
                                                            <div class="col">
                                                                <h6>No BPJS TK <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="number" class="form-control group3"
                                                                        placeholder="No BPJS TK" id="no_bpjs_tk"
                                                                        name="no_bpjs_tk"
                                                                        value="{{ isset($lender_individual_personal_info->no_bpjs_tk) ? $lender_individual_personal_info->no_bpjs_tk : '' }}">
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <h6>No BPJS Kesehatan <span>*</span></h6>
                                                                <div class="form-group input-group">
                                                                    <input type="text" class="form-control group3"
                                                                        placeholder="Nomor BPJS Kesehatan"
                                                                        id="no_bpjs_kesehatan" name="no_bpjs_kesehatan"
                                                                        value="{{ isset($lender_individual_personal_info->no_bpjs_kesehatan) ? $lender_individual_personal_info->no_bpjs_kesehatan : '' }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Propinsi <span>*</span></h6>
                                                                <select class="form-control" id="province" name="province"
                                                                    onChange="get_city(this.value);" style="width: 100%;">
                                                                    <option>Pilih Propinsi</option>
                                                                    @foreach ($provinces as $key => $val)
                                                                        @if (isset($lender_individual_personal_info->province))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->province == $val->id ? 'selected' : '' }}>
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
                                                                    <option>Pilih Kab/Kota</option>
                                                                    @if (isset($lender_individual_personal_info->city))
                                                                        <option
                                                                            value="{{ $lender_individual_personal_info->city }}"
                                                                            {{ $lender_individual_personal_info->city == $lender_individual_personal_info->city ? 'selected' : '' }}>
                                                                            {{ $lender_individual_personal_info->regencies_name }}
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
                                                                    <option>Pilih Kecamatan</option>
                                                                    @if (isset($lender_individual_personal_info->district))
                                                                        <option
                                                                            value="{{ $lender_individual_personal_info->district }}"
                                                                            {{ $lender_individual_personal_info->district == $lender_individual_personal_info->district ? 'selected' : '' }}>
                                                                            {{ $lender_individual_personal_info->districts_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kelurahan <span>*</span></h6>
                                                                <select class="form-control" id="villages" name="villages">
                                                                    <option>Pilih Kelurahan</option>
                                                                    @if (isset($lender_individual_personal_info->villages))
                                                                        <option
                                                                            value="{{ $lender_individual_personal_info->villages }}"
                                                                            {{ $lender_individual_personal_info->villages == $lender_individual_personal_info->villages ? 'selected' : '' }}>
                                                                            {{ $lender_individual_personal_info->villages_name }}
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kode Pos <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Kode Pos" id="kodepos" name="kodepos"
                                                                    value="{{ isset($lender_individual_personal_info->kodepos) ? $lender_individual_personal_info->kodepos : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Alamat <span>*</span></h6>
                                                                <textarea class="form-control" name="full_address"
                                                                    id="full_address"> {{ isset($lender_individual_personal_info->full_address) ? $lender_individual_personal_info->full_address : '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <h3>Informasi Kerabat</h3>
                                                        <hr>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Kerabat <span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Kerabat" id="emergency_name"
                                                                    name="emergency_name"
                                                                    value="{{ isset($lender_individual_personal_info->emergency_name) ? $lender_individual_personal_info->emergency_name : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Hubungan <span>*</span></h6>
                                                                <select class="form-control" name="relationship_as"
                                                                    id="relationship_as">
                                                                    <option value="">Pilih Hubungan</option>
                                                                    @foreach ($siblings as $val)
                                                                        @if (isset($lender_individual_personal_info->emergency_siblings))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->emergency_siblings == $val->id ? 'selected' : '' }}>
                                                                                {{ ucwords($val->sibling_name) }}
                                                                            </option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ ucwords($val->sibling_name) }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nomor Telepon Kerabat<span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nomor Telepon Kerabat" id="emergency_phone"
                                                                    name="emergency_phone"
                                                                    value="{{ isset($lender_individual_personal_info->emergency_phone_number) ? $lender_individual_personal_info->emergency_phone_number : '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Alamat Kerabat <span>*</span></h6>
                                                                <textarea class="form-control" name="emergency_full_address"
                                                                    id="emergency_full_address">{{ isset($lender_individual_personal_info->emergency_full_address) ? $lender_individual_personal_info->emergency_full_address : '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h3>Informasi Bank</h3>
                                                        <hr>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Bank Penerima<span>*</span></h6>
                                                                <select class="form-control" id="bank_id" name="bank_id">
                                                                    <option value="">Pilih Bank</option>
                                                                    @foreach ($bank as $key => $val)
                                                                        @if (isset($lender_individual_personal_info->id_bank))
                                                                            <option value="{{ $val->id }}"
                                                                                {{ $lender_individual_personal_info->id_bank == $val->id ? 'selected' : '' }}>
                                                                                {{ $val->bank_name }}</option>
                                                                        @else
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->bank_name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Rekening<span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Contoh : 912389127492" id="rek_number"
                                                                    name="rek_number"
                                                                    value="{{ isset($lender_individual_personal_info->account_number) ? $lender_individual_personal_info->account_number : '' }}">
                                                                <p id="id_cap_of_business_description"></p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Nama Rekening<span>*</span></h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder=" Nama Rekening " id="rek_name"
                                                                    name="rek_name"
                                                                    value="{{ isset($lender_individual_personal_info->account_name) ? $lender_individual_personal_info->account_name : '' }}">
                                                            </div>

                                                            <div class="col">
                                                                <h6>Nomor Telepon yang Didaftarkan di Bank<span>*</span>
                                                                </h6>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Contoh : 085246956558" id="no_hp_in_bank"
                                                                    name="no_hp_in_bank"
                                                                    value="{{ isset($lender_individual_personal_info->phone_number_register_in_bank) ? $lender_individual_personal_info->phone_number_register_in_bank : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mt-4">
                                                            <button type="submit" id="btn_submit_lender_individu"
                                                                data-text="Tambahkan Data"
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
