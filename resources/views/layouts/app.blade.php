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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/2.1.0/select2.css" rel="stylesheet" />


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
                <div class="col-sm-1.1">
                    <!-- logo -->
                    <div class="logo p-2">
                    <a href="#">[LOGO]</a>

                    </div>
                </div>
                <div class="col-sm-1">
                   <div class="logo p-2">
                        <img src="/images/ojk3.png" alt="Logo">
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                  <div id="navigation" class="p-2">
                        <!-- navigation start-->
                        <ul>
                            <li class="active"><a href="/" class="animsition-link">Home</a>
                            <li><a href="/register/lender" class="animsition-link">Pendanaan</a>
                            </li>
                            <li><a href="/register/borrower" class="animsition-link">Peminjam</a>
                            </li>


                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block p-2">
                    @if (Auth::check())
                        <a href="/logout" class="btn btn-danger">KELUAR</a> </div>
                    @else
                        <a href="/login" class="btn btn-danger">MASUK</a> </div>
                    @endif

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
                    <div class="logo">
                        <!-- Footer Logo -->
                       <img src="/images/ojk3.png" alt="Logo">
                        </div>
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

            </div>
        </div>
    </div>
    <div class="tiny-footer">
        <!-- tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">


                </div>
            </div>
        </div>
    </div>


<a href="#0" class="cd-top" title="Go to top">Top</a>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.inputmask.bundle.js')}}" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/2.1.0/select2.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function loading(){
    $('.btn-primary').attr('disabled','disabled').html('<i class="fa fa-spinner fa-spin"></i> Mohon Tunggu');

}
function close_loading(){
    $(".btn-primary").removeAttr('disabled').html($("button").attr("data-text"));
}
function alert_error(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Terjadi kesalahan pada pengimputan data!',
    })
}
</script>
@yield('js')

</body>
</html>
