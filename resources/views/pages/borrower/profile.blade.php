@extends('layouts.app')

@section('content')
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: 50px !important;
        }
    </style>



        <!-- content start -->
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
                <div class="row">
                    <div class="col">

                        <div class="sub-nav">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="experience" aria-selected="false">Usaha</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="education" aria-selected="false">Berkas</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="experience" aria-selected="false">Faktur</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-5" aria-selected="false">Transaksi</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                @include('pages.borrower.information.profile_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service2">
                                    @include('pages.borrower.information.bussiness_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service3">
                                    @include('pages.borrower.information.file_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service4">
                                    @include('pages.borrower.information.invoice_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service5">
                                    @include('pages.borrower.information.finance_information')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
@section('js')

        <script src="{{ asset('/script/profile.js') }}"></script>
        <script src="{{asset('/js/calculator.js')}}"></script>
        <script src="{{asset('/js/simple-slider.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js" integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap2.css" integrity="sha512-NkKdMfG7MzwPkAqUdt+Vu3Ogx6NDda/P1N6dIGiQcGCtZuA22wIreJYP7I7G06yQAfomG3+8qZwUjKfhR1p/+Q==" crossorigin="anonymous" />

        <script>
  var inputs = document.querySelectorAll( '.file' );

Array.prototype.forEach.call( inputs, function( input ) {
  var label = input.nextElementSibling,
              labelVal = label.innerHTML;

  input.addEventListener( 'change', function( e ) {
    var fileName = '';

    if ( this.files && this.files.length > 1 ) {
      fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
    } else {
      fileName = e.target.value.split( '\\' ).pop();
    }

    if ( fileName ) {
      label.querySelector( 'span' ).innerHTML = fileName;
    } else {
      label.innerHTML = labelVal;
    }
  });
});
    </script>

@endsection
@endsection
