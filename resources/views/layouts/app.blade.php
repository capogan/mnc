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
    <link rel="stylesheet" type="text/css" href="css/simple-slider.css">
    <title>SIAP</title>

</head>
<body>
<div class="header header-regular">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-3 col-sm-12 col-12">
                    <!-- logo -->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo-pink.png" alt="Logo"></a>
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div id="navigation">
                        <!-- navigation start-->
                        <ul>
                            <li class="active"><a href="#" class="animsition-link">Home</a>
                                <ul>
                                    <li><a href="index.html" title="Home page 1" class="animsition-link">Home page 1</a></li>
                                    <li><a href="index-1.html" title="Home page 2" class="animsition-link">Home page 2</a></li>
                                    <li><a href="index-2.html" title="Home page 3" class="animsition-link">Home page 3</a></li>
                                    <li><a href="index-3.html" title="Home page 4" class="animsition-link">Home page 4 
                                     <span class="badge">New</span></a></li>
                                    <li><a href="index-4-students-loan.html" title="students loan" class="animsition-link">Students Loan Page <span class="badge">New</span></a> </li>
                                    <li><a href="index-5-business-loan.html" title="students loan" class="animsition-link">Business Loan Page<span class="badge">New</span></a></li>
                                    <li><a href="index-6.html" title="" class="animsition-link">Home Tabbed<span class="badge">New</span></a></li>
                                    <li><a href="index-7-borrow-bank.html" title="" class="animsition-link">Bank Home Page<span class="badge">New</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="animsition-link">Loan Product</a>
                                <ul>
                                    <li><a href="#" title="Education Loan" class="animsition-link">Credit Card <span class="badge">New</span></a>
                                        <ul>
                                            <li><a href="credit-card-listing.html" title="Credit Card Listing" class="animsition-link">Credit Card Listing</a></li>
                                            <li><a href="credit-card-single.html" title="Credit Card Single" class="animsition-link">Credit Card Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" title="Lenders" class="animsition-link">Lenders <span class="badge">New</span></a>
                                        <ul>
                                            <li><a href="lender-listing.html" title="Credit Card Listing" class="animsition-link">Lenders Listing</a></li>
                                            <li><a href="lender-single.html" title="Credit Card Single" class="animsition-link">Lenders Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="product-single-sidebar.html">Product page side tab <span class="badge">New</span></a>
                                    </li>
                                    <li><a href="loan-listing-image.html" title="Loan Image Listing" class="animsition-link">Loan Image Listing</a></li>
                                    <li><a href="loan-listing-icon.html" title="Loan Icon Listing" class="animsition-link">Loan Icon Listing</a></li>
                                    <li><a href="car-loan.html" title="Car Loan" class="animsition-link">Car Loan Single</a></li>
                                    <li><a href="personal-loan.html" title="Personal Loan" class="animsition-link">Personal Loan Single</a></li>
                                    <li><a href="home-loan.html" title="Home Loan" class="animsition-link">Home Loan Single</a></li>
                                    <li><a href="education-loan.html" title="Education Loan" class="animsition-link">Education Loan Single</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html" class="animsition-link">About us</a>
                                <ul>
                                    <li><a href="about.html" title="About us" class="animsition-link">About us</a></li>
                                    <li><a href="team.html" title="Team" class="animsition-link">Team</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-listing.html" class="animsition-link">Blog</a>
                                <ul>
                                    <li><a href="blog-listing.html" title="Blog Listing" class="animsition-link">Blog Listing</a></li>
                                    <li><a href="blog-single.html" title="Blog Single" class="animsition-link">Blog Single</a></li>
                                    <li><a href="blog-two-column.html" title="Blog Two Column" class="animsition-link">Blog Two Column</a></li>
                                    <li><a href="blog-three-column.html" title="Blog Three Column" class="animsition-link">Blog Three Column</a></li>
                                </ul>
                            </li>
                            <li><a href="compare-loan.html" class="animsition-link">Features</a>
                                <ul>
                                    <li><a href="#" title="Compare Loan" class="animsition-link">Compare Page</a>
                                        <ul>
                                          
                                            <li><a href="compare-credit-card.html" title="Compare Loan" class="animsition-link">Compare Credit Card</a>
                                                <li><a href="compare-personal-loan.html" title="Compare Loan" class="animsition-link">Compare Personal</a></li>
                                                <li><a href="compare-student-loan.html" title="Compare Loan" class="animsition-link">Compare Student Loan</a></li>
                                                  <li><a href="compare-loan.html" title="Compare Loan" class="animsition-link">Compare Loan</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="#" class="animsition-link">Landing Pages</a>
                                            <ul>
                                                <li><a href="landing-page-car-loan.html" title="Loan Calculator" class="animsition-link">Car Loan 
                                     <small class="highlight">Landing Page</small>
                                     </a></li>
                                                <li><a href="landing-page-home-loan.html" title="Loan Calculator" class="animsition-link">Home Loan 
                                     <small class="highlight">Landing Page</small></a></li>
                                     <li><a href="refinancing-landing-page.html" title="Refinancing Page" class="animsition-link">Refinancing Page
                                     <small class="highlight">Landing Page</small></a></li>
                                       <li><a href="lead-genrator-landing-page.html" title="Lead Genrator" class="animsition-link">Lead Genrator 
                                     <small class="highlight">Landing Page</small></a></li>
                                       <li><a href="card-landing-page.html" title="Card Landing" class="animsition-link">Card Page 
                                     <small class="highlight">Landing Page</small></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="loan-calculator.html" title="Loan Calculator" class="animsition-link">Loan Calculator</a></li>
                                        <li><a href="loan-eligibility.html" title="Loan Calculator" class="animsition-link">Loan Eligibility Cal <span class="badge">NEW</span></a></li>
                                        <li><a href="faq.html" title="Faq" class="animsition-link">Faq page</a></li>
                                        <li><a href="testimonial.html" title="Testimonial" class="animsition-link">Testimonial</a></li>
                                        <li><a href="error.html" title="404 Error" class="animsition-link">404 Error</a></li>
                                        <li><a href="gallery-filter-2.html" class="animsition-link">Gallery</a>
                                            <ul>
                                                <li><a href="gallery-filter-2.html" title="Filterable Gallery 2 column" class="animsition-link">Filterable Gallery 2 column</a></li>
                                                <li><a href="gallery-filter-3.html" title="Filterable Gallery 3 column" class="animsition-link">Filterable Gallery 3 column</a></li>
                                                <li><a href="gallery-masonry.html" title="Masonry Gallery" class="animsition-link">Masonry Gallery</a></li>
                                                <li><a href="gallery-zoom.html" title="Zoom Gallery" class="animsition-link">Zoom Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shortcodes-tabs.html" class="animsition-link">Shortcodes</a>
                                            <ul>
                                                <li><a href="shortcodes-tables.html" title="Table" class="animsition-link">Table</a></li>
                                                <li><a href="shortcodes-tabs.html" title="Tab" class="animsition-link">Tab</a></li>
                                                <li><a href="shortcodes-accordion.html" title="Accordion" class="animsition-link">Accordion</a></li>
                                                <li><a href="shortcodes-alert.html" title="Alert" class="animsition-link">Alert</a></li>
                                                <li><a href="shortcodes-button.html" title="Button" class="animsition-link">Button</a></li>
                                                <li><a href="shortcodes-column.html" title="Column" class="animsition-link">Column</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact-us.html" title="Contact us" class="animsition-link">Contact us</a></li>
                                </ul>
                                </li>
                                <li><a href="compare-loan.html" class="animsition-link">Bank Account</a>
                                    <ul>
                                        <li><a href="personal-bank-account.html" title="Bank Account" class="animsition-link">Bank Account</a></li>
                                        <li><a href="personal-bank-saving.html" title="Bank Saving" class="animsition-link">Bank Account list</a></li>
                                        <li><a href="borrow-account-saving.html" title="Bank Account Single" class="animsition-link">Bank Account Single</a></li>
                                    </ul>
                                </li>
                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block">
                    <div class="nav-call-info">
                        <p class="mb0 text-bold">1-800-123-4567</p>
                    </div>
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
<script src="{{asset('/js/calculator.js')}}"></script>
<script src="{{asset('/js/simple-slider.js')}}"></script>

@yield('js')
</body>
</html>
