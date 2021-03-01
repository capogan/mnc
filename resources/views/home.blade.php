@extends('layouts.app')

@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <div class="hero-tab-block">
                        <div class="st-tabs">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                    <div class="loan-form">
                                        <form>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h2 class="text-bold">Lorem Ipsum is simply dummy text </h2>
                                                </div>
                                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                                    <div class="">
                                                        <label>Lorem Ipsum</label>
                                                        <select class="wide">
                                                            <option value="">Pilih Kategori Borrower</option>
                                                            <option value="borrower/personal/profile">Pribadi</option>
                                                            <option value="borrower/bussiness/profile">Bisnis</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt30 nopl nopr">
                                                    <a href="/borrower/personal/profile" class="btn btn-default btn-lg">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service2">
                                    <div class="loan-form">
                                        <form>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h2 class="text-bold">Lorem Ipsum is simply dummy text</h2>
                                                </div>
                                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                                    <div class="">
                                                        <label>Lorem Ipsum</label>
                                                        <select class="wide">
                                                            <option value="Select Loan Purpose">Pilih kategori Lender</option>
                                                            <option value="Debt Consolidation">Pribadi</option>
                                                            <option value="Major Purpose">Bisnis</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt30 nopl nopr">
                                                    <a href="#" class="btn btn-default btn-lg">get your loan</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true"><i class="fa fa-money fa-lg"></i><p>  Borrower</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false"><i class="fa fa-briefcase fa-lg"></i><p>Lender</p></a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
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
@section('js')
    <script src="js/jquery.nice-select.min.js"></script>


    <script>
        $(document).ready(function() {
            $('select').niceSelect();

        });
    </script>

@endsection
@endsection
