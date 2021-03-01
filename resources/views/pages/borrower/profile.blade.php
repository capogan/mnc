@extends('layouts.app')

@section('content')
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: 50px !important;
        }
    </style>


        <!-- content start -->
        <div class="container">

                <div class="row">
                    <div class="">
                        <div class="st-tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false">Berkas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="experience" aria-selected="false">Akun Bank</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="experience" aria-selected="false">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-5" data-toggle="tab" href="#service5" role="tab" aria-controls="tab-5" aria-selected="false">Transaksi</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="service1">
                                    @include('pages.borrower.information.profile_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service2">
                                    @include('pages.borrower.information.file_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service3">
                                    @include('pages.borrower.information.bank_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service4">
                                    @include('pages.borrower.information.bank_information')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="service5">
                                    @include('pages.borrower.information.finance_information')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>



    <!-- Modal -->
    @if ($get_user === null)
    <div class="modal fade" id="input_identity_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Masukkan Nomor KTP Anda</h5>
                </div>
                <form id="check_identity_form">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="identity_number" name="identity_number">
                        <div class="alert result-message" role="alert"></div>
                    </div>

                    <div class="modal-footer">
                        <a href="/"><button type="button" class="btn btn-secondary">Batal</button></a>
                        <button type="submit" class="btn btn-primary">Cek Keanggotaan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endif

    <div id="responses-ajax" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content responses-ajax-messages">
            </div>
        </div>
    </div>

@section('js')

        <script src="{{ asset('/script/profile.js') }}"></script>

@endsection
@endsection
