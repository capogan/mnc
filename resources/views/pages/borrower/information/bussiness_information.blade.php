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
                    <form>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Nama Perusahan<span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nama Perusahaan" id="name_of_bussiness" name="name_of_bussiness">
                            </div>

                            <div class="col">
                                <h6>Kriteria Perusahan<span>*</span></h6>
                                <select class="form-control ">
                                    <option selected=""> Pilih Kategori Industri</option>
                                    @foreach($criteria as $key => $val)
                                        <option value="{{$val->id}}">{{$val->title_bussiness}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Industri<span>*</span></h6>
                                <select class="form-control ">
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
                                <input class="form-control" type="date"  name="dob" id="example-date-input" value="{">
                            </div>
                            <div class="col">
                                <h6>Jumlah Pegawai</h6>
                                <select class="form-control">
                                    <option selected=""> Pilih Pegawai</option>
                                    <option>5</option>
                                    <option>dst</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Deskripsi perusahaan</h6>
                                <textarea class="form-control" id="dekripsipt" rows="2"></textarea>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col">
                                <h6>Alamat perusahaan</h6>
                                <textarea class="form-control" id="alamatpt" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Propinsi</h6>
                                <select class="form-control">
                                    <option selected=""> Pilih Propinsi</option>
                                    <option>DKI Jakarta</option>
                                    <option>dst</option>
                                </select>

                            </div>
                            <div class="col">
                                <h6>Kota</h6>
                                <select class="form-control">
                                    <option selected=""> Pilih Kota</option>
                                    <option>Jakarta</option>
                                    <option>dst</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kecamatan</h6>
                                <select class="form-control">
                                    <option selected=""> Pilih Kecamatan</option>
                                    <option>Gambir</option>
                                    <option>dst</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6>Kelurahan</h6>
                                <select class="form-control">
                                    <option selected=""> Pilih Kelurahan</option>
                                    <option>Cideng</option>
                                    <option>dst</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kode Pos</h6>
                                <input type="text" class="form-control" placeholder="Kode Pos">
                            </div>
                            <div class="col">
                                <h6>Nomor telepon kantor</h6>
                                <input type="text" class="form-control" placeholder="Nomor telepon kantor">
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
