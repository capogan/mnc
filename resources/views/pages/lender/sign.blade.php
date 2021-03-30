@extends('layouts.app_lender')
@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb30">
            @if($loan)
                <div class="card bg-light card-aggrement">
                    <div class="scrollable">

                        <div class="card-body">
                            <div class="text-center">
                            <h2>PERJANJIAN PEMBERIAN PINJAMAN</h2>
                            <h5>No : {{$loan->invoice_number}}</h5>
                            </div>
                            <p>Duis faucibus sed leo a maximus. Donec hendrerit velit lacus, eu molestie metus rutrum nonecenas quis purus bibendum arcu euismod elementum id in quam.</p>
                            <ul class=" bullet bullet-check-circle list-unstyled">
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                                <li>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</li>
                            </ul>
                            <button type="submit" onclick="updated_status('{{$loan->id}}','19')" class="btn btn-primary btn-sm pull-left">KLIK untuk tanda tangan</button>

                    </div>
                </div>
                </div>
                @else
                <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title mb60" style="text-align:center;">
                        <div class="alert alert-danger" role="alert">
                            Maaf, pinjaman tidak ditemukan.
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>

@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
@endsection
