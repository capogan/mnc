@extends('layouts.app_auth')

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
                                   

                                </form>
                                 <p class="divider-text">
                                        <span class="bg-light">atau</span>
                                    </p>
                                <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <a href="/register/lender">
    
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                 <img src="/images/creditor.svg" class="users" alt="prof" />
                                                            </div>
    
                                                            <div class="col" style="font-size: x-small;">
                                                                <span>Daftar Sebagai</span>
                                                                <span>Pendana</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="/register/borrower">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <img src="/images/borrow.svg" class="users" alt="prof" />
                                                            </div>
                                                            <div class="col" style="font-size: x-small;">
                                                                <span>Daftar Sebagai</span>
                                                                <span>Peminjam</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
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
