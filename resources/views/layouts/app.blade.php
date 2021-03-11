<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
     <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontello.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-slider.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
    <!-- Flaticon -->
    <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-slider.css')}}">
    <title>SIAP</title>

</head>
<body>
<div class="header header-regular">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                    <!-- logo -->
                    <div class="logo">
                        <a href="index.html">[LOGO]</a>
                    </div>
                </div>
                <div class="col-sm-1">
                   <div class="logo">
                        <img src="/images/ojk3.png" alt="Logo">
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div id="navigation">
                        <!-- navigation start-->
                        <ul>
                            <li class="active"><a href="#" class="animsition-link">Home</a>
                               
                            </li>
                            <li><a href="#" class="animsition-link">Loan Product</a>
                                
                            </li>
                            <li><a href="about.html" class="animsition-link">About us</a>
                               
                            </li>
                            <li><a href="blog-listing.html" class="animsition-link">Blog</a>
                                
                            </li>
                            <li><a href="compare-loan.html" class="animsition-link">Features</a>
                                
                                </li>
                                <li><a href="compare-loan.html" class="animsition-link">Bank Account</a>
                                    
                                </li>
                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block">
                    <a href="/login" class="btn btn-danger">MASUK</a> </div>
                </div>
            </div>
        </div>
    </div>
@yield('content')
<div class="footer section-space100 mt-5">
        <!-- footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-logo">
                        <!-- Footer Logo -->
                        <img src="images/ft-logo.png" alt="logo"> </div>
                    <!-- /.Footer Logo -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                        <h3 class="newsletter-title">Signup Our Newsletter</h3>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="newsletter-form">
                            <!-- Newsletter Form -->
                            <form action="https://jituchauhan.com/borrow/bootstrap-4/newsletter.php" method="post">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Write E-Mail Address" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span> 
                                </div>
                                <!-- /input-group -->
                            </form>
                        </div>
                        <!-- /.Newsletter Form -->
                    </div>
                </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
            <hr class="dark-line">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="widget-text mt40">
                        <!-- widget text -->
                        <p>Our goal at Borrow Loan Company is to provide access to personal loans and education loan, car loan, home loan at insight competitive interest rates lorem ipsums. We are the loan provider, you can use our loan product.</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="address-text"><span><i class="icon-placeholder-3 icon-1x"></i> </span>3895 Sycamore Road Arlington, 97812 </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="call-text"><span><i class="icon-phone-call icon-1x"></i></span>800-123-456</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget text -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#">Car Loan</a></li>
                            <li><a href="#">Personal Loan</a></li>
                            <li><a href="#">Education Loan</a></li>
                            <li><a href="#">Business Loan</a></li>
                            <li><a href="#">Home Loan</a></li>
                            <li><a href="#">Debt Consolidation</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-social mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i>Linked In</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
            </div>
        </div>
    </div>
 <div class="tiny-footer">
        <!-- tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                    <p>Terms of use | Privacy Policy</p>

                </div>
            </div>
        </div>
    </div>
<a href="#0" class="cd-top" title="Go to top">Top</a>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
