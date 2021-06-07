@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row">
        
        <div class="col-md-12">
            <div class="wrapper-content bg-white ">
                <div class="about-section pinside80">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <h2 class="mb30 ">Informasi Rekening</h2>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nomor Rekening</label>
                                </div>
                                <div class="col-xl-8">
                                    <h4><b>{{$account->account_number}}</b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nama</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->lastname}}</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->birthplace}}</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Tanggal Lahir </label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->birthdate}}</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nama Ibu</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->mothermaidenname}}</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->mobilephone1.$account->mobilephone2}}</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b>{{$account->email}}</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta-section pinside60  bg-white section-space40">
                    <div class=" ">
                        <div class="row">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="mb60 text-center section-title">
                                    <h1>Informasi Saldo</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                    <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div>
                                    <h2 class="capital-title">Apply For Loan</h2>
                                    <p>Looking to buy a car or home loan? then apply for loan now.</p>
                                    <a href="#" class="btn-link">Get Appointment</a> </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                    <div class="mb40"><i class="icon-phone-call icon-2x icon-default"></i></div>
                                    <h2 class="capital-title">Call us at </h2>
                                    <h1 class="text-big">800-123-456 / 789 </h1>
                                    <p>lnfo@loanadvisor.com</p>
                                    <a href="#" class="btn-link">Contact us</a> </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                    <div class="mb40"> <i class="icon-users icon-2x icon-default"></i></div>
                                    <h2 class="capital-title">Talk to Advisor</h2>
                                    <p>Need to loan advise? Talk to our Loan advisors.</p>
                                    <a href="#" class="btn-link">Meet The Advisor</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="alert dager"> {{$message}} </div>
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
