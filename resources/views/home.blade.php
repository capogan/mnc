@extends('layouts.app')

@section('content')
    <style>
        .modal{
            /*display: block !important; !* I added this to see the modal, you don't need this *!*/
        }

        /* Important part */
        .modal-dialog{
            overflow-y: initial !important
        }
        .modal-body{
            height: 80vh;
            overflow-y: auto;
        }
        .modal-disclamer{
            font-size:11pt;
            text-align:justify
        }
        </style>
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <div class="hero-tab-block">
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
                        
                    </ol>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="row">
                <div class="col">


                <img src="/images/Artborad2.png" alt="Borrow - Loan Company Website Template" class="icon-ttg-layanan">
                </div>
                <div class="col">
                    <div class="row">
                        <h2>TENTANG LAYANAN</h2>
                    </div>
                <div class="row">
                    <p style="text-align: justify;">SIAP danain adalah salah satu platform penyedia layanan pinjam meminjam uang berbasis teknologi informasi, atau lebih dikenal dengan peer to peer lending.

Dalam Aktifitasnya SIAP dananin berperan mempertemukan antara peminjam dan pemberi pinjaman. 

Dengan tujuan besar dapat berperan penuh terhadap inklusi keuangan dan perkembangan UMKM. SIAP Danain  melalui produk pinjaman produktif akan mendukung banyak UMKM dalam mendapatkan dan meningkatkan modal atau memperbesar kegiatan usaha UMKM.
.  
Dengan memanfaatkan kecanggihan teknologi yang dimiliki Siap Danain mampu bergerak cepat dan teapt. Cepat dalam memproses setiap transaksi dan memiliki akurasi ketepatan yang baik dalam melakukan mitigasi risiko.</p>
            </div>
            </div>
        </div>

        </div>

        </div>

    </div>
    <div class="container text-center mt-5">
    <h3>Partner Kami</h3>

    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item active">
                    <div class="col-md-4">

                        
                            <img class="img-fluid" src="/images/bni_baru.png">
                       

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">

                        
                            <img class="img-fluid" src="/images/pefindo.png">
                      

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">

                      
                            <img class="img-fluid" src="/images/privy.png">
                       

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">

                       
                            <img class="img-fluid" src="/images/FM.png">
                       
                    </div>
                </div>
               

            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
      <div class="section-space80 bg-gradient call-to-action">
        <div class="container">
            <div class="row">
                <div class=" offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="text-center">
                        <!-- section title start-->
                        <h1 class="text-white">ESCROW</h1>
                        <p class="text-white">Escrow merupakan pihak ketiga yang ditunjuk dan bertindak sebagai pemelihara/perwakilan untuk dokumen dan dana-dana sepanjang proses penyerahan hak milik pemberi pinjaman ke penerima pinjaman atau selama penggantian struktur kepemilikan.Escrow account atau rekening Bersama dikelola oleh agen yang berperan mengamankan aset berupa uang yang telah disetorkan oleh pihak penerima pinjaman untuk nantinya diserahkan kepada pihak pemberi pinjaman yang terlibat dalan transaksi secara online.</p>

                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80 bg-white">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h1>Mengapa Memilih Kami ?</h1>
                        <p>Nunc iaculis velit a vestibulum cursu estibentum nec ante eu molestie.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="feature feature-icon-style">
                        <div class="feature-icon"> <i class="fa fa-calculator fa-2x"></i></div>
                        <div class="feature-content">
                           <h3 class="feature-title">Bunga Pinjaman dan Biaya</h3>
                            <p>Bunga PinjamanBunga dan biaya layanan yang terjangkau  sesuai hasil analisa risiko tanpa ada biaya yang tersembunyi</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="feature feature-icon-style">
                        <div class="feature-icon"><i class="fa fa-heart fa-2x"></i></div>
                        <div class="feature-content">
                           <h3 class="feature-title">Pelayanan yang baik</h3>
                           <div class="row mt-5">
                            <p>Pelayanan informasi yang jelas dan cepat serta selalu membina hubungan yang baik kepada setiap pelanggan.</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="feature feature-icon-style">
                        <div class="feature-icon"> <i class="fa fa-file-text-o fa-2x"></i></div>
                        <div class="feature-content">
                            <h3 class="feature-title">Pendaftaran yang mudah</h3>
                            <p>Proses pendaftaran yang mudah karena dapat dilakukan melalui koneksi internet kapanpun dan dimanapun.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="feature feature-icon-style">
                        <div class="feature-icon"><i class="fa fa-flash fa-2x"></i></div>
                        <div class="feature-content">
                      
                            <h3 class="feature-title">Proses Cepat</h3>
                           
                            <div class="row mt-5">
                            <p>Proses analisa dan persetujuan pinjaman maksimal 2 hari kerja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="bg-dark-blue section-space20">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <h1 class="big-title text-white">15 Billion</h1>--}}
{{--                        <div class="small-title">Borrowed</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <h1 class="big-title text-white">1.5 Million</h1>--}}
{{--                        <div class="small-title">Customer</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">--}}
{{--                    <div class="text-center text-white">--}}
{{--                        <div class="icon icon-1x rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>--}}
{{--                        <div class="small-title">Average Customer Rating</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="section-space80 bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="section-title text-center mb60">--}}
{{--                        <h1>Why take a loan with us?</h1>--}}
{{--                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus maximus lorem id arcu sagittis, in euismod erat faucibus. Nullam rutrum suscipit velit nec simply dummy content gravida. </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">--}}
{{--                    <div class="text-center mb30">--}}
{{--                        <h3 class="mb20">Fast</h3>--}}
{{--                        <p>Borrow processes your application and your loan - no third iesnsectetur ultriciesi.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">--}}
{{--                    <div class="text-center mb30">--}}
{{--                        <h3 class="mb20">Flexible </h3>--}}
{{--                        <p>Apply online in just minutes no more document or callequired simpmy content.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">--}}
{{--                    <div class="text-center mb30">--}}
{{--                        <h3 class="mb20">Great rates</h3>--}}
{{--                        <p>The generated Lorem Ipsum is free from repetitionected humooc words etc. </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">--}}
{{--                    <div class="text-center mb30">--}}
{{--                        <h3 class="mb20">Reviews</h3>--}}
{{--                        <p> Nunc at sapien bibendum, dapibus dolo sodalauciapibus nibh varius egestas. </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="section-space80 bg-white process-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="section-title text-center mb60">--}}
{{--                        <h1>Getting started is easy</h1>--}}
{{--                        <p>Apply online in just minutes no more document or calling required </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">--}}
{{--                        <div class="bg-white number-block mb30 ">--}}
{{--                            <div class="process-img"><img src="images/process-img-1.jpg" alt="" class="rounded-circle">--}}
{{--                                <div class="circle"><span class="number">1</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="pinside20">--}}
{{--                                <h3>Check Your Eligibility</h3>--}}
{{--                                <p>Suspendisse accumsarligula dignissim sit amet vestibulllis etfelis.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">--}}
{{--                        <div class="bg-white number-block mb30 ">--}}
{{--                            <div class="process-img"><img src="images/process-img-2.jpg" alt="" class="rounded-circle">--}}
{{--                                <div class="circle"><span class="number">2</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="pinside20">--}}
{{--                                <h3>Personalize Your Offer</h3>--}}
{{--                                <p>Aecenases lectus quijusto euismod aliqua ecenas vitae gravida.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">--}}
{{--                        <div class="bg-white number-block mb30 ">--}}
{{--                            <div class="process-img"><img src="images/process-img-3.jpg" alt="" class="rounded-circle">--}}
{{--                                <div class="circle"><span class="number">3</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="pinside20">--}}
{{--                                <h3>Borrow & Repay</h3>--}}
{{--                                <p>Aliquam ise auguesit amet digniss ullcorper one orci duieget vestibulum.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="bg-yellow-light section-space80 rating-testimonials">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">--}}
{{--                    <div class="mb60 text-center section-title">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1>Trusted By Thousands Peoples</h1>--}}
{{--                        <p>What people are saying about us product and service.</p>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 clearfix col-12">--}}
{{--                    <div class="testimonial-block mb30">--}}
{{--                        <div class="mb10">--}}
{{--                            <div class="icon rate-done mb20"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>--}}
{{--                            <p class="lead">Excellent very easy to apply people--}}
{{--                                <br>are very helpful</p>--}}
{{--                            <p class="testimonial-text"> Best company I have worked with in a long time they really know how to get the job done--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="testimonial-autor-box">--}}
{{--                            <div class="testimonial-autor">--}}
{{--                                <h4 class="testimonial-name-1">Chester H. Davis</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 clearfix col-12">--}}
{{--                    <div class="testimonial-block mb30">--}}
{{--                        <div class="mb10">--}}
{{--                            <div class="icon rate-done mb20"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>--}}
{{--                            <p class="lead">Simple and very smooth process--}}
{{--                                <br> easy to get loan</p>--}}
{{--                            <p class="testimonial-text">Applying for a loan with Borrow was easy and quick. I’m so thankful I found them.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="testimonial-autor-box">--}}
{{--                            <div class="testimonial-autor">--}}
{{--                                <h4 class="testimonial-name-1">Linda M. Evans</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">--}}
{{--                    <a href="#" class="btn btn-primary">show more review</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="section-space100 cta-section-second">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1 class="text-white">Lending solution for your every desire. Its easy</h1>--}}
{{--                        <p class="text-white">Suilectus lobortis qus laciniaserdem proinvel.</p>--}}
{{--                        <a href="#" class="btn btn-default">Get Started</a>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="section-space80">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">--}}
{{--                    <div class="section-title mb60 text-center">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1>Our Lenders</h1>--}}
{{--                        <p>We partner with hundreds of lenders and banks who share a common goal of helping you achieve your dreams.</p>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#"><img src="images/logo-big-1.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#"><img src="images/logo-big-2.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#"><img src="images/logo-big-3.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#"><img src="images/logo-big-4.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="footer section-space100">--}}
{{--        <!-- footer -->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">--}}
{{--                    <div class="footer-logo">--}}
{{--                        <!-- Footer Logo -->--}}
{{--                        <img src="images/ft-logo.png" alt="Borrow - Loan Company Website Templates"> </div>--}}
{{--                    <!-- /.Footer Logo -->--}}
{{--                </div>--}}
{{--                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">--}}
{{--                            <h3 class="newsletter-title">Signup Our Newsletter</h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">--}}
{{--                            <div class="newsletter-form">--}}
{{--                                <!-- Newsletter Form -->--}}
{{--                                <form action="https://jituchauhan.com/borrow/bootstrap-4/newsletter.php" method="post">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Write E-Mail Address" required>--}}
{{--                                        <span class="input-group-btn">--}}
{{--                <button class="btn btn-default" type="submit">Go!</button>--}}
{{--                </span> </div>--}}
{{--                                    <!-- /input-group -->--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!-- /.Newsletter Form -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.col-lg-6 -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <hr class="dark-line">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">--}}
{{--                    <div class="widget-text mt40">--}}
{{--                        <!-- widget text -->--}}
{{--                        <p>Our goal at Borrow Loan Company is to provide access to personal loans and education loan, car loan, home loan at insight competitive interest rates lorem ipsums. We are the loan provider, you can use our loan product.</p>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                <p class="address-text"><span><i class="icon-placeholder-3 icon-1x"></i> </span>3895 Sycamore Road Arlington, 97812 </p>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                <p class="call-text"><span><i class="icon-phone-call icon-1x"></i></span>800-123-456</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.widget text -->--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">--}}
{{--                    <div class="widget-footer mt40">--}}
{{--                        <!-- widget footer -->--}}
{{--                        <ul class="listnone">--}}
{{--                            <li><a href="#">Home</a></li>--}}
{{--                            <li><a href="#">Services</a></li>--}}
{{--                            <li><a href="#">About Us</a></li>--}}
{{--                            <li><a href="#">News</a></li>--}}
{{--                            <li><a href="#">Faq</a></li>--}}
{{--                            <li><a href="#">Contact Us</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.widget footer -->--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">--}}
{{--                    <div class="widget-footer mt40">--}}
{{--                        <!-- widget footer -->--}}
{{--                        <ul class="listnone">--}}
{{--                            <li><a href="#">Car Loan</a></li>--}}
{{--                            <li><a href="#">Personal Loan</a></li>--}}
{{--                            <li><a href="#">Education Loan</a></li>--}}
{{--                            <li><a href="#">Business Loan</a></li>--}}
{{--                            <li><a href="#">Home Loan</a></li>--}}
{{--                            <li><a href="#">Debt Consolidation</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.widget footer -->--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">--}}
{{--                    <div class="widget-social mt40">--}}
{{--                        <!-- widget footer -->--}}
{{--                        <ul class="listnone">--}}
{{--                            <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-linkedin"></i>Linked In</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.widget footer -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal fade" id="disclamer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <ol class="modal-disclamer">
                                <li  class="">Layanan Pinjam Meminjam Berbasis Teknologi Informasi merupakan kesepakatan perdata antara Pemberi Pinjaman dengan Penerima Pinjaman, sehingga segala risiko yang timbul dari kesepakatan tersebut ditanggung sepenuhnya oleh masing-masing pihak.</li>
                                <li  class="">Risiko kredit atau gagal bayar ditanggung sepenuhnya oleh Pemberi Pinjaman. Tidak ada lembaga atau otoritas negara yang bertanggung jawab atas risiko gagal bayar ini.</li>
                                <li  class="">Penyelenggara dengan persetujuan dari masing-masing Pengguna (Pemberi Pinjaman dan/atau Penerima Pinjaman) mengakses, memperoleh, menyimpan, mengelola, dan/atau menggunakan data pribadi Pengguna ("Pemanfaatan Data") pada atau di dalam benda, perangkat elektronik (termasuk smartphone atau telepon seluler), perangkat keras (hardware) maupun lunak (software), dokumen elektronik, aplikasi atau sistem elektronik milik Pengguna atau yang dikuasai Pengguna, dengan memberitahukan tujuan, batasan, dan mekanisme Pemanfaatan Data tersebut kepada Pengguna yang bersangkutan sebelum memperoleh persetujuan yang dimaksud.</li>
                                <li  class="">Pemberi Pinjaman yang belum memiliki pengetahuan dan pengalaman pinjam meminjam, disarankan untuk tidak menggunakan layanan ini.</li>
                                <li  class="">Penerima Pinjaman harus mempertimbangkan tingkat bunga pinjaman dan biaya lainnya sesuai dengan kemampuan dalam melunasi pinjaman.</li>
                                <li  class="">Setiap kecurangan tercatat secara digital di dunia maya dan dapat diketahui masyarakat luas di media sosial.</li>
                                <li  class="">Pengguna harus membaca dan memahami informasi ini sebelum membuat keputusan menjadi Pemberi Pinjaman atau Penerima Pinjaman. </li>
                                <li  class="">Pemerintah yaitu dalam hal ini Otoritas Jasa Keuangan, tidak bertanggung jawab atas setiap pelanggaran atau ketidakpatuhan oleh Pengguna, baik Pemberi Pinjaman maupun Penerima Pinjaman (baik karena kesengajaan atau kelalaian Pengguna) terhadap ketentuan peraturan perundang-undangan maupun kesepakatan atau perikatan antara Penyelenggara dengan Pemberi Pinjaman dan/atau Penerima Pinjaman.</li>
                                <li  class="">Setiap transaksi dan kegiatan pinjam meminjam atau pelaksanaan kesepakatan mengenai pinjam meminjam antara atau yang melibatkan Penyelenggara, Pemberi Pinjaman, dan/atau Penerima Pinjaman wajib dilakukan melalui escrow account dan virtual account sebagaimana yang diwajibkan berdasarkan Peraturan Otoritas Jasa Keuangan Nomor 77/POJK.01/2016 tentang Layanan Pinjam Meminjam Uang Berbasis Teknologi Informasi dan pelanggaran atau ketidakpatuhan terhadap ketentuan tersebut merupakan bukti telah terjadinya pelanggaran hukum oleh Penyelenggara sehingga Penyelenggara wajib menanggung ganti rugi yang diderita oleh masing-masing Pengguna sebagai akibat langsung dari pelanggaran hukum tersebut di atas tanpa mengurangi hak Pengguna yang menderita kerugian menurut Kitab Undang-Undang Hukum Perdata.</li>
                                <li  class="">SIAP merupakan badan hukum yang didirikan berdasarkan Hukum Republik Indonesia. Berdiri sebagai perusahaan yang telah diatur oleh dan dalam pengawasan Otoritas Jasa Keuangan (OJK) di Indonesia, Perusahaan menyediakan layanan interfacing  sebagai penghubung pihak yang memberikan pinjaman dan pihak yang membutuhkan pinjaman meliputi pendanaan dari individu, organisasi, maupun badan hukum kepada individu atau badan hukum tertentu. Perusahaan tidak menyediakan segala bentuk saran atau rekomendasi pendanaan terkait pilihan-pilihan dalam situs ini.</li>
                                <li  class="">Isi dan materi yang tersedia pada situs <b>siap.id</b> dimaksudkan untuk memberikan informasi dan tidak dianggap sebagai sebuah penawaran, permohonan, undangan, saran, maupun rekomendasi untuk menginvestasikan sekuritas, produk pasar modal, atau jasa keuangan lainya. Perusahaan dalam memberikan jasanya hanya terbatas pada fungsi administratif.</li>
                                <li  class="">Pendanaan dan pinjaman yang ditempatkan di rekening siap adalah tidak dan tidak akan dianggap sebagai simpanan yang diselenggarakan oleh Perusahaan seperti diatur dalam Peraturan Perundang-Undangan tentang Perbankan di Indonesia. Perusahaan atau setiap Direktur, Pegawai, Karyawan, Wakil, Afiliasi, atau Agen-Agennya tidak memiliki tanggung jawab terkait dengan setiap gangguan atau masalah yang terjadi atau yang dianggap terjadi yang disebabkan oleh minimnya persiapan atau publikasi dari materi yang tercantum pada situs Perusahaan.</li>
                            </ol>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="close_disclamer">Saya Mengerti</button>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script src="js/jquery.nice-select.min.js"></script>
    <script>
        $(document).ready(function() {
            if(getCookie('disclaimer') != 'true'){
                $('#disclamer_modal').modal({backdrop: 'static', keyboard: false})
            }

            $(document).on('click','#close_disclamer' , function(){
                setCookie('disclaimer','true',1);
            })
        });

        function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires="+d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function checkCookie() {
                var user = getCookie("username");
                if (user != "") {
                        alert("Welcome again " + user);
                } else {
                    user = prompt("Please enter your name:", "");
                    if (user != "" && user != null) {
                        setCookie("username", user, 365);
                    }
                }
            }
    </script>
    <script>
        $('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}

        next.children(':first-child').clone().appendTo($(this));
      }
});


        $("#close_disclamer").click(function(){
            $('#disclamer_modal').modal('hide');
        })


    </script>

@endsection
@endsection
