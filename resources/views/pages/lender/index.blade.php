@extends('layouts.app_lender')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
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
                    <a href="/profile/lender/" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/director" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Informasi Direktur</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/commissioner" type="button" class="btn btn-default btn-circle" >3</a>
                    <p>Informasi Komisaris</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/file" type="button" class="btn btn-default btn-circle">4</a>
                    <p>Informasi Dokumen</p>

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
                            <div class="tab-pane" id="Bisnis" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class=" bg-white ">
                                            <div class="contact-form mb60">
                                                <div class=" ">
                                                    <form id="form_lender_business_information">
                                                        <h3>Informasi Perusahaan</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Nama Perusahaan {{$lender_profile->lender_business}}<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Nama Usaha" id="name_of_bussiness" name="name_of_bussiness" value="{{isset($lender_profile->business_name) ? $lender_profile->business_name : ''}}">
                                                            </div>

                                                            <div class="col">
                                                                <h6>Nomor NPWP<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Nomor Npwp" id="npwp_of_bussiness" name="npwp_of_bussiness" value="{{isset($lender_profile->npwp) ? $lender_profile->npwp : ''}}">
                                                                <p id="id_cap_of_business_description"></p>
                                                            </div>

                                                        </div>
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Email<span>*</span></h6>
                                                                <input type="email"  class="form-control" placeholder="Alamat Email" id="email_of_bussiness" name="email_of_bussiness" value="{{isset($lender_profile->email) ? $lender_profile->email : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor Telepon<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Nomor Telepon" id="phone_of_bussiness" name="phone_of_bussiness" value="{{isset($lender_profile->phone_number) ? $lender_profile->phone_number : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Propinsi {{$lender_profile->provinces_name}} <span>*</span></h6>
                                                                <select class="form-control" id="province" name="province" onChange="get_city(this.value);" style="width: 100%;">
                                                                    <option></option>
                                                                    @foreach($provinces as $key => $val)
                                                                            <option value="{{$val->id}}"  {{ $lender_profile->id_province == $val->id ? "selected" : "" }}>{{$val->name}}</option>--}}
                                                                            
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kota <span>*</span></h6>
                                                                <select class="form-control" id="city" name="city" onchange="get_district(this.value)">
                                                                    <option value="{{$lender_profile->id_regency}}" selected>{{$lender_profile->regencies_name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col">
                                                                <h6>Kecamatan <span>*</span></h6>
                                                                <select class="form-control" id="district" name="district" onchange="get_villages(this.value)" >
                                                                    {{--                                        @if(isset($get_user->district ))--}}
                                                                    {{--                                            <option value="{{$get_user->district}}">{{$get_user->personal_district}}</option>--}}
                                                                    {{--                                        @endif--}}
                                                                    <option value="{{$lender_profile->id_district}}">{{$lender_profile->districts_name}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Kelurahan <span>*</span></h6>
                                                                <select class="form-control" id="vilages" name="vilages">
                                                                    {{--                                        @if(isset($get_user->villages ))--}}
                                                                    {{--                                            <option value="{{$get_user->villages}}">{{$get_user->personal_villages}}</option>--}}
                                                                    {{--                                        @endif--}}
                                                                    <option value="{{$lender_profile->id_village}}">{{$lender_profile->villages_name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5 mb-4">
                                                            <div class="col">
                                                                <h6>Address<span>*</span></h6>
                                                                <textarea class="form-control" id="address_of_bussiness" name="address_of_bussiness">{{isset($lender_profile->address) ? $lender_profile->address : ''}}</textarea>
                                                            </div>
                                                            <div class="col">
                                                                <h6>Website</h6>
                                                                <input type="text"  class="form-control" placeholder="Nama Website" id="website_of_bussiness" name="website_of_bussiness" value="{{isset($lender_profile->website) ? $lender_profile->website : ''}}">
                                                            </div>
                                                        </div>

                                                        <h3>Informasi Sertifikat Perusahaan</h3>
                                                        <hr>

                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Nomor Induk Berusaha (NIB)<span>*</span></h6>
                                                                <input type="text" class="form-control" placeholder="Nomor Induk Berusaha (NIB)" id="nib_of_bussiness" name="nib_of_bussiness" value="{{isset($lender_profile->induk_berusaha_number) ? $lender_profile->induk_berusaha_number : ''}}">
                                                            </div>

                                                            <div class="col">
                                                                <h6>Nomor Tanda Terdaftar Perusahaan (TDP)<span>*</span></h6>
                                                                <input type="text" class="form-control" placeholder="Nomor Tanda Terdaftar Perusahaan (TDP)" id="tdp_number" name="tdp_number" value="{{isset($lender_profile->tdp_number) ? $lender_profile->tdp_number : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5 mb-4">
                                                            <div class="col">
                                                                <h6>Akta pendirian & tanggal<span>*</span></h6>
                                                                <input type="text" class="form-control" placeholder="Akta pendirian & tanggal" id="akta_pendirian" name="akta_pendirian" value="{{isset($lender_profile->akta_pendirian) ? $lender_profile->akta_pendirian : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor pengesahaan KEMENKUMHAM AHU<span>*</span> </h6>
                                                                <input type="text" class="form-control" placeholder="Nomor pengesahaan KEMENKUMHAM AHU" id="number_register_kemenkunham" name="number_register_kemenkunham" value="{{isset($lender_profile->letter_register_pengesahan_kemenkunham) ? $lender_profile->letter_register_pengesahan_kemenkunham : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5 mb-4">
                                                            <div class="col">
                                                                <h6>Akta perubahan terakhir & tanggal</h6>
                                                                <input type="text"  class="form-control" placeholder="Akta perubahan terakhir & tanggal" id="akta_perubahan" name="akta_perubahan" value="{{isset($lender_profile->last_akta_perubahan) ? $lender_profile->last_akta_perubahan : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nomor pengesahaan KEMENKUMHAM AHU </h6>
                                                                <input type="text"  class="form-control" placeholder="Nomor pengesahaan KEMENKUMHAM AHU" id="letter_change_pengesahan_kemenkunham" name="letter_change_pengesahan_kemenkunham" value="{{isset($lender_profile->letter_change_pengesahan_kemenkunham) ? $lender_profile->letter_change_pengesahan_kemenkunham : ''}}">
                                                            </div>
                                                        </div>

                                                        <h3>Informasi Aset</h3>
                                                        <hr>

                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <h6>Jumlah Setoran Modal<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Jumlah Setoran Modal" id="amount_setoran_modal" name="amount_setoran_modal" value="{{isset($lender_profile->amount_setoran_modal) ? $lender_profile->amount_setoran_modal : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Wajib Pajak<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Wajib Pajak" id="taxpayer" name="taxpayer" value="{{isset($lender_profile->taxpayer) ? $lender_profile->taxpayer : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <h6>Nilai Aset<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Nilai Aset" id="asset_value" name="asset_value" value="{{isset($lender_profile->asset_value) ? $lender_profile->asset_value : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Nilai Ekuitas<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Nilai Ekuitas" id="equity_value" name="equity_value" value="{{isset($lender_profile->equity_value) ? $lender_profile->equity_value : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <h6>Kewajiban Jangka Pendek<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Kewajiban Jangka Pendek" id="short_term_liabilities" name="short_term_liabilities" value="{{isset($lender_profile->short_term_obligations) ? $lender_profile->short_term_obligations : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Pendapatan Tahun berjalan sampai dengan saat ini<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Pendapatan Tahun berjalan sampai dengan saat ini" id="income_year" name="income_year" value="{{isset($lender_profile->annual_income) ? $lender_profile->annual_income : ''}}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <div class="col">
                                                                <h6>Beban Operasional tahun berjalan sampai dengan saat ini<span>*</span></h6>
                                                                <input type="text"  class="form-control" placeholder="Beban Operasional tahun berjalan sampai dengan saat ini" id="operating_expenses" name="operating_expenses" value="{{isset($lender_profile->operating_expenses) ? $lender_profile->operating_expenses : ''}}">
                                                            </div>
                                                            <div class="col">
                                                                <h6>Laba - Rugi periode Tahun berjalan sampai dengan saat ini</h6>
                                                                <input type="text"  class="form-control" placeholder="Laba - Rugi periode Tahun berjalan sampai dengan saat ini" id="profit_loss" name="profit_loss" value="{{isset($lender_profile->profit_and_loss) ? $lender_profile->profit_and_loss : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-5">
                                                            <button type="submit" id="qwe" data-text="Tambahkan Data" class="btn btn-primary btn-block"> Simpan & lanjutkan </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.section title start-->
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
    .file_preview img{
        width: 35% !important;
        text-align: center;
    }
    </style>
@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
