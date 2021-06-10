@extends('layouts.app')
    @section('content')

    <div class="container containers-with-margin">
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
                                                <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                                                    <div class="wrapper-content bg-white">
                                                        <div class="section-scroll pinside60" id="section-about">
                                                            {{-- <input type="hidden" name="lender_type_info"
                                                                id="lender_type_info"
                                                                value="{{ isset($sign_agreement->lender_type) ? $sign_agreement->lender_type : '' }}">
                                                            <input type="hidden" name="personal_id" id="personal_id"
                                                                value="{{ isset($sign_agreement->personal_id) ? $sign_agreement->personal_id : '' }}"> --}}
                                                            <h1>SYARAT DAN KETENTUAN LAYANAN PENGGUNAAN SIAP</h1>
                                                            <p class="lead">Tanda tangan Elektronik yang Mudah, Aman dan Terpercaya</p>
                                                            @if ($sign_agreement)
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                        <p><b>Pemberitahuan</b> : Untuk penandatanganan dokumen secara elektronik kami menggunakan layanan pihak ketiga yaitu Digisign.</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                        <p> Daftarkan diri anda untuk menikmati kemudahan dalam menandatangani dokumen elektronik</p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <p>Silahkan aktifasi akun digisign anda sebelum melakukan tanda tangan perjanjian.</p>
                                                                <a href="{{$sign_agreement->link_activation}}" type="button" class="btn btn-primary">Aktivasi Akun</a>
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

    @section('js')
        <script src="{{ asset('/script/profile.js') }}"></script>
    @endsection
@endsection
