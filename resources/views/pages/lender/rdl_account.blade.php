@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row">
        <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
            <div class="mb100 text-center section-title">
            </div>
        </div>
        <div class="col-md-12">
            <div class="wrapper-content bg-white ">
                <div class="about-section pinside40">
                    <div class="row">

                        <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="text-center">
                                <h2>Rekening Dana Lender (RDL)</h2>
                                <p class="lead">Anda belum memiliki akun RDL (Rekening Dana Lender). Untuk Membuat rekening, silahkan isi data tambahn dan klik "Daftarkan Akun"</p>
                            </div>
                            <div class="result-message"></div>
                            @if($u->individuinfo->full_name)
                            <form id="form_additional_rdl" method="POST"  autocomplete="off">
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Nama Lengkap<span>*</span></h6>
                                        <input type="email"  class="form-control" placeholder="Nama Lengkap" value="{{$u->individuinfo->full_name ? $u->individuinfo->full_name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Email<span>*</span></h6>
                                        <input type="email"  class="form-control" placeholder="Alamat Email" value="{{Auth::user()->email}}" disabled>
                                    </div>
                                    <div class="col">
                                        <h6>Nomor Telepon<span>*</span></h6>
                                        <input type="text"  class="form-control" placeholder="Nomor Telepon" value="{{Auth::user()->phone_number_verified}}" disabled>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>RT<span>*</span></h6>
                                        <input type="email" maxlength="3"  class="form-control" placeholder="RT (contoh '001')" name="rt" value="{{$u->individuinfo->rt}}">
                                    </div>
                                    <div class="col">
                                        <h6>RW<span>*</span></h6>
                                        <input type="text" maxlength="3"  class="form-control" placeholder="RW (contoh '003')" name="rw" value="{{$u->individuinfo->rw}}">
                                    </div>
                                    <div class="col">
                                        <h6>PERUM<span>*</span></h6>
                                        <input type="text"  class="form-control" placeholder="Perum" name="perum" value="{{$u->individuinfo->perum}}">
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Agama<span>*</span></h6>
                                        <select class="form-control" id="province" name="religion" style="width: 100%;">
                                            <option></option>
                                            @foreach($religion as $key => $val)
                                                <option value="{{$val->id}}"  {{ $u->individuinfo->religion == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br/>
                            </form>
                            @endif
                            <div class="row mt-12 text-center">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="create_rdl_account_">Daftarkan Akun</button>
                                </div>
                            <div>
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
.mt-5{
    margin-top: 1.0rem!important;
}
    </style>
@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
