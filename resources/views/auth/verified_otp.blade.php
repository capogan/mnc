@extends('layouts.app_auth')

@section('content')
    <div class="container-fluid" style="height: 100vh; display: block;">
        <div class="row no-gutter  h-100">
            <div class="col-md-7 bg-login">
            </div>
            <div class="col-md-5 bg-light">
                <div class="login d-flex align-items-center py-4">
                    <div class="container" style="padding-top: 200px;">
                        <div class="row">
                            <div class="col-lg-10  mx-auto">
                                <h4 class="card-title text-center">Verifikasi</h4>
                                <p class="text-center">Masukkan kode verifikasi yang kami kirim ke +62{{substr(Auth::user()->phone_number_verified ,0, 8)}} xxx</p>
                                <p class="text-center" id="error_response" style="font-size: small; color:red;"></p>
                                <form method="POST" id="form_verified">
                                    @csrf
                                    <div class="form-group input-group">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_1">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_2">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_3">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_4">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_5">
                                        <input id="kode_otp" type="text" class="form-control verified" name="kode_otp_6">
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-check" style="font-size: small;">
                                            <p class="text-center" >Tidak menerima kode verivikasi? <a href="javascript:void(0)" id="send_otp_">kirim Ulang</a> </p>
                                        </div>
                                    </div> 
                                    
                                </form>
                                    <div class="form-group">
                                        <button type="submit" id="btn_verified_otp" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"> Verifikasi </button>
                                    </div>
                                    <p class="text-center">Sudah Memiliki Akun? <a href="/login">Masuk</a> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @section('js')
        <script src="{{ asset('/script/register.js') }}"></script>
    @endsection

@endsection
<style>
    .invalid-feedback{
        display: block!important
    }
    .verified{
        margin: 13px !important;
        border-radius: 10px !important;
        text-align: center !important;
        font-weight: bold !important;
}
    }
    </style>