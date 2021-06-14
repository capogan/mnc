@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row">
        
        <div class="col-md-12">
            <div class="wrapper-content bg-white ">
                <div class="about-section pinside80">
                    @if ($account)
                    <div class="row">
                        <div class="col-xl-12 ">
                            <h2 class="mb30 ">Informasi Rekening Dana Lender</h2>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nomor Rekening</label>
                                </div>
                                <div class="col-xl-8">
                                    <h4><b id="account_number_rdl">{{$account->account_number}}</b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="inputEmail4" class="form-label">Nama</label>
                                </div>
                                <div class="col-xl-8">
                                    <span><b id="account_number_rdl_name">{{$account->lastname}}</b></span>
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
                            {{-- <div class="row">
                                <div class="col-xl-4">
                                    <a href="#" class="btn btn-default btn-sm mb5"> Top Up</a>
                                </div>
                                <div class="col-xl-8">
                                    <a href="#" class="btn btn-default btn-sm mb5">Withdraw</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="mb60 text-center section-title">
                                    <h1>{{$message}}</h1>
                                </div>
                            </div>
                        </div>
                    @endif
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                                    {{-- <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div> --}}
                                    <h2 class="capital-title">Informasi Saldo</h2>
                                    <p><h4>Rp 1.000.000.000</h4></p>
                                    <a id="topUpSaldo" class="btn-link">TopUp Saldo</a> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-section pinside60  bg-white section-space40">
                    <div class=" ">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30" style="text-align: center">
                                    {{-- <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div> --}}
                                    <h2 class="capital-title">Withdraw</h2>
                                    <p>Adalah pemindahan dana dari Rekening Dana Lender ke Rekening Bank Pribadi Anda.</p>
                                    <div>
                                    <input id="withdraw" style="display:inline;text-align: center;" name="withdraw" type="text" placeholder="Rp 1.000.000" class="form-control col-md-6 input-md" required="">
                                    </div>
                                    <a href="#" class="btn-link">Submit</a> </div>
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

    <script>
        $('#topUpSaldo').click(function(){
            var dialog = bootbox.dialog({
                title: 'TopUp Dana Lender',
                message: '<div style="text-align:center"><p>Silahkan transfer ke Nomor Rekening Dana Lender Anda</p><p>Nomor Rekening <br><b>'+ $("#account_number_rdl").text()+'</b></p><p> Atas Nama <br><b>'+ $("#account_number_rdl_name").text()+'</b></p><br><br></div>'
            });
        });
        </script>
@endsection
@endsection
