<div class="tab-pane" id="invest" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">
                        <div class="row mt-4">
                            <div class="col">
                                <h6>Informasi Faktur</h6>
                                <hr>
                                </hr>
                            </div>
                        </div>
                        <form id="check_invoice_formss">
                            <div class="form-group">
                                <div class="input-invoice">
                                    <input type="text" name="invoice_number" id="invoice_number" class="form-control" placeholder="Masukkan Nomor Faktur dari PCG">
                                    <input type="text" name="identity_numbers_invoice" id="identity_numbers_invoice" class="form-control" value="{{ isset($get_user->identity_number) ? $get_user->identity_number : ''}}">
                                    <input type="text" name="request_loan_borrower" id="request_loan_borrower" class="form-control"  placeholder="Jumlah Pinjaman">
                                </div>
                                <!--<button type="button" class="btn btn-primary btn-block" id="check_invoice_form">
                                   Check Nomor Faktur
                                </button>
                                <br/>
                                <br/>
                                <br/>-->
                                
                                <!--<div class="row succes_respose_api_pcg"  style="display:none">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6>Informasi Invoice</h6>
                                        <hr>
                                        </hr>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="pinside40">
                                            <span>Nama : </span>
                                            <strong>
                                                <span class="pull-right load-load" id="name_of_pcg"></span></strong>
                                            <hr>
                                            <span>KTP : </span>
                                            <strong>
                                                <span class="pull-right load-load" id="id_number_of_pcg"></span></strong>
                                            <hr>
                                            <span>Invoice Number : </span>
                                            <strong>
                                                <span class="pull-right load-load" id="invoice_number_of_pcg"></span></strong>
                                            <hr>
                                            <span>Total Tagihan : </span>
                                            <strong>
                                                <span class="pull-right load-load" id="total_purchase_of_pcg"></span></strong>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="pinside40">
                                        <table class="table table-bordered"> 
                                        <thead> 
                                            <tr> 
                                                <th>Produk</th> 
                                                <th>Jumlah</th> 
                                                <th>Harga</th> 
                                            </tr> 
                                        </thead> 
                                        <tbody id="body-pcg-item"> 
                                        </tbody> 
                                    </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row error_respose_api_pcg" style="display:none">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="error_response_from_limit">
                                    </div>
                                </div>-->
                            
                                <!--<div class="row">
                                    <table class="table table-bordered"> 
                                        <thead> 
                                            <tr> 
                                                <th>#</th> 
                                                <th>First Name</th> 
                                                <th>Last Name</th> 
                                                <th>Username</th> 
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <tr> 
                                                <th scope="row">1</th> 
                                                <td>Mark</td> 
                                                <td>Otto</td> 
                                                <td>@mdo</td> 
                                            </tr>
                                        </tbody> 
                                    </table>
                                </div>-->

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="bg-light pinside40 outline">
                                                            <span>Total Pinjaman</span>
                                                            <strong>
                                                                <span class="pull-right" id="la_value">0</span></strong>
                                                                <input type="text" data-slider="true" id="value_loan" value="30000" data-slider-range="100000,100000" data-slider-step="100000" data-slider-snap="true" id="la">
                                                            <hr>
                                                            <span>Peride Pinjaman<strong>
                                                                <span class="pull-right"  id="loan_period_value">14</span> </strong>
                                                            </span>
                                                                <input type="text" data-slider="true" value="14" data-slider-range="14,28" data-slider-step="14" data-slider-snap="true" id="loan_period">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="row">
                                                            <!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Total Tagihan 
                                                                    <h2 class="pull-right load-load" id="total_purchase_loan">0</h2>
                                                                </div>
                                                            </div>-->

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Admin Fee <span style="font-size: 10px !important;">(2,5%)</span>
                                                                    <h2 class="pull-right load-load" id="admin_fee">0</h2>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    INTEREST FEE TOTAL <span style="font-size: 10px !important;">(2%)</span>
                                                                    <h2 class="pull-right load-load" id="interest_fee">0</h2>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Tagihan Pembayaran
                                                                    <h2 class="pull-right" id="monthly_invoice"></h2>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Total Pembayaran
                                                                    <h2 class="pull-right" id="total_repayment"></h2>
                                                                </div>
                                                            </div>

                                                            <!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    EMI
                                                                    <h2 id='emi' class="pull-right" id="monthly_invoice"></h2>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Total Interest
                                                                    <h2 id='tbl_int' class="pull-right"></h2>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline"> Payable Amount
                                                                    <h2 id='tbl_full' class="pull-right"></h2></div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="bg-light pinside30 outline">
                                                                    Interest Percentage
                                                                    <h2 id='tbl_int_pge' class="pull-right"></h2>
                                                                </div> 
                                                            </div> -->
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
                                <button type="button" class="btn btn-primary btn-block" id="request_loan_">
                                   Ajukan Pinjaman
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php
