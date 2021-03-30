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
                        <p><button type="submit" onclick="updated_status('{{$id_loan}}','27')" class="btn btn-primary">Ya Saya Mengerti</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
@endsection
