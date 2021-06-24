@extends('layouts.app_lender')
@section('content')
<style>

    .lead{
        text-align: justify;
    }

</style>

<div class="container containers-with-margin">
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
                    <a href="/profile/lender/" type="button" class="btn btn-default btn-circle" >1</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/director" type="button" class="btn btn-default  btn-circle">2</a>
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
                <div class="stepwizard-step">
                    <a href="/profile/lender/register/sign" type="button" class="btn btn-primary btn-circle" disabled="disabled">5</a>
                    <p>Verifikasi</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="sub-nav">
                    <div class="tab-content">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                <div class="tab-pane" id="Bisnis" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <div class=" bg-white ">
                                                <div class="contact-form mb60">
                                                    <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                                                        <div class="wrapper-content bg-white">
                                                            <div class="section-scroll pinside60" id="section-about">
                                                                {{-- <input type="hidden" name="lender_type_info"
                                                                    id="lender_type_info"
                                                                    value="{{ isset($sign_agreement->lender_type) ? $sign_agreement->lender_type : '' }}">
                                                                <input type="hidden" name="personal_id" id="personal_id"
                                                                    value="{{ isset($sign_agreement->personal_id) ? $sign_agreement->personal_id : '' }}"> --}}
                                                                <h2>KETENTUAN TANDA TANGAN DIGITAL PADA PERJANJIAN PINJAMAN</h2>
                                                                <p class="lead">PT, Siap dalam menyediakan layanan tanda tangan Eletronik bekerja sama dengan Platform Digisign. sehingga dalam hal ini Anda diharuskan untuk melakukan pendaftaran pada platform Digisign.</p>
                                                                @if ($sign_agreement)

                                                                        <p class="lead">PT. sistem informasi dan aplikasi pembiayaan [SIAP] menerapkan tanda tangan digital dalam setiap penandatanganan perjanjian pinjam meminjam uang dalam layanan SIAP.
                                                                            PT. SIAP menyediakan layanan tanda tangan elektronik yang baik dan berkualitas dalam membantu interaksi dengan peminjam dan pemberi pinjamannya.
                                                                            Berikut ini adalah Informasi tentang Tanda Tangan Digital ;
                                                                        </p>

                                                                    <hr>
                                                                    @if($sign_agreement->status_activation != 'active')
                                                                        <a href="#" id="activate_account_dgsign" type="button" class="btn btn-primary">Aktivasi Akun</a>
                                                                    @endif
                                                                    @if($sign_agreement->status_activation == 'active')
                                                                        <button type="button" class="btn btn-primary"
                                                                        id="btn_sign_agreement_lender_individu">Lanjutkan Proses Tanda Tangan</button>
                                                                    @endif
                                                                @else
                                                                    <div class="row">
                                                                        <div class="alert alert-success" role="alert">
                                                                            Mohon Maaf, Permintaan anda belum dapat kami setujui.
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
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
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tanda Tangan Perjanjian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="bank-account-tabs st-tabs">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="service1">
                        <h3>To open a Borrow Life account, you must:</h3>
                        <ul class="list-unstyled">
                            <li>Be aged 18+ (if you're under 18, check out our Borrow Savings account); and</li>
                            <li>Have a Borrow everyday account.</li>
                            <li>Vivamus at ultricies tortor, vel volutpat neque.</li>
                            <li>In justo turpis, aliquam id suscipit vel, suscipit eget nisl. </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary" id="sign_agreement_" >Setuju</button>
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

