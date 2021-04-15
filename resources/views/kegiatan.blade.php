@extends('layouts.app')

@section('content')
  <div class="slider" id="slider">
        <!-- slider -->
        <div class="slider-img"><img src="images/slider-1.jpg" alt="Borrow - Loan Company Website Template" class="">
            <div class="container">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-captions">
                        <!-- slider-captions -->
                        <h1 class="slider-title">SIAP</h1>
                        <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">The low rate you need for the need you want! Call
                            <br> (555) 123-4567</p>
                        
                        </div>
                    <!-- /.slider-captions -->
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img"><img src="images/slider-2.jpg" alt="Borrow - Loan Company Website Template" class="">
                <div class="container">
                    <div class=" col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                             <h1 class="slider-title">SIAP</h1>
                            <p class="slider-text d-none d-xl-block d-lg-block d-sm-block"> Award winning car loans with low fixed rates and no ongoing fees.</p>
                             
                            </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img"><img src="images/slider-3.jpg" alt="Borrow - Loan Company Website Template" class="">
                <div class="container">
                    <div class="col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                            <h1 class="slider-title">SIAP</h1>
                            <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">Education Loan From Avanse At An Attractive Rate Of Interest. Apply Now!</p>
                            
                            </div>
                        <!-- /.slider-captions -->
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
                        <li class="active text-light">Media</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row mt-3">
                
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="post-block mb30">
                        <div class="post-img">
                            <img src="images/blog-img-1.jpg" alt="Borrow - Loan Company Website Template" class="img-fluid">
                        </div>
                        <div class="bg-white pinside40 outline">
                            <h3><a href="blog-single.html" class="title">What is Lorem Ipsum?</a></h3>
                            <p class="meta"><span class="meta-date">Aug 24, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="post-block mb30">
                        <div class="post-img">
                            <img src="images/blog-img-1.jpg" alt="Borrow - Loan Company Website Template" class="img-fluid">
                        </div>
                        <div class="bg-white pinside40 outline">
                            <h3><a href="blog-single.html" class="title">What is Lorem Ipsum?</a></h3>
                            <p class="meta"><span class="meta-date">Aug 24, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="post-block mb30">
                        <div class="post-img">
                            <img src="images/blog-img-2.jpg" alt="Borrow - Loan Company Website Templates" class="img-fluid">
                        </div>
                        <div class="bg-white pinside40 outline">
                            <h3><a href="blog-single.html" class="title">What is Lorem Ipsum?</a></h3>
                            <p class="meta"><span class="meta-date">Aug 24, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
