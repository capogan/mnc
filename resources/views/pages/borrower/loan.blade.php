@extends('layouts.app')
@section('content')


    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                
                <div class="card bg-light">
                        <div class="card-body">
                            <h4> Detail cicilan</h4>
                            <hr/>
                            <table class="table table-striped table-bordered mt-4 table-custom-fo-twelve">
                                <thead>
                                <tr>
                                    <th>Nomor Invoice</th>
                                    <th>Pembayaran ke-</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Tanggal Jatuh tempo</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($loan_installments as $val)
                                        <tr class="text-center">
                                            <td>{{$no_invoice}}</td>
                                            <td >{{$val->stages}}</td>
                                            <td>Rp {{ number_format(($val->amount) ,0,',','.') }}</td>
                                            <td>{{$val->date_payment}}</td>
                                            <td>{{Utils::date_in_indonesia($val->due_date_payment)}}</td>
                                            <td>{{$val->status_name}}</td>
                                            <td><a href="/repayment?installment={{ \App\Helpers\Utils::encrypt($val->id)}}" class="btn btn-success btn-xs"> Bayar </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection
