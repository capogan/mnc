@extends('layouts.app')
@section('css')
    <link href="{{asset('css/transaction.css')}}" rel="stylesheet">
@endsection
@section('content')


    <div class="container containers-with-margin">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb30">
                <div class="card bg-light card-aggrement">
                    <div class="scrollable">
                        <div class="card-body">
                            <div class="text-center">
                            <h2>KETENTUAN TANDA TANGAN DIGITAL PADA PERJANJIAN PINJAMAN</h2>

                            <input type="hidden" id="invoice_number" value="{{$no_invoice}}"/>
                            </div>
                            <p>PT. sistem informasi dan aplikasi pembiayaan [SIAP] menerapkan tanda tangan digital dalam setiap penandatanganan perjanjian pinjam meminjam uang dalam layanan SIAP.</p>
                            <p>PT. SIAP menyediakan layanan tanda tangan elektronik yang baik dan berkualitas dalam membantu interaksi dengan peminjam dan pemberi pinjamannya.</p>
                            <p>Berikut ini adalah Informasi tentang Tanda Tangan Digital ;</p>
                            <ul class="">
                                <li>PT, Siap dalam menyediakan layanan tanda tangan Eletronik bekerja sama dengan Platform Digisign. sehingga dalam hal ini Anda diharuskan dan akan di hubungkan untuk melakukan pendaftaran pada platform Digisign.</li>
                                <li>Tanda tangan digital adalah skema matematis yang digunakan untuk membuktikan keaslian pesan atau dokumen digital. Skema ini menjadi jaminan bahwa data dan informasi benar-benar berasal dari sumber yang benar Tanda tangan digital terdiri dari deret fungsi hash yang dihasilkan dari proses algoritme fungsi hash tertentu yang kemudian disandikan (dienkripsi) dengan algoritme kriftografi kunci asimetris. Untuk memverifikasinya digunakan kunci publik dari algoritme tesebut.</li>
                                <li>Tanda Tangan Digital telah tertera dalam UU Nomor 11 Tahun 2008 Pasal 11 ayat 1 tentang Informasi dan Transaksi Elektronik (UU ITE), lalu Peraturan Pemerintah Nomor 82 Tahun 2012 Pasal 52 ayat 1 dan 2 tentang Penyelenggaraan Sistem dan Transaksi Elektronik.</li>
                                <li>Baca dan pelajari secara baik semua isi dari perjanjian yang akan di tanda tangani.</li>
                                <li>Persiapkan Ponsel anda. karena anda akan di haruskan memasukan kode OTP sebagai tanda verifikasi. (<b>dilarang memberikan informasi tentang kode OTP kepada siapapun. termaksud seseorang yang mengatasnamakan PT. SIAP</b></li>
                            </ul>
                            <button type="button" id="request_file_assign" onclick="ssssssupdated_status('{{$id_loan}}','28')" class="btn btn-primary btn-sm pull-left">KLIK untuk tanda tangan</button>
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
