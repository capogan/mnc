@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row mt-4">
        <div class="col-xl-12 ">
            <div class="card bg-light">
                    <div class="card-body">
                        <table class="table table-striped table-bordered mt-4 table-custom-fo-twelve">
                            <thead>
                            <tr>
                                <td style="width: 2px;">No</td>
                                <td>Nomor Invoice</td>
                                <td>Borrower</td>
                                <td>Jumlah Pinjaman</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($portofolio as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{ $item->invoice_number}}</td>
                                        <td>{{$item->business_info->business_name}}</td>
                                        <td>Rp {{ number_format(($item->repayment) ,0,',','.') }}</td>
                                        <td>{{$item->status_title->title}}</td>
                                        <td><a href="/portofolio/detail?p={{ \App\Helpers\Utils::encrypt($item->id)}}" >detail</a></td>
                                    </tr>
                                @endforeach
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


