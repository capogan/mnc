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
                                    <a class="nav-link {{$header_section == 'step1' ? 'active ' : '' }}" href="{{url('profile')}}">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{$header_section == 'step2' ? 'active ' : '' }}" href="{{Auth::user()->step < 4 ? url('register/business') : '#' }}">Usaha</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{$header_section == 'step3' ? 'active ' : '' }}" href="{{Auth::user()->step <= 3 ? url('register/file') : '#' }}">Berkas</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{$header_section == 'step4' ? 'active ' : '' }}" href="{{Auth::user()->step <= 3 ? url('register/faktur') : '#' }}">Faktur</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{$header_section == 'step5' ? 'active ' : '' }}" href="{{Auth::user()->step <= 3 ? url('register/transaction') : '#' }}">Transaksi</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                        
                                <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                    @include($page)
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

        <script>
            //$('select').select2();
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
