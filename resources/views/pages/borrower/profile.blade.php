@extends('layouts.app')

@section('content')
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: 50px !important;
        }
    </style>



        <!-- content start -->
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
                <div class="row">
                    <div class="col">

                        <div class="sub-nav">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="experience" aria-selected="false">Usaha</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="education" aria-selected="false">Berkas</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="experience" aria-selected="false">Faktur</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-5" aria-selected="false">Transaksi</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                    @include('pages.borrower.information.profile_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service2">
                                    @include('pages.borrower.information.bussiness_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service3">
                                    @include('pages.borrower.information.file_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service4">
                                    @include('pages.borrower.information.invoice_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service5">
                                    @include('pages.borrower.information.finance_information')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
@section('js')

        <script src="{{ asset('/script/profile.js') }}"></script>
        <script src="{{asset('/js/calculator.js')}}"></script>
        <script src="{{asset('/js/simple-slider.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

@endsection
@endsection
