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
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="lender-listing">
                            <div class="lender-head">
                            <div class="lender-logo" style="width:100%;!important;text-align: center;">
                                <h5>{{$item->business_info->business_name}}</h5></div>
                            </div>
                            <div class="lender-rate-box">
                                <div class="lender-ads-rate">
                                    <small>Persentasi Skor</small>
                                    <h3 class="lender-rate-value">{{isset($scoring['message']['credibiliti_percentage']) ? $scoring['message']['credibiliti_percentage']:''}}</h3>
                                </div>
                                <div class="lender-compare-rate">
                                    <small>Status </small>
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
                                <a href="/marketplace/{{$item->id}}" class="btn btn-default btn-block">Ajukan Pendanaan</a>
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

<div class="modal fade bd-example-modal-lg" id="modalRequestfund" tabindex="-1" role="dialog" aria-labelledby="modalRequestfund" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tanda Tangan Perjanjian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="bank-account-tabs st-tabs">
                <div class="tab-content">
                    <input type="hidden" id="id_to_reques" />
                    <div role="tabpanel" class="tab-pane fade show active" id="service1">
                        <h3>To open a Borrow Life account, you must:</h3>
                        <ul class="list-unstyled">
                            <li>Be aged 18+ (if you're under 18, check out our Borrow Savings account); and</li>
                            <li>Have a Borrow everyday account.</li>
                            <li>Vivamus at ultricies tortor, vel volutpat neque.</li>
                            <li>In justo turpis, aliquam id suscipit vel, suscipit eget nisl. </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary" id="lender_request_to_fung"> Danai</button>
        </div>
        </div>
    </div>
</div>

@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
