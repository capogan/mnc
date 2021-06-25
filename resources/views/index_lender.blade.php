@extends('layouts.app')

@section('content')
  <div class="slider" id="slider">
        <!-- slider -->
         <div class="slider-img" style="margin-top: 80px;"><img src="images/Aset SIAP - Banner 1.png" alt="Borrow - Loan Company Website Template" class="">
           <div class="row" style="margin-top: -120px; margin-left: 80px;">
                <div class="col">
                    <div class="slider-captions">
                        <!-- slider-captions -->
                       
                        <a href="/login" class="btn btn-default">Login</a> 
                        <a href="/register/lender" class="btn btn-default">Register</a> 
                        </div>
                    <!-- /.slider-captions -->
                </div>
                </div>
           
        </div>
        <div>
             <div class="slider-img" style="margin-top: 98px;"><img src="images/Aset SIAP - Banner 2.png" alt="Borrow - Loan Company Website Template" >
                <div class="container">
                    <div class="row" style="margin-top: -120px; margin-left: -90px;">
                        <div class="col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12">
                            <div class="slider-captions">
                                <!-- slider-captions -->
                               
                                 <a href="/login" class="btn btn-default">Login</a> 
                                <a href="/register/lender" class="btn btn-default">Register</a> 
                                </div>
                            <!-- /.slider-captions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img" style="margin-top: 98px;"><img src="images/Aset SIAP - Banner 3.png" alt="Borrow - Loan Company Website Template" class="" >
                <div class="container">
                    <div class="row" style="margin-left: -90px; padding-top: -100px;">
                        <div class="col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12 m-0">
                            <div class="slider-captions">
                                <!-- slider-captions -->
                              
                                    {{-- <a href="/login" class="btn btn-default">Login</a> 
                                    <a href="/register/lender" class="btn btn-default">Register</a>  --}}
                                </div>
                            <!-- /.slider-captions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active text-light">Pendanaan</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <h1>Mengapa Harus SIAP ?</h1>
        </div>
        <div class="row">
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row justify-content-center">
                <img src="images/tumbnail-image-syarat.png" alt="work" class="img-fluid2">
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <h2>Profit yang stabil dengan persentase bunga tahunan sebesar 20%.</h2>
                </div>
                <div class="row">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="row">
                        <h2>Risk Control Penerima Pinjaman yang buruk.</h2>
                    </div>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col">
                     <div class="row justify-content-center">
                    <img src="/images/tumbnail-image-online.png" alt="work" class="img-fluid2">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                     <div class="row justify-content-center">
                    <img src="/images/tumbnail-image-aman.png" alt="work" class="img-fluid2">
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <h2>Periode yang sesuai , menciptakan keuntungan yang cepat.</h2>
                    </div>
                    <div class="row">
                        Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.
                    </div>
                    <div class="row">
                        <ul>
                            <li>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </li>
                            <li>
                                 Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </li>
                            <li>
                                 Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
   
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/slider-carousel.js')}}"></script>
    <script src="{{asset('js/service-carousel.js')}}"></script>
@endsection
@endsection
