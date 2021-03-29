@extends('layouts.app')
@section('content')

    <div class="section-space20 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white pinside30">
                        <h1 class="text-bold text-center">Hai {{ucfirst(Auth::user()->name)}}</h1>
                        <p class="lead">Terima Kasih.</p>
                        <p>Pnjaman Anda sudah disetujui dan dicairkan ke rekening PCG untuk pembelian dengan no Faktur <span class="text-bold">{{$no_invoice}}</span></p>
                        <p>PCG akan segera mengirimkan barang pesanan Anda, dan silahkan perbaharui status penerimaan barang pembelian Anda.</p>
                        <p><a href="/profile/transaction" class="btn-link ">Ya Saya Mengerti</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')



@endsection
@endsection
