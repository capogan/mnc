@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb30">
                <div class="card bg-light card-aggrement">
                    <div class="scrollable">
                        <div class="card-body">
                            <div class="text-center">
                            <h2>PERJANJIAN PINJAMAN</h2>
                            <h5>No : {{$no_invoice}}</h5>
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
                            <button type="submit" onclick="updated_status('{{$id_loan}}','20')" class="btn btn-primary btn-sm pull-left">KLIK untuk tanda tangan</button>

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
