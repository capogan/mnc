@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="height: 100vh; display: block;">
        <div class="row no-gutter  h-100">
            <div class="col-md-7 bg-login">

            </div>
            <div class="col-md-5 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">

                        <div class="row pt-5">

                            <div class="col-lg-10  mx-auto pt-3">
                                <div class="text-center mb-3">
                                    <h3 class="display-5 title">MASUK</h3> <br>
                                    <p>Silakan masuk menggunakan akun Anda</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="email" name="email" type="email" placeholder="Email address"  autofocus="" class="form-control  @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="password" name="password" type="password" placeholder="Password"  class="form-control @error('password') is-invalid @enderror""><br> </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mb-3" style="text-align: right;">
                                        <label>Lupa kata sandi ?</label>
                                    </div>

                                    <button type="submit" id="btnlogin"  class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Masuk</button>
                                    <p class="divider-text">
                                        <span class="bg-light">Atau</span>
                                    </p>
                                    <div class="text-center d-flex justify-content-between mt-3">
                                        <p> <a href="/register" class="font-italic text-muted"> <u>Belum Punya
                                                    Akun?</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script src="{{ asset('/script/login.js') }}"></script>
@endsection
@endsection
