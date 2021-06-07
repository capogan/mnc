@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 mb30">
            <div class="px-4 py-5 my-5 text-center">
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Proses tanda tangan berhasil.
                </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/" type="button" class="btn btn-primary btn-lg px-4 gap-3">Kembali ke home</a>
                    <a href="/myprofile" type="button" class="btn btn-primary btn-lg px-4 gap-3">Lihat profile</a>
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
