@extends('layouts.app_lender')
@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
    </div>
    <div class=" ">
        <!-- content start -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="wrapper-content bg-white pinside60">
                        <div class="row">
                            <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="error-img mb60">
                                    <img style="width: 80%;" src="<?php echo (asset('images/waiting_logo.png')); ?>" class="" alt="">
                                </div>
                                <div class="error-ctn text-center">
                                    <h2 class="msg">Maaf</h2>
                                    <h1 class="error-title mb40">Proses Verifikasi</h1>
                                    <p class="mb40">Status akun Anda masih dalam proses. Kami akan menghubungi Anda jika proses verifikasi telah berhasil</p>
                                    <a href="index.html" class="btn btn-default text-center">kembali ke Beranda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
