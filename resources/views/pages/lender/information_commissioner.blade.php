@extends('layouts.app_lender')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active text-light">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="/profile/lender/" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                    <p>Informasi Usaha</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/director" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Informasi Direktur</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/commissioner" type="button" class="btn btn-primary btn-circle" >3</a>
                    <p>Informasi Komisaris</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/file" type="button" class="btn btn-default btn-circle">4</a>
                    <p>Informasi Dokumen</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="sub-nav">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="service1">
                            <div class="tab-pane" id="Bisnis" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class=" bg-white ">
                                            <div class="contact-form mb60">
                                                <div class=" ">
                                                <form id="form_lender_commisioner_information" method="POST" enctype="multipart/form-data">
                                                <div class="section_number_appends director-1">

                                                            @if(isset($director) && count($director) > 0)
                                                                <?php
                                                                    $i = 0;
                                                                ?>
                                                                @foreach($director as $item)


                                                                    <div class="section_number_append section_number_append-section1" id="section_number_append">
                                                                    <?php
                                                                        if($i == 0){
                                                                            $this_val = '';
                                                                            $image = '0';
                                                                        }else{
                                                                            $this_val = $i+1;
                                                                            $image = $i+1;;
                                                                        }
                                                                    ?>
                                                                        <h3>Informasi Komisaris</h3>
                                                                        <hr>
                                                                        <div class="result-message"></div>

                                                                        <div class="row mb-4">
                                                                            <div class="col">
                                                                                <h6>NIK<span>*</span></h6>
                                                                                <input type="text" value="{{$item->commissioner_nik}}" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Nama<span>*</span></h6>
                                                                                <input type="text" value="{{$item->commissioner_name}}" class="form-control" placeholder="Nama Direktur" id="director_name" name="director_name[]">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <div class="col">
                                                                                <h6>Tanggal Lahir<span>*</span></h6>
                                                                                <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="{{$item->commissioner_dob}}">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Email<span>*</span></h6>
                                                                                <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"   value="{{$item->commissioner_email}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <div class="col">
                                                                                <h6>Nomor Telepon<span>*</span></h6>
                                                                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]"  value="{{$item->commissioner_phone_number}}" >
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>NPWP<span>*</span></h6>
                                                                                <input type="text"  value="{{$item->commissioner_npwp}}" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director" name="npwp_of_director[]">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <div class="col">
                                                                                <h6>Jabatan<span>*</span></h6>
                                                                                <select class="form-control" name="director_level[]" id="director_level">
                                                                                    <option value="">--Pilih Jabatan--</option>
                                                                                    <option value="commissioner" {{$item->commissioner_level == 'commissioner' ? 'selected' : ''}} >Komisaris</option>
                                                                                    <option value="president_commissioner" {{$item->commissioner_level == 'president_commissioner' ? 'selected' : ''}}>Komisaris Utama</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Alamat<span>*</span></h6>
                                                                                <textarea class="form-control" name="address[]" id="address"> {{$item->address}} </textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col">
                                                                                <h6>Propinsi <span>*</span></h6>
                                                                                <select class="form-control" id="province{{$this_val}}" name="province[]" onchange="get_city(this.value ,'{{$this_val}}');" style="width: 100%;">
                                                                                    <option></option>
                                                                                    @foreach($provinces as $key => $val)
                                                                                        <option value="{{$val->id}}" {{$val->id == $item->province_id ? 'selected' : ''}}>{{$val->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Kota <span>*</span></h6>
                                                                                <select class="form-control" id="city{{$this_val}}" name="city[]" onchange="get_district(this.value ,'{{$this_val}}')">
                                                                                    <option value="{{$item->regency_id}}">{{$item->regencies_name}}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4 mb-4">
                                                                            <div class="col">
                                                                                <h6>Kecamatan <span>*</span></h6>
                                                                                <select class="form-control" id="district{{$this_val}}" name="district[]" onchange="get_villages(this.value ,'{{$this_val}}')" >
                                                                                    <option value="{{$item->district_id}}">{{$item->districts_name}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Kelurahan <span>*</span></h6>
                                                                                <select class="form-control" id="vilages{{$this_val}}" name="vilages[]">
                                                                                    <option value="{{$item->village_id}}">{{$item->villages_name}}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4 mb-4">
                                                                            <div class="col">
                                                                                <div class="row mt-2">
                                                                                    <div class="col">
                                                                                        <p>Unggah Foto Identitas *</p>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row mt-2">
                                                                                    <div class="col image-of-display">
                                                                                        <div class="upload-file">
                                                                                            <div class="file-input">
                                                                                                <input type="file" id="identity_image{{$this_val}}" name="identity_image{{$this_val}}" class="file" >
                                                                                                <label for="identity_image{{$this_val}}">
                                                                                                    <svg
                                                                                                        xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                        viewBox="0 0 16 16">
                                                                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                                    </svg>
                                                                                                    <span>Pilih Foto</span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="file_preview">
                                                                                            <img src="{{asset('/upload/lender/file/'.$item->identity_photo)}}" id="identity_image{{$this_val}}_preview" alt="" style="width:100%">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="row mt-2">
                                                                                    <div class="col">
                                                                                        <p>Unggah Foto Diri *</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-2">
                                                                                    <div class="col image-of-display">
                                                                                        <div class="upload-file">
                                                                                            <div class="file-input">
                                                                                                <input type="file" id="self_image{{$this_val}}" name="self_image{{$this_val}}" class="file" >
                                                                                                <label for="self_image{{$this_val}}">
                                                                                                    <svg
                                                                                                        xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                        viewBox="0 0 16 16">
                                                                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                                    </svg>
                                                                                                    <span>Pilih Foto</span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="file_preview">
                                                                                            <img src="{{asset('/upload/lender/file/'.$item->self_photo)}}" id="self_image{{$this_val}}_preview" alt="" style="width:100%">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $i++;?>
                                                                @endforeach
                                                            @else
                                                            <div class="section_number_append section_number_append-section1" id="section_number_append">
                                                                <h3>Informasi Komisaris</h3>
                                                                <hr>
                                                                <div class="result-message"></div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>NIK<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Nama<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nama Komisaris" id="director_name" name="director_name[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Tanggal Lahir<span>*</span></h6>
                                                                        <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Email<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"  value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Nomor Telepon<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]" value="" >
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>NPWP<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director" name="npwp_of_director[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Jabatan<span>*</span></h6>
                                                                        <select class="form-control" name="director_level[]" id="director_level">
                                                                            <option value="">--Pilih Jabatan--</option>
                                                                            <option value="director">Direktur</option>
                                                                            <option value="president_director">Direktur Utama</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Alamat<span>*</span></h6>
                                                                        <textarea class="form-control" name="address[]" id="address"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <h6>Propinsi <span>*</span></h6>
                                                                        <select class="form-control" id="province" name="province[]" onchange="get_city(this.value ,'');" style="width: 100%;">
                                                                            <option></option>
                                                                            @foreach($provinces as $key => $val)
                                                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kota <span>*</span></h6>
                                                                        <select class="form-control" id="city" name="city[]" onchange="get_district(this.value ,'')">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <h6>Kecamatan <span>*</span></h6>
                                                                        <select class="form-control" id="district" name="district[]" onchange="get_villages(this.value ,'')" >
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kelurahan <span>*</span></h6>
                                                                        <select class="form-control" id="vilages" name="vilages[]">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Identitas *</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="identity_image" name="identity_image0" class="file" >
                                                                                        <label for="identity_image">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="identity_image_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Diri *</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="self_image" name="self_image0" class="file" >
                                                                                        <label for="self_image">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="self_image_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif



                                                        </div>
                                                        <div class="directors"></div>
                                                        <!-- <div class="section_number_appends director-2"></div>
                                                        <div class="section_number_appends director-3"></div> -->
                                                        <!--<div class="section_number_appends_2">
                                                            <div class="section_number_append section_number_append-section1" id="section_number_append">
                                                                <h3>Informasi Direktur II </h3>
                                                                <hr>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>NIK<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Nama<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nama Direktur" id="director_name" name="director_name[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Tanggal Lahir<span>*</span></h6>
                                                                        <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Email<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"  value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Nomor Telepon<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]" value="" >
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>NPWP<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director" name="npwp_of_director[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Jabatan<span>*</span></h6>
                                                                        <select class="form-control" name="director_level[]" id="director_level">
                                                                            <option value="">--Pilih Jabatan--</option>
                                                                            <option value="director">Direktur</option>
                                                                            <option value="president_director">Direktur Utama</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Alamat<span>*</span></h6>
                                                                        <textarea class="form-control" name="address[]" id="address"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <h6>Propinsi <span>*</span></h6>
                                                                        <select class="form-control" id="province2" name="province[]" style="width: 100%;" onchange="get_city(this.value ,'2')">
                                                                            <option></option>
                                                                            @foreach($provinces as $key => $val)
                                                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kota <span>*</span></h6>
                                                                        <select class="form-control" id="city2" name="city[]" onchange="get_district(this.value , '2')">
                                                                        <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <h6>Kecamatan <span>*</span></h6>
                                                                        <select class="form-control" id="district2" name="district[]" onchange="get_villages(this.value,'2')" >
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kelurahan <span>*</span></h6>
                                                                        <select class="form-control" id="vilages2" name="vilages[]">
                                                                        <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Identitas *</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="identity_image2" name="identity_image1" class="file" >
                                                                                        <label for="identity_image2">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="identity_image2_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Diri *</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="self_image2" name="self_image1" class="file" >
                                                                                        <label for="self_image2">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="self_image2_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="section_number_appends_3">
                                                            <div class="section_number_append section_number_append-section1" id="section_number_append">
                                                                <h3>Informasi Direktur III</h3>
                                                                <hr>
                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>NIK<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Nama<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nama Direktur" id="director_name" name="director_name[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Tanggal Lahir<span>*</span></h6>
                                                                        <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Email<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"  value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Nomor Telepon<span>*</span></h6>
                                                                        <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]" value="" >
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>NPWP<span>*</span></h6>
                                                                        <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director" name="npwp_of_director[]">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <h6>Jabatan<span>*</span></h6>
                                                                        <select class="form-control" name="director_level[]" id="director_level">
                                                                            <option value="">--Pilih Jabatan--</option>
                                                                            <option value="director">Direktur</option>
                                                                            <option value="president_director">Direktur Utama</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Alamat<span>*</span></h6>
                                                                        <textarea class="form-control" name="address[]" id="address"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <h6>Propinsi <span>*</span></h6>
                                                                        <select class="form-control" id="province3" name="province[]" onChange="get_city(this.value ,'3');" style="width: 100%;">
                                                                            <option></option>
                                                                            @foreach($provinces as $key => $val)
                                                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kota <span>*</span></h6>
                                                                        <select class="form-control" id="city3" name="city[]" onchange="get_district(this.value ,'3')">
                                                                        <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <h6>Kecamatan <span>*</span></h6>
                                                                        <select class="form-control" id="district3" name="district[]" onchange="get_villages(this.value ,'3')" >
                                                                        <option></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>Kelurahan <span>*</span></h6>
                                                                        <select class="form-control" id="vilages3" name="vilages[]">
                                                                        <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4 mb-4">
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Identitas *</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="identity_image3" name="identity_image2" class="file" >
                                                                                        <label for="identity_image3">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="identity_image3_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="row mt-2">
                                                                            <div class="col">
                                                                                <p>Unggah Foto Diri *</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col image-of-display">
                                                                                <div class="upload-file">
                                                                                    <div class="file-input">
                                                                                        <input type="file" id="self_image3" name="self_image2" class="file" >
                                                                                        <label for="self_image3">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"
                                                                                                viewBox="0 0 16 16">
                                                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                            </svg>
                                                                                            <span>Pilih Foto</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file_preview">
                                                                                    <img src="" id="self_image3_preview" alt="" style="width:100%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div id="section_director"></div>
                                                        <div class="form-group mt-4">
                                                            <button type="button" id="add_commissioner_section" data-text="Tambahkan Data" class="btn btn-default btn-block">+ Tambahkan Data Komisaris </button>
                                                        </div>
                                                        <div class="form-group mt100">
                                                            <button type="submit" id="qwe" data-text="Tambahkan Data" class="btn btn-primary btn-block">Simpan & lanjutkan </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.section title start-->
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<style>
.file_preview img{
    width: 35% !important;
    text-align: center;
}
</style>
@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
