@extends('layouts.app')
@section('content')
    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                <div class="card bg-light">
                        <div class="card-body">
                            <h4> Detail Pembayaran</h4>
                            <hr/>
                            <div class="row">
                                <div class="col-xl-3 ">
                                </div>
                                <div class="col-xl-6">
                                    @if($va)
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="bg-white pinside40 number-block mb30 outline">
                                                <div class="circle"><i style="font-size: 24px !important;" class="flaticon-rich icon-primary"></i></div>
                                                <h5>Total Pembayaran</h5>
                                                <h2>Rp {{number_format($va->total_payment ,0,'','.')}}</h2>
                                                <br/>
                                                <h5>Nomor Virtual Account</h5>
                                                <h2>{{ chunk_split($va->va_number, 4, ' ') }}</h2>
                                                <h5>Atas Nama</h5>
                                                <h2>PT Siapdanain</h2>

                                                <p style="color: red; font-size:10px !important;">* Akun virtual yang muncul hanya berlaku 6 jam , Silahkan melakukan pembayaran secepatnya.</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div>
                                    <table class="table table-striped table-bordered mt-4 table-custom-fo-twelve">
                                        <tbody>
                                            <tr>
                                                <td>Nomor Pinjaman</td>
                                                <td><b>P{{date('Ymd').$repayment->req_loan_id}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Faktur</td>
                                                <td><b>{{$repayment->invoice_number}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pinjaman</td>
                                                <td><b> Rp {{number_format($repayment->repayment ,0,'.','.')}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td><b>{{$personal->first_name.' '.$personal->last_name}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor KTP</td>
                                                <td><b>{{$personal->identity_number}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Periode Pinjaman</td>
                                                <td><b>{{$repayment->loan_period}} Hari</b></td>
                                            </tr>
                                            <tr>
                                                <td>Cicilan Ke-</td>
                                                <td><b>{{$repayment->stages}} </b></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah cicilan</td>
                                                <td><b>Rp {{number_format($repayment->amount ,0 ,'.','.')}} </b></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah permbayaran</td>
                                                <td><b>Rp {{number_format($repayment->amount ,0 ,'.','.')}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Bank penerima</td>
                                                <td><b>BNI</b></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    @if(!$va)
                                    <div style="text-align: center;">
                                        <button class="btn btn-default" chars="{{$installment}}" id="repayment_request">Lakukan pembayaran</button>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
