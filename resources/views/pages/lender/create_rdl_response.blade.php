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
                               
                                <p class="lead">{{$message}}</p>
                            </div>
                            <div class="result-message"></div>
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
