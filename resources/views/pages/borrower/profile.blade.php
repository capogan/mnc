@extends('layouts.app')

@section('content')
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: 50px !important;
        }
    </style>



        <!-- content start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Profil</li>
                        </ol>
                    </div>
                </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white pinside30">
                        <div class="row">
                           <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                                <h1 class="page-title">Profil</h1>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                               
                            </div>
                        </div>
                    </div>
                    <div class="sub-nav">
                            <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true">Data Pribadi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false">Berkas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="experience" aria-selected="false">Akun Bank</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="experience" aria-selected="false">Faktur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-5" aria-selected="false">Transaksi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="wrapper-content bg-white pinside40">
                            <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="service1">
                            @include('pages.borrower.information.profile_information')
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="service2">
                            @include('pages.borrower.information.file_information')
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="service3">
                            @include('pages.borrower.information.bank_information')
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
    
@endsection
@endsection
