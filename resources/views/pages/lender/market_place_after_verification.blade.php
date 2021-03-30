@extends('layouts.app_lender')
@section('content')
<div class="container" style="margin-top:40px;">

    <div class="row">
        <div class="col-md-12">
            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb100 text-center section-title">
                    <!-- section title start-->
                    <h1>Daftar Pendanaan</h1>
                    <p class="lead">We’re all about helping you reach your next financial goal—great rates, less fees, unprecedented service, and awesome loan help.    </p>
                </div>
                <!-- /.section title start-->
            </div>
            <div class="wrapper-content bg-white pinside40">
                <div class="row">
                @foreach($borrower_request as $item)
                    @if($item->business_info && $item->scoring && $item->personal_info)
                    <?php 
                        $scoring  = json_decode($item->scoring->detail_scoring , true);
                        //print_r($scoring);
                        //print_r($scoring['message']['credibiliti_percentage']);
                        
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="lender-listing">
                            <div class="lender-head">
                            <div class="lender-logo" style="width:100%;!important;text-align: center;">
                                <h5>{{$item->business_info->business_name}}</h5></div>
                            </div>
                            <div class="lender-rate-box">
                                <div class="lender-ads-rate">
                                    <small>Credibility Score</small>
                                    <h3 class="lender-rate-value">{{isset($scoring['message']['credibiliti_percentage']) ? $scoring['message']['credibiliti_percentage']:''}}</h3>
                                </div>
                                <div class="lender-compare-rate">
                                    <small>Jumlah Pinjaman </small>
                                    <h3 class="lender-rate-value">{{isset($scoring['message']['credibiliti_status']) ? $scoring['message']['credibiliti_status']:''}}</h3>
                                </div>
                            </div>
                            <div class="lender-feature-list">
                                <ul class="listnone bullet bullet-check-circle-default">
                                    <li>Jumlah Pinjaman :  <b> {{number_format($item->loan_amount , 0 ,'.' ,'.')}}</b></li>
                                    <li>Pengembalian : <b>{{$item->loan_period}} hari </b></li>
                                    <li>Cicilan : <b>{{$item->loan_period == 14 ? '2' : '4'}} x</b></li>
                                    <li>Imbal hasil : <b>{{number_format($item->interest_fee_amount , 0 ,'.' ,'.')}}</b></li>
                                    <li>Industri : <b>{{$item->business_info->income_factory->industry_sectore}}</b></li>
                                </ul>
                            </div>
                            <div class="lender-actions">
                                <a href="#" class="btn btn-default btn-block">Ajukan Pendanaan</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>

@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection