@extends('layouts.app_lender')
@section('content')
<style>
     .nav-link {
        color: #000000;
    }
</style>
    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 ">
                <div class="card bg-light">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="false"><i class="fa fa-hourglass-end fa-lg"></i><p>  Kredit Macet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false"><i class="fa fa-clock-o fa-lg"></i><p>Keterlambatan</p></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="experience" aria-selected="false"><i class="fa fa-ban fa-lg"></i><p>Belum Lunas</p></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active show" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="tab-4" aria-selected="true"><i class="fa fa-thumbs-o-up fa-lg"></i><p>Sudah Dikembalikan</p></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-4" aria-selected="false"><i class="fa fa-history fa-lg"></i><p>Sedang Didanai</p></a>
                            </li>
                        </ul>
                        <table id="tb_dashboard" class="table table-striped table-bordered mt-4">
                            <thead>
                                <th style="width: 2px;">No</th>
                                <th>Nomor Invoice</th>
                                <th>Borrower</th>
                                <th>Jumlah Pinjaman</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
{{--                            @foreach($portofolio as $index => $item)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$index + 1}}</td>--}}
{{--                                    <td>{{ $item->invoice_number}}</td>--}}
{{--                                    <td>{{$item->business_info->business_name}}</td>--}}
{{--                                    <td>Rp {{ number_format(($item->repayment) ,0,',','.') }}</td>--}}
{{--                                    <td>{{$item->status_title->title}}</td>--}}
{{--                                    <td><a href="/portofolio/detail?p={{ \App\Helpers\Utils::encrypt($item->id)}}" >detail</a></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
@endsection
