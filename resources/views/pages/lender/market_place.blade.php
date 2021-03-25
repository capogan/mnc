@extends('layouts.app')
@section('content')
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
        <div class="stepwizard mb-4">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="/profile/lender/" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/director" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Informasi Direktur</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/commissioner" type="button" class="btn btn-default btn-circle" >3</a>
                    <p>Informasi Komisaris</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/file" type="button" class="btn btn-default btn-circle">4</a>
                    <p>Informasi Dokumen</p>

                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/market/place" type="button" class="btn btn-primary btn-circle" disabled="disabled">5</a>
                    <p>Market Place</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="sub-nav">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="service1">
                            <div class="tab-pane" id="Bisnis" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class=" bg-white ">
                                            <div class="contact-form mb60">
                                                <div class=" ">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-1.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">3.74%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value">5.74%</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>Extra low interest rate</li>
                                                                                    <li>No ongoing fees</li>
                                                                                    <li>No upfront fees</li>
                                                                                    <li>Extra repayments + redraw services</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-2.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">11.99%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value">15.73%</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>No early exit penalty</li>
                                                                                    <li>Can apply online</li>
                                                                                    <li>Can apply in branch</li>
                                                                                    <li>Sign as guarantor</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-3.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">5.44%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value">5.99%</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>Features a low rate</li>
                                                                                    <li>No ongoing fees</li>
                                                                                    <li>Can apply online</li>
                                                                                    <li>Available for 457 visa holders</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-4.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">3.74%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value">5.74%</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>Extra low interest rate</li>
                                                                                    <li>No ongoing fees</li>
                                                                                    <li>No upfront fees</li>
                                                                                    <li>Extra repayments + redraw services</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-5.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">11.99%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value" 15.73%<="" h3="">
                                                                                    </h3></div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>No early exit penalty</li>
                                                                                    <li>No ongoing fees</li>
                                                                                    <li>Can apply online</li>
                                                                                    <li>Extra repayments + redraw services</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="lender-listing">
                                                                            <!-- lender listing -->
                                                                            <div class="lender-head">
                                                                                <div class="lender-logo"><img src="/images/lender-small-6.png" alt="Borrow - A Loan Company Website Templates"></div>
                                                                                <div class="lender-reviews"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                            </div>
                                                                            <div class="lender-rate-box">
                                                                                <div class="lender-ads-rate">
                                                                                    <small>Advertised Rate</small>
                                                                                    <h3 class="lender-rate-value">5.44%</h3>
                                                                                </div>
                                                                                <div class="lender-compare-rate">
                                                                                    <small>Comparison Rate* </small>
                                                                                    <h3 class="lender-rate-value">5.99%</h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lender-feature-list">
                                                                                <ul class="listnone bullet bullet-check-circle-default">
                                                                                    <li>Extra low interest rate</li>
                                                                                    <li>No ongoing fees</li>
                                                                                    <li>No upfront fees</li>
                                                                                    <li>Extra repayments + redraw services</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="lender-actions">
                                                                                <a href="#" class="btn btn-default btn-block">Apply now</a>
                                                                                <a href="#" class="btn-link">More Informations</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.lender listing -->
                                                                    </div>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.section title start-->
                                        </div>

                                    </div>
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
