@extends('layouts.app_lender')
@section('content')
    <div class="container">
        <div class="row">
            <div class="wrapper-content bg-white">
                <div class="section-scroll" id="section-feature">
                    
                    <div class="pinside60">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-title mb60" style="text-align:center;">
                                <div class="alert alert-danger" role="alert">
                                    Status akun kamu masih dalam proses.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-title mb60">
                                    <h2>Kalkulator Simulasi Imbal Hasil</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="feature-icon mb30">
                                    <div class="icon mb20"><i class="icon-dollar-bill icon-default icon-2x"></i></div>
                                    <h3>Cash Loan Facility</h3>
                                    <p>Maecenas in ultricies sem. Nunc eget orci mi. Sed porttitor s, tellus fringilla condimentum eglis elit dictum cerat. </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="feature-icon mb30">
                                    <div class="icon mb20"><i class="icon-documentation icon-default icon-2x"></i></div>
                                    <h3>Special Preapproved Loan</h3>
                                    <p>Pellentesque mollis, diam a viverra luctus, nisl dui vehicula erat, id congue ante hicula tellus sit amet.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="feature-icon mb30">
                                    <div class="icon mb20"><i class="icon-money icon-default icon-2x"></i></div>
                                    <h3>No Varifactions</h3>
                                    <p>Our loan rates and charges are very attractive lorem ipsums sitamet uerse ipsum.Curabitulectus mattis vitae. </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="feature-icon mb30">
                                    <div class="icon mb20"><i class="icon-dollar-coins icon-default icon-2x"></i></div>
                                    <h3>150% Funding on Loan</h3>
                                    <p>Nunc eget orci mi. Sed porttitor lacus quis scelerisque dignissim. Nullam bibendu msfeus, isapien dolor et dui.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
