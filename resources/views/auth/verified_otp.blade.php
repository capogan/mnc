@extends('layouts.app_auth')
@section('content')
@section('style')
    <link href="{{asset('css/otp.css')}}" rel="stylesheet">
@endsection

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
                                    <div class="form-group input-group digit-group">
{{--                                        <input id="kode_otp1" type="text" class="form-control verified" name="kode_otp_1" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">--}}
{{--                                        <input id="kode_otp2" type="text" class="form-control verified" name="kode_otp_2" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">--}}
{{--                                        <input id="kode_otp3" type="text" class="form-control verified" name="kode_otp_3" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">--}}
{{--                                        <input id="kode_otp4" type="text" class="form-control verified" name="kode_otp_4" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">--}}
{{--                                        <input id="kode_otp5" type="text" class="form-control verified" name="kode_otp_5" maxlength="1" onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)">--}}
{{--                                        <input id="kode_otp6" type="text" class="form-control verified" name="kode_otp_6" maxlength="1" onkeyup="onKeyUpEvent(6, event)" onfocus="onFocusEvent(6)">--}}
                                        <input type="text" id="digit-1" class="form-control verified"  name="kode_otp_1" data-next="digit-2" />
                                        <input type="text" id="digit-2" class="form-control verified" name="kode_otp_2" data-next="digit-3" data-previous="digit-1" />
                                        <input type="text" id="digit-3" class="form-control verified"   name="kode_otp_3" data-next="digit-4" data-previous="digit-2" />
                                        <input type="text" id="digit-4" class="form-control verified" name="kode_otp_4" data-next="digit-5" data-previous="digit-3" />
                                        <input type="text" id="digit-5" class="form-control verified"  name="kode_otp_5" data-next="digit-6" data-previous="digit-4" />
                                        <input type="text" id="digit-6" class="form-control verified"  name="kode_otp_6" data-previous="digit-5" />
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check" style="font-size: small;">
                                            <p class="text-center" >Tidak menerima kode verivikasi? <a href="javascript:void(0)" id="send_otp_">kirim Ulang</a> </p>
                                        </div>
                                    </div>

                                </form>
                                    <div class="form-group">
                                        <button type="submit" id="btn_verified_otp" data-text="Verifikasi" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"> Verifikasi </button>
                                    </div>
                                    <p class="text-center">Sudah Memiliki Akun? <a href="/logout">Masuk</a> </p>
                            </div>
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

