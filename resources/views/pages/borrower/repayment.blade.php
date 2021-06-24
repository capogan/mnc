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
                                <div class="col-xl-6" style="text-align: center;">
                                    <table class="table table-striped table-bordered mt-4 table-custom-fo-twelve">
                                        <tbody>
                                            <tr>
                                                <td>Nomor Pinjaman</td>
                                                <td><b>P{{date('Ymd').$repayment->id_request_loan}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Faktur</td>
                                                <td><b>{{$repayment->invoice_number}}</b></td>
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
                                                <td>Jumlah cicilan</td>
                                                <td><b>Rp {{number_format($repayment->amount ,0 ,'.','.')}} </b></td>
                                            </tr>
                                            <tr>
                                                <td>Jumplah permbayaran</td>
                                                <td><b>Rp {{number_format($repayment->amount ,0 ,'.','.')}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Bank penerima</td>
                                                <td><b>BNI</b></td>
                                            </tr>
                                            <tr>
                                                <td>No akun</td>
                                                <td><b>{{$va}}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-default" id="repayment_request">Lakukan pembayaran</button>
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
