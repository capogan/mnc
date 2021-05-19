@extends('layouts.app')
@section('content')


    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                <div class="card bg-light">
                        <div class="card-body">
                            <div class="row">
                                    <div class="row font-custom">
                                        <div class="col-md-12">
                                            <h4>Informasi Borrower</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Usaha</label>  :  <b>{{$profile->business_info->business_name}}</b> 
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Deskripsi Usaha</label> : <b>{{$profile->business_info->business_description}}</b>
                                        </div>
                                    </div>
                                    @if($profile->status == '21')
                                    <table class="table table-striped table-bordered mt-4">
                                        <thead>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            <th>Pembayaran ke-</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Tanggal Jatuh tempo</th>
                                            <th>Status</th>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                
                                    <div class="row font-custom" style="width: 100%;">
                                    </br>
                                    </br>

                                        <div class="col-md-12">
                                            <div class="alert alert-danger" >Menunggu Konfirmasi tanda tangan</div>
                                        </div>
                                    </div>
                                    @endif
                            </div>

                            
                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection
