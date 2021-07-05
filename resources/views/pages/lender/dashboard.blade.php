@extends('layouts.app_lender')
@section('content')
<style>
     .nav-link {
        color: #000000;
    }

     table {
         display: block;
         overflow-x: auto;
         white-space: nowrap;
     }
    td{
        text-align: center;
    }

</style>
    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                <div class="card bg-light">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="false"><i class="fa fa-hourglass-end fa-lg"></i><p>  Kredit Macet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false"><i class="fa fa-clock-o fa-lg"></i><p>Keterlambatan</p></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="tab-4" aria-selected="true"><i class="fa fa-thumbs-o-up fa-lg"></i><p>Sudah Dikembalikan</p></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-4" aria-selected="false"><i class="fa fa-history fa-lg"></i><p>Sedang Didanai</p></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="service1">

                                    <table id="tb_dashboard" class="table table-striped table-bordered mt-4">
                                        <thead>
                                        <th style="width: 2px;">No</th>
                                        <th>No Pendanaan</th>
                                        <th>ID Peminjam</th>
                                        <th>Nama Usaha Peminjam</th>
                                        <th>Nilai Pinjaman</th>
                                        <th>Nilai Pengembalian</th>
                                        <th>Detail Cicilan</th>
                                        <th>Tanggal Pencairan</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Lihat perjanjian</th>
                                        </thead>
                                        <tbody>
                                            @foreach($loan_macet as $index => $item)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{ $item->invoice_number}}</td>
                                                    <td>{{$item->uid}}</td>
                                                    <td>{{$item->business_name}}</td>
                                                    <td>Rp {{ number_format(($item->loan_amount) ,0,',','.') }}</td>
                                                    <td>Rp {{ number_format(($item->repayment) ,0,',','.') }}</td>
                                                    <td>{{$item->loan_period}} Hari</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
{{--                                                    <td>{{$item->status_title->title}}</td>--}}
{{--                                                    <td><a href="/portofolio/detail?p={{ \App\Helpers\Utils::encrypt($item->id)}}" >detail</a></td>--}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="service2">

                                <table id="tb_dashboard" class="table table-striped table-bordered mt-4">
                                    <thead>
                                    <th style="width: 2px;">No</th>
                                    <th>No Pendanaan</th>
                                    <th>ID Peminjam</th>
                                    <th>Nama Usaha Peminjam</th>
                                    <th>Nilai Pinjaman</th>
                                    <th>Nilai Pengembalian</th>
                                    <th>Detail Cicilan</th>
                                    <th>Tanggal Pencairan</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Lihat perjanjian</th>
                                    </thead>
                                    <tbody>
                                    @foreach($loan_macet as $index => $item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{ $item->invoice_number}}</td>
                                            <td>{{$item->uid}}</td>
                                            <td>{{$item->business_name}}</td>
                                            <td>Rp {{ number_format(($item->loan_amount) ,0,',','.') }}</td>
                                            <td>Rp {{ number_format(($item->repayment) ,0,',','.') }}</td>
                                            <td>{{$item->loan_period}} Hari</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            {{--                                                    <td>{{$item->status_title->title}}</td>--}}
                                            {{--                                                    <td><a href="/portofolio/detail?p={{ \App\Helpers\Utils::encrypt($item->id)}}" >detail</a></td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="service4">
                                <table id="tb_dashboard" class="table table-striped table-bordered mt-4">
                                    <thead>
                                    <th style="width: 2px;">No</th>
                                    <th>No Pendanaan</th>
                                    <th>ID Peminjam</th>
                                    <th>Nama Usaha Peminjam</th>
                                    <th>Nilai Pinjaman</th>
                                    <th>Nilai Pengembalian</th>
                                    <th>Detail Cicilan</th>
                                    <th>Tanggal Pencairan</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Lihat perjanjian</th>
                                    </thead>
                                    <tbody>
                                    @foreach($loan_aktif as $index => $item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{ $item->invoice_number}}</td>
                                            <td>{{ $item->uid}}</td>
                                            <td>{{ $item->business_name}}</td>
                                            <td>{{ $item->loan_amount}}</td>
                                            <td>{{ $item->repayment}}</td>
                                            <td>{{ $item->stages}}</td>
                                            <td>{{ $item->disbursment_date}}</td>
                                            <td>{{ $item->ddp}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="service5">
                                <table id="tb_dashboard" class="table table-striped table-bordered mt-4">
                                    <thead>
                                    <th style="width: 2px;">No</th>
                                    <th>No Pendanaan</th>
                                    <th>ID Peminjam</th>
                                    <th>Nama Usaha Peminjam</th>
                                    <th>Nilai Pinjaman</th>
                                    <th>Nilai Pengembalian</th>
                                    <th>Detail Cicilan</th>
                                    <th>Tanggal Pencairan</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Lihat perjanjian</th>
                                    </thead>
                                    <tbody>
                                    @foreach($loan_aktif as $index => $item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{ $item->invoice_number}}</td>
                                            <td>{{ $item->uid}}</td>
                                            <td>{{ $item->business_name}}</td>
                                            <td>{{ $item->loan_amount}}</td>
                                            <td>{{ $item->repayment}}</td>
                                            <td>{{ $item->stages}}</td>
                                            <td>{{ $item->disbursment_date}}</td>
                                            <td>{{ $item->ddp}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
@endsection
