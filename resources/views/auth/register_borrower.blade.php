@extends('layouts.app_auth')
@section('content')
    <div class="container-fluid" style="height: 100vh; display: block;">
        <div class="row no-gutter  h-100">
            <div class="col-md-7 bg-login">
            </div>
            <div class="col-md-5 bg-light">
                <div class="login d-flex align-items-center py-4">
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-10  mx-auto">
                                <h4 class="card-title text-center">Buat Akun</h4>
                                <p class="text-center">Silahkan Membuat Akun anda</p>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="hidden" name="group" id="group" value="{{$group}}">
                                    <input type="hidden" name="level" id="level" value="{{$level}}">
                                    <div class="form-group input-group">
                                        <input name="name" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" type="text">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div> <!-- form-group// -->
                                    <div class="form-group input-group">

                                        <input name="email" id="email" class="form-control  @error('email') is-invalid @enderror"  value="{{ old('email') }}"  placeholder="Alamat Email" type="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div> <!-- form-group// -->

                                    <div class="form-group input-group">
                                        <input name="password" id="password" class="form-control  @error('password') is-invalid @enderror"  placeholder="Buat Password" type="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div> <!-- form-group// -->

                                    <div class="form-group input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
                                    </div> <!-- form-group// -->

                                    <div class="form-group input-group">
                                        <div class="input-group mb-3">
                                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"  placeholder="No Telepon" required autocomplete="phone-number">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label style="font-size: 11px;color: red;">* Kode verifikasi akan kami kirim melalui sms ke nomor telepon yang di daftarkan.</label>
                                    </div>

                                    <div class="form-group">
                                        <h6>Persyaratan</h6>
                                        <div class="form-check" style="font-size: small;">
                                            <label><input type="checkbox" class="form-check-input @error('term') is-invalid @enderror" id="term" name="term">
                                                <p class="form-check-label" for="exampleCheck1">Saya telah membaca dan saya setuju dengan <a href="#">Kebijakan</a> & <a href="#">syarat Ketentuan</a></p></label>
                                        </div>
                                        <div class="form-check" style="font-size: small;">
                                            <label> <input type="checkbox" class="form-check-input @error('permission') is-invalid @enderror" id="permission" name="permission">
                                                <p class="form-check-label" for="exampleCheck1">Izinkan SIAP untuk mengirimkan saya informasi melalui email</p></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btn_register" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"> Buat Akun </button>
                                    </div>

                                    <p class="text-center">Sudah Memiliki Akun? <a href="/login">Masuk</a> </p>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
