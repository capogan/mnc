<div class="tab-pane" id="invest" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">

                        <form id="check_invoice_formss">
                            <h3>Informasi Faktur</h3>
                            <hr>
                            <div class="result-message-i"></div>
                            <div class="form-group">
                                <div class="input-invoice">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <h6>Nomor Faktur<span>*</span></h6>
                                            <input type="text" name="invoice_number" id="invoice_number" class="form-control" placeholder="Masukkan Nomor Faktur dari PCG">
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col">
                                            <h6>Kode Member<span>*</span></h6>
                                            <input type="text" name="member_code" id="member_code" class="form-control" placeholder="Masukkan Kode Member">
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col">
                                            <h6>Nomor KTP<span>*</span></h6>
                                            <input type="text" name="identity_numbers_invoice" id="identity_numbers_invoice" class="form-control" value="{{ isset($get_user->identity_number) ? $get_user->identity_number : ''}}">
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col">
                                            <h6>Nilai Pembelian<span>*</span></h6>
                                            <input type="text" name="request_loan_borrower" id="request_loan_borrower" class="form-control"  placeholder="Nilai Pembelian">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
{{--                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">--}}
{{--                                                        <div class="bg-light pinside40 outline">--}}
{{--                                                            <span>Total Pinjaman</span>--}}
{{--                                                            <strong>--}}
{{--                                                                <span class="pull-right" id="la_value">0</span></strong>--}}
{{--                                                                <input type="text" data-slider="true" id="value_loan" value="30000" data-slider-range="100000,100000" data-slider-step="100000" data-slider-snap="true" id="la">--}}
{{--                                                            <hr>--}}
{{--                                                            <span>Peride Pinjaman<strong>--}}
{{--                                                                <span class="pull-right"  id="loan_period_value">14</span> </strong>--}}
{{--                                                            </span>--}}
{{--                                                                <input type="text" data-slider="true" value="14" data-slider-range="14,28" data-slider-step="14" data-slider-snap="true" id="loan_period">--}}
{{--                                                            <hr>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="row">

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Periode Pinjaman</span>
                                                                    <input type="text" data-slider="true" value="14" data-slider-range="14,28" data-slider-step="14" data-slider-snap="true" id="loan_period">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    <span>Nilai Pembayaran Pembelian</span>
                                                                    <h4 class="pull-right load-load" id="invoice_loan_">0</h4>
                                                                </div>
                                                            </div>


                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Admin Fee <span style="font-size: 10px !important;">(2,5%)</span>
                                                                    <h4 class="pull-right load-load" id="admin_fee">0</h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                   Pinjaman Diajukan</span>
                                                                    <h2 class="pull-right load-load" id="invoice_loan_requested">0</h2>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Bunga <span style="font-size: 10px !important;">(2%)</span>
                                                                    <h4 class="pull-right load-load" id="interest_fee">0</h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Total Pembayaran
                                                                    <h2 class="pull-right" id="total_repayment">0</h2>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Detail Cicilan
                                                                    <h4 class="pull-right" id="monthly_invoice"></h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div id="loantable" class='table table-striped table-bordered loantable table-responsive'></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="table-invoice">
                                </div>
                                <button type="button" data-text="Ajukan Pinjaman" class="btn btn-primary btn-block" id="request_loan_">
                                   Ajukan Pinjaman
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

