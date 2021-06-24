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

                            <form id="form_additional_rdl" method="POST"  autocomplete="off">
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Nama Lengkap<span>*</span></h6>
                                        <input type="text" name="nama"  class="form-control" placeholder="Nama Lengkap" >
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Account Number<span>*</span></h6>
                                        <input type="text" name="account"   class="form-control" placeholder="Account Number" >
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>NIK<span>*</span></h6>
                                        <input type="text" name="nik"  class="form-control" placeholder="Nik" >
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>CIF Number<span>*</span></h6>
                                        <input type="text" name="cif"  class="form-control" placeholder="Cif Number" >
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h6>Branch Opening<span>*</span></h6>
                                        <input type="text" name="branch"  class="form-control" placeholder="Branch Opening" >
                                    </div>
                                </div>
                            </form>

                            <div class="row mt-12 text-center">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="create_rdl_account_business">Daftarkan Akun</button>
                                </div>
                            <div>
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
.mt-5{
    margin-top: 1.0rem!important;
}
    </style>
@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
