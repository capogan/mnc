@extends('layouts.app_lender')
@section('content')
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
                                                            <h1>Sign Agreement</h1>
                                                            <p class="lead">To make your home loan journey a smooth sail, in this article we will help you to know eligibility criteria, rates of interest, process, necessary documents, comparison and transfer for lowest rates. </p>
                                                            <div class="row">
                                                                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                    <p>Maecenas in ultricies sem. Nunc eget orci mi. Sed porttitor lacus quis scelerisque dignissim. Nullam bibendum lputatesAliquam non mageselislacerat sapien dolor et dui.</p>
                                                                </div>
                                                                <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                                                                    <p>Sed sit amet volutpat erat. Lorem ipsum dolor sit amet lorem consectetur adipiscing elit. Nam massa ipsum, mollis et sit amet ullamcorque duraesent nec vehicula dolor. </p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p>Phasellus tellus nunc, sollicitudin quist amet it simple nequeuisque lacus mi tesimly diummy cintenbt mpus nec purus vitae tempor placerat leo. </p>
                                                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Tanda Tangan Perjanjian</a> </div>
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

