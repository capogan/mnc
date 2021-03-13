<div class="tab-pane" id="Bisnis" role="tabpanel">
<div class="row">
    <div class="col">
        <div class=" bg-white ">
            <div class="contact-form mb60">
                <div class=" ">
                    <div class="col">
                        <div class="mb60  section-title  ">
                            <!-- section title start-->
                            <p>Isi Informasi Anda mengenai data Informasi Bisnis.</p>
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
                                        <option value="{{$val->id}}">{{$val->title_bussiness}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Lama Bekerja sama<span>*</span></h6>
                                <select class="form-control" name="business_partner">
                                    <option value="1" > 0 - 24 month</option>
                                    <option value="2" > 25 - 59 month</option>
                                    <option value="3" > > 60</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Sewa Tempat Usaha<span>*</span></h6>
                                <select class="form-control" name="business_location_status">
                                    <option value="1" > Sewa Bulanan </option>
                                    <option value="2" > Sewa Tahunan</option>
                                    <option value="3" > Milik Pribadi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Lama Usaha<span>*</span></h6>
                                <select class="form-control" name="lenght_of_business">
                                    <option value="1" > 0 - 12 month</option>
                                    <option value="2" > 13 - 24 month</option>
                                    <option value="3" > 25 - 47 month</option>
                                    <option value="4" > 48 - 59 month</option>
                                    <option value="5" > > 60</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Status badan Usaha<span>*</span></h6>
                                <select class="form-control" name="business_status">
                                    <option value="1" > Tidak Berbadan Hukum / UD </option>
                                    <option value="2" > Perusahaan Perseorangan (PO)</option>
                                    <option value="3" > Firma</option>
                                    <option value="4" > Persekutuan Komanditer (CV)</option>
                                    <option value="5" > Perseroan Terbatas</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Industri<span>*</span></h6>
                                <select class="form-control " name="business_category">
                                    <option selected=""> Pilih Kategori Industri</option>
                                    @foreach($industry as $key => $val)
                                        <option value="{{$val->id}}">{{$val->industry_sectore}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Tanggal Berdiri</h6>
                                <input class="form-control" type="date"  name="operation_date" id="example-date-input" value="{">
                            </div>
                            <div class="col">
                                <h6>Jumlah Pegawai</h6>
                                <select class="form-control" name="number_of_employee">
                                    <option selected=""> Pilih Pegawai</option>
                                    <option>5</option>
                                    <option>dst</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Deskripsi perusahaan</h6>
                                <textarea class="form-control" name="business_description" id="business_description" rows="2"></textarea>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col">
                                <h6>Alamat perusahaan</h6>
                                <textarea class="form-control" name="address_of_business" id="alamatpt" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Propinsi</h6>
                                <select class="form-control" id="province" name="province_business">
                                    <option value="">Pilih Propinsi</option>
                                    @foreach($provinces as $key => $val)
                                        <option value="{{$val->id}}"  {{  isset($get_user->province) == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <h6>Kota</h6>
                                <select class="form-control" id="city" name="city_business">
                                    <option value="">Pilih Kota</option>
                                    @foreach($regency as $key => $val)
                                        <option value="{{$val->id}}"  {{ isset($get_user->city) == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kecamatan</h6>
                                <select class="form-control" name="business_kecamatan">
                                    <option selected=""> Pilih Kecamatan</option>
                                    <option>Gambir</option>
                                    <option>dst</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Kelurahan</h6>
                                <select class="form-control" name="business_kelurahan">
                                    <option selected=""> Pilih Kelurahan</option>
                                    <option>Cideng</option>
                                    <option>dst</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kode Pos</h6>
                                <input type="text" class="form-control" name="postal_code_business" placeholder="Kode Pos">
                            </div>
                            <div class="col">
                                <h6>Nomor telepon kantor</h6>
                                <input type="text" name="phone_number_business" class="form-control" placeholder="Nomor telepon kantor">
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
