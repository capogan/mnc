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
                    <a href="/profile/lender-individu/" type="button" data-text="1" class="btn btn-default btn-circle">1</a>
                    <p>Informasi Pribadi</p>
                </div>
                @if($type == '2')
                <div class="stepwizard-step" id="non_sme_occupation">
                    <a href="/profile/lender-individu/occupation" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">2</a>
                    <p>Informasi Pekerjaan</p>
                </div>
                <div class="stepwizard-step" id="non_sme_document">
                    <a href="/profile/lender-individu/document" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">3</a>
                    <p>Berkas</p>
                </div>
                @else
                <div class="stepwizard-step" id="sme_occupation">
                    <a href="/profile/lender-individu/occupation/sme" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">2</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step" id="sme_document">
                    <a href="/profile/lender-individu/document/sme" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">3</a>
                    <p>Berkas</p>
                </div>
                @endif
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/sign" type="button" class="btn btn-primary btn-circle">4</a>
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
                                                            <p class="lead">To make your home loan journey a smooth
                                                                sail, in
                                                                this article we will help you to know eligibility
                                                                criteria,
                                                                rates of interest, process, necessary documents,
                                                                comparison
                                                                and transfer for lowest rates. </p>
                                                            @if ($sign_agreement)
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                        <p>Maecenas in ultricies sem. Nunc eget orci mi. Sed
                                                                            porttitor lacus quis scelerisque dignissim.
                                                                            Nullam
                                                                            bibendum lputatesAliquam non mageselislacerat
                                                                            sapien
                                                                            dolor et dui.</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                        <p>Sed sit amet volutpat erat. Lorem ipsum dolor sit
                                                                            amet lorem consectetur adipiscing elit. Nam
                                                                            massa
                                                                            ipsum, mollis et sit amet ullamcorque duraesent
                                                                            nec
                                                                            vehicula dolor. </p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <p>Phasellus tellus nunc, sollicitudin quist amet it simple
                                                                    nequeuisque lacus mi tesimly diummy cintenbt mpus nec
                                                                    purus
                                                                    vitae tempor placerat leo. </p>
                                                                @if($sign_agreement->status_activation != 'active')
                                                                    <a href="{{$sign_agreement->link_activation}}" type="button" class="btn btn-primary">Aktivasi Account</a>
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
