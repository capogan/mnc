<div class="row">
    <div class="col">
        <div class=" bg-white ">
            <div class="contact-form mb60">
                <div class=" ">
                    <p>
                    <form id="personal_info_form">
                        <input type="hidden" name="id_personal_info" id="id_personal_info" value="{{ isset($get_user->id_personal) ? $get_user->id_personal : ''}}">
                        <h3>Informasi Data Pribadi</h3>
                        <hr>
                        <div class="result-message"></div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>No KTP <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="No KTP" name="identity_number" id="identity_number" value="{{ isset($get_user->identity_number) ? $get_user->identity_number : ''}}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Nama Depan <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nama Depan" name="first_name" id="first_name" value="{{  isset($get_user->first_name) ? $get_user->first_name : '' }}">
                            </div>
                            <div class="col">
                                <h6>Nama Belakang <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nama Belakang"  name="last_name" id="last_name" value="{{  isset($get_user->last_name) ? $get_user->last_name : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h6>Nomor Telepon <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number" value="{{  Auth::user()->phone_number_verified  }}" readonly >
                            </div>
                            <div class="col">
                                <h6>Nomor Whatsapp <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nomor Whatsapp" id="whatsapp_number" name="whatsapp_number" value="{{isset($get_user->whatsapp_number ) ? $get_user->whatsapp_number : '' }}" >
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>Email <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email"  value="{{ isset($get_email->email) ? $get_email->email : '' }}" readonly>
                            </div>

                            <div class="col">
                                <br>
                                <h6>Jenis Kelamin <span>*</span></h6>

                                @if(isset($get_user->gender) == 'male')
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked >
                                    <label class="form-check-label" for="male">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                                    <label class="form-check-label" for="female">Perempuan</label>
                                </div>
                                @elseif(isset($get_user->gender) == 'female')
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"  >
                                        <label class="form-check-label" for="male">Laki - Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked >
                                        <label class="form-check-label" for="female">Perempuan</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"  >
                                        <label class="form-check-label" for="male">Laki - Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                                        <label class="form-check-label" for="female">Perempuan</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h6>Tempat Lahir <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="pob" id="pob"  value="{{ isset($get_user->place_of_birth) ? $get_user->place_of_birth : '' }}">
                            </div>
                            <div class="col">
                                <h6>Tanggal Lahir <span>*</span></h6>
                                <input class="form-control" type="date"  name="dob" id="example-date-input" value="{{ isset($get_user->date_of_birth )? $get_user->date_of_birth : ''  }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h6>Pendidikan Terakhir <span>*</span></h6>
                                <select class="form-control select2" id="education" name="education">
                                    <option>Pilih Pendidikan</option>
                                    @foreach($education as $val)
                                        @if(isset($get_user->education))
                                            <option value="{{$val->id}}" {{ $get_user->education == $val->id ? "selected" : "" }} >{{$val->level}}</option>
                                        @else
                                            <option value="{{$val->id}}" >{{$val->level}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Nama ibu kandung <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nama ibu kandung" id="mother_name" name="mother_name" value="{{ isset($get_user->mother_name ) ? $get_user->mother_name :'' }}">
                            </div>
                        </div>

                        <div class="row mt-4">
                        <div class="col">
                                <h6>Status Pernikahan <span>*</span></h6>
                                <select class="form-control" id="married_status" name="married_status">
                                    <option value="">Pilih Status Pernikahan</option>
                                    @foreach($married_status as $val)
                                        @if(isset($get_user->married_status ))
                                            <option value="{{$val->id}}" {{ $get_user->married_status == $val->id ? "selected" : "" }} >{{$val->status}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->status}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Jumlah Tanggungan<span>*</span></h6>
                                    <select class="form-control" id="dependents" name="dependents">
                                        <option> - </option>
                                        @foreach($dependents as $val)
                                            @if(isset($get_user->number_of_dependents ))
                                                <option value="{{$val->id}}" {{ $get_user->number_of_dependents == $val->id ? "selected" : "" }} >{{$val->title}}</option>
                                            @else
                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Propinsi <span>*</span></h6>
                                <select class="form-control" id="province" name="province" onChange="get_city(this.value);" style="width: 100%;">
                                    <option></option>
                                    @foreach($provinces as $key => $val)
                                        @if(isset($get_user->province))
                                        <option value="{{$val->id}}"  {{  $get_user->province == $val->id ? "selected" : "" }}>{{$val->name}}</option>
                                        @else
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Kota <span>*</span></h6>
                                <select class="form-control" id="city" name="city" onchange="get_district(this.value)">
                                    @if(isset($get_user->city ))
                                        <option value="{{$get_user->city}}">{{$get_user->personal_city}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kecamatan <span>*</span></h6>
                                <select class="form-control" id="district" name="district" onchange="get_villages(this.value)" >
                                    @if(isset($get_user->district ))
                                        <option value="{{$get_user->district}}">{{$get_user->personal_district}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col">
                                <h6>Kelurahan <span>*</span></h6>
                                <select class="form-control" id="vilages" name="vilages">
                                    @if(isset($get_user->villages ))
                                        <option value="{{$get_user->villages}}">{{$get_user->personal_villages}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Kode Pos <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Kode Pos" id="zip_code" name="zip_code" value="{{ isset($get_user->zip_code) ? $get_user->zip_code : '' }}">
                            </div>
                            <div class="col">
                                <h6>Alamat <span>*</span></h6>
                                <textarea class="form-control" name="address" id="address"> {{ isset($get_user->address) ? $get_user->address : '' }}</textarea>
                            </div>
                        </div>

                        <hr>


                        <div class="row mt-4">
                            <div class="col">
                                <h6>Nomor NPWP <span>*</span></h6>
                                <div class="form-group input-group">
                                <!-- <input type="text" class="form-control group2" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}"><p>.</p>
                                <input type="text" class="form-control group3" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}">
                                <input type="text" class="form-control group3" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}">
                                <input type="text" class="form-control group1" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}">
                                <input type="text" class="form-control group3" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}"> -->
                                <input type="text" class="form-control group3" placeholder="Nomor NPWP" id="npwp_number" name="npwp_number" value="{{ isset($get_user->npwp_number) ? $get_user->npwp_number : '' }}">
                                </div>
                            </div>
                            <div class="col">
                                <h6>Jumlah Kartu Kredit</h6>
                                <input type="number" class="form-control" placeholder="Jumlah Kartu Kredit" id="total_cc" name="total_cc" value="{{ isset($get_user->total_cc) ? $get_user->total_cc : '' }}">
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col">
                                <h6>No BPJS Ketenagakerjaan</h6>
                                <input type="text" class="form-control" placeholder="No BPJS Ketenagakerjaan" id="bpjs_employee_number" name="bpjs_employee_number" value="{{ isset($get_user->bpjs_employee_number) ? $get_user->bpjs_employee_number : '' }}">
                            </div>
                            <div class="col">
                                <h6>No BPJS Kesehatan</h6>
                                <input type="text" class="form-control" placeholder="No BPJS Kesehatan" id="bpjs_health_number" name="bpjs_health_number" value="{{ isset($get_user->bpjs_health_number ) ? $get_user->bpjs_health_number : '' }}">
                            </div>
                        </div>

                        <h3>Informasi Kerabat</h3>
                        <hr>
                        <div class="row mt-4">
                            <div class="col">
                                <h6>Nama <span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nama Kerabat" id="emergency_name" name="emergency_name" value="{{isset($get_user->emergency_name ) ? $get_user->emergency_name : '' }}" >
                            </div>
                            <div class="col">
                                <h6>Hubungan <span>*</span></h6>
                                <select class="form-control" name="relationship_as" id="relationship_as">
                                    <option value="">Pilih Hubungan</option>
                                    @foreach($siblings as $val)
                                        @if(isset($get_user->id_siblings_master))
                                        <option value="{{$val->id}}" {{  $get_user->id_siblings_master== $val->id ? "selected" : "" }} >{{$val->sibling_name}}</option>
                                        @else
                                        <option value="{{$val->id}}" >{{$val->sibling_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h6>Nomor Telepon Kerabat<span>*</span></h6>
                                <input type="text" class="form-control" placeholder="Nomor Telepon Kerabat" id="emergency_phone" name="emergency_phone" value="{{isset($get_user->emergency_phone ) ? $get_user->emergency_phone : '' }}" >
                            </div>
                            <div class="col">
                                <h6>Alamat Kerabat <span>*</span></h6>
                                   <textarea class="form-control" name="emergency_full_address" id="emergency_full_address">{{isset($get_user->emergency_full_address ) ? $get_user->emergency_full_address : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" data-text="Tambahkan Data" class="btn btn-primary btn-block"> Tambahkan Informasi </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.section title start-->
        </div>

    </div>
</div>

<style>
    .group2 , .group1 , .group3{
        margin: 10px !important;
    }
    </style>