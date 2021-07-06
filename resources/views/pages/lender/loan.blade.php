@extends('layouts.app')
@section('content')


    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                <div class="card wrapper-content bg-white pinside40">
                        <div class="card-body">
                            <div class="row column-custom">
                                <div class="col-5">
                                {{-- Status Pendanaan : {{$document->status}} --}}
                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                            <div class="row column-custom">
                                <div class="col-5">
                                Borrower: {{$document->business_info->business_name}}
                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                            <div class="row column-custom">
                                <div class="col-5">
                                    No Invoice : {{$document->invoice_number}}
                                </div>
                                <div class="col-6">

                                </div>
                            </div>
                            <div class="row column-custom">
                                <div class="col-5">
                                    Total Pembiayaan : {{'Rp '.number_format($document->repayment, 0 , '.' ,',')}}
                                </div>
                                <div class="col-6">

                                </div>
                            </div>
                            <div class="row column-custom">
                                <div class="col-5">
                                    Tanggal Pengajuan Pendanaan : {{date('Y-m-d' , strtotime($document->created_at))}}
                                </div>
                                <div class="col-6">
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="m-separator col-md-12 m-separator--dashed"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                     <!--<div class="testimonial-block mb30">
                                            <div class="alert alert-success" role="alert">
                                                info tanda tangan
                                            </div>
                                        </div>-->
                                 </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <h4>Dokumen Perjanjian Pemberi Pinjaman dengan Penerima Pinjaman </h4>
                                    <div class="row column-custom">
                                        <div class="col-5">
                                            Status Dokumen : {{$document->loandocument->document->status_document}}
                                        </div>
                                        <div class="col-6">

                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($document->loandocument)
                                          @if ($document->loandocument->document)
                                            @if ($document->loandocument->document->signers)
                                                @foreach ($document->loandocument->document->signers as $item)
                                                    <tr class="text-center">
                                                        <td>{{$item->name}}{{$item->status}}</td>
                                                        <td>{{ date('Y-m-d' , strtotime($document->loandocument->created_at)) }}</td>
                                                        <td>{{$item->email}} </td>
                                                        @if($item->email == 'ogan@capioteknologi.co.id')
                                                            <td>complete</td>
                                                        @else
                                                            <td>{{$item->status_sign == '' ? 'waiting' : $item->status_sign}} </td>
                                                        @endif
                                                        
                                                        @if($item->status_sign != 'complete' && $item->email != 'ogan@capioteknologi.co.id')
                                                            <td><a href="/digisigngetdocument?doc={{ \App\Helpers\Utils::encrypt($document->loandocument->id)}}" class="btn btn-primary btn-xs"> Tanda tangani dokumen </a></td>
                                                        @else
                                                        <td></td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif
                                          @endif
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row col-md-12">
                                <div class="m-separator col-md-12 m-separator--dashed"></div>
                            </div>
                            <br>
                            @if(count($loan_installments) > 0)
                                <br/>
                                <div class="row">

                                        <div class="col-md-12">
                                            <h4>Detail Cicilan</h4>
                                        </div>
                                        <table class="table table-striped table-bordered">
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
                                                        <td></td>
                                                        <td>{{Utils::date_in_indonesia($val->due_date_payment)}}</td>
                                                        <td>{{$val->status_name}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                </div>
                                @endif
                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection
<style>
    .table>thead>tr>th {
        padding: 12px 43px 12px;
        line-height: 1.4;
        vertical-align: top;
        border-top: 1px solid #ddd;
        text-align: center;
        font-size: 12px;
    }
    .column-custom{
        padding: 10px 0px 10px 0px;
    }
    .m-separator.m-separator--dashed {
        border-bottom: 1px dashed #ebedf2;
        width: 100%;
        padding: 20px 0px 20px 0px;
    }
    </style>
