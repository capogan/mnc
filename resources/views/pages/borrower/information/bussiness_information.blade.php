<div class="tab-pane" id="Bisnis" role="tabpanel">
<div class="row">
    <div class="col">
        <div class=" bg-white ">
            <div class="contact-form mb60">
                <div class=" ">
                    <div class="col">
                        <div class="mb60  section-title  ">
                            <!-- section title start-->
                            <h3>Informasi Bisnis</h3>
                            <hr>
                        </div>
                    </div>
                    <form id="form_borrower_business_information">
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Nama Perusahan<span>*</span></h6>
                                <input type="text" value="{{$business->business_name ?? ''}}" class="form-control" placeholder="Nama Perusahaan" id="name_of_bussiness" name="name_of_bussiness">
                            </div>

                            <div class="col">
                                <h6>Kriteria Perusahan<span>*</span></h6>
                                <select class="form-control" name="business_province">
                                    <option selected=""> Pilih Kategori Industri</option>
                                    @foreach($criteria as $key => $val)
                                        @if(isset($business->id_cap_of_business))
                                            <option value="{{$val->id}}" {{  $business->id_cap_of_business== $val->id ? "selected" : "" }} >{{$val->title_business}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->title_business}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Lama Bekerja sama<span>*</span></h6>
                                <select class="form-control" name="business_partner">
                                    <option >--Pilih--</option>
                                    @foreach($partner_since as $key => $val)
                                        @if(isset($business->partnership_since))
                                            <option value="{{$val->id}}" {{  $business->partnership_since == $val->id ? "selected" : "" }} >{{$val->title}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Sewa Tempat Usaha<span>*</span></h6>
                                <select class="form-control" name="business_location_status">
                                    <option >--Pilih--</option>
                                    @foreach($building_status as $key => $val)
                                        @if(isset($business->business_place_status))
                                            <option value="{{$val->id}}" {{  $business->business_place_status== $val->id ? "selected" : "" }} >{{$val->place_status_name}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->place_status_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Lama Usaha<span>*</span></h6>
                                <select class="form-control" name="business_established_since">
                                    <option >--Pilih--</option>
                                    @foreach($estabilished as $key => $val)
                                        @if(isset($business->business_established_since))
                                            <option value="{{$val->id}}" {{  $business->business_established_since == $val->id ? "selected" : "" }} >{{$val->title}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Status badan Usaha<span>*</span></h6>
                                <select class="form-control" name="legality_status">
                                <option >--Pilih--</option>
                                    @foreach($legality as $key => $val)
                                        @if(isset($business->legality_status))
                                            <option value="{{$val->id}}" {{  $business->legality_status == $val->id ? "selected" : "" }} >{{$val->legality_name}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->legality_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Industri<span>*</span></h6>
                                <select class="form-control " name="business_category">
                                    <option selected=""> Pilih Kategori Industri</option>
                                    @foreach($industry as $key => $val)
                                        @if(isset($business->id_credit_score_income_factor))
                                            <option value="{{$val->id}}" {{  $business->id_credit_score_income_factor == $val->id ? "selected" : "" }} >{{$val->industry_sectore}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->industry_sectore}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Jumlah Pegawai</h6>
                                <select class="form-control" name="number_of_employee">
                                <option selected=""> --Pilih--</option>
                                    @foreach($employee as $key => $val)
                                        @if(isset($business->total_employees))
                                            <option value="{{$val->id}}" {{  $business->total_employees == $val->id ? "selected" : "" }} >{{$val->title}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Deskripsi perusahaan</h6>
                                <textarea class="form-control" name="business_description" id="business_description" rows="2">{{$business->business_description ?? ''}}</textarea>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col">
                                <h6>Alamat perusahaan <span>*</span></h6>
                                <textarea class="form-control" name="address_of_business" id="alamatpt" rows="2">{{$business->business_full_address ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Propinsi <span>*</span></h6>
                                <select class="form-control" id="province" name="province_business">
                                    <option value="">Pilih Propinsi</option>
                                    @foreach($provinces as $key => $val)
                                        <option value="{{$val->id}}"  {{  isset($business->province) == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <h6>Kota <span>*</span></h6>
                                <select class="form-control" id="city" name="city_business">
                                    <option value="">Pilih Kota</option>
                                    @foreach($regency as $key => $val)
                                        <option value="{{$val->id}}"  {{ isset($business->city) == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kecamatan <span>*</span></h6>
                                <select class="form-control" name="business_kecamatan">
                                    <option selected=""> Pilih Kecamatan</option>
                                    <option>Gambir</option>
                                    <option>dst</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Kelurahan <span>*</span></h6>
                                <select class="form-control" name="business_kelurahan">
                                    <option selected=""> Pilih Kelurahan</option>
                                    <option>Cideng</option>
                                    <option>dst</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col">
                                <h6>Kode Pos <span>*</span></h6>
                                <input type="text" class="form-control" value="{{$business->business_zip_code ?? ''}}" name="postal_code_business" placeholder="Kode Pos">
                            </div>
                            <div class="col">
                                <h6>Nomor telepon kantor <span>*</span></h6>
                                <input type="text" name="phone_number_business"  value="{{$business->business_phone_number ?? ''}}" class="form-control" placeholder="Nomor telepon kantor">
                            </div>
                        </div>

                        <h3>Informasi Keuangan</h3>
                        <hr>
                        <div class="row mt-4">
                            <div class="col">
                                <h6>Rata-rata Pendapatan 6 bulan terakhir</h6>
                                <select class="form-control" name="revenue"id="revenue">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="minus">Minus</option>
                                    <option value="< Rp. 10.000.000">< Rp. 10.000.000</option>
                                    <option value="> Rp. 30.000.000">> Rp. 30.000.000</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Rata-rata Keuntungan 6 bulan terakhir</h6>
                                <select class="form-control" name="profit"id="profit">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="minus">Minus</option>
                                    <option value="< Rp. 10.000.000">< Rp. 10.000.000</option>
                                    <option value="Rp. 10.000.001 - Rp. 30.000.000">Rp. 10.000.001 - Rp. 30.000.000</option>
                                    <option value="Rp. 30.000.001 - 50.000.000">Rp. 30.000.001 - 50.000.000</option>
                                    <option value="Rp. 50.000.001 - 100.000.000">Rp.50.000.001 - 100.000.000</option>
                                    <option value="> Rp. 100.000.000">> Rp. 100.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6>Rata-rata Pengeluaran 6 bulan terakhir</h6>
                                <select class="form-control" name="expenditure"id="expenditure">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="minus">Minus</option>
                                    <option value="< Rp. 10.000.000">< Rp. 10.000.000</option>
                                    <option value="Rp. 10.000.001 - Rp. 30.000.000">Rp. 10.000.001 - Rp. 30.000.000</option>
                                    <option value="Rp. 30.000.001 - 50.000.000">Rp. 30.000.001 - 50.000.000</option>
                                    <option value="Rp. 50.000.001 - 100.000.000">Rp.50.000.001 - 100.000.000</option>
                                    <option value="> Rp. 100.000.000">> Rp. 100.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary btn-block"> Update Informasi Bisnis </button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.section title start-->
        </div>

    </div>
</div>

</div>
