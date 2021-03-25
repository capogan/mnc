@extends('layouts.app')
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
                    <a href="/profile/lender/information/commissioner" type="button" class="btn btn-default btn-circle" >3</a>
                    <p>Informasi Komisaris</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/file" type="button" class="btn btn-primary btn-circle">4</a>
                    <p>Informasi Dokumen</p>

                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/market/place" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                    <p>Market Place</p>

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
                                                    <form id="file_upload_image" enctype="multipart/form-data">
                                                        <h3>Unggah Berkas</h3>
                                                        <hr>
                                                        <div class="result-message-f"></div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto KTP *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="identity_image" name="identity_image" class="file" >
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
                                                                            <img src="{{url('/')}}/{{$file->identity_photo ?? ''}}" id="identity_image_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto Diri *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="self_image" name="self_image" class="file" >
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
                                                                            <img src="{{url('/')}}/{{$file->self_photo ?? '' }}" id="self_image_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto NPWP *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="npwp_image" name="npwp_image" class="file">
                                                                                <label for="npwp_image">
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
                                                                            <img src="{{url('/')}}/{{$file->npwp_photo ?? ''}}" id="npwp_image_preview" alt="" style="width:100%">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Foto tempat usaha *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="business_location_image" name="business_location_image" class="file">
                                                                                <label for="business_location_image">
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
                                                                            <img src="{{url('/')}}/{{$file->business_build_photo ?? ''}}" id="business_location_image_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Foto bukti kepemilikan atau kontrak tempat usaha</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="business_owner_file" name="business_owner_file" class="file">
                                                                                <label for="business_owner_file">
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
                                                                            <img src="{{url('/')}}/{{$file->business_owner_photo ?? ''}}" id="business_owner_file_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Foto dokumen usaha *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="business_document" name="business_document" class="file">
                                                                                <label for="business_document">
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
                                                                            <img src="{{url('/')}}/{{$file->siup_photo ?? ''}}" id="business_document_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Foto aktifitas usaha *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="business_activity_image" name="business_activity_image" class="file">
                                                                                <label for="business_activity_image">
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
                                                                            <img src="{{url('/')}}/{{$file->business_activity_photo ?? ''}}" id="business_activity_image_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Foto NPWP usaha</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">

                                                                                <input type="file" id="business_npwp" name="business_npwp" class="file">
                                                                                <label for="business_npwp">
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
                                                                            <img src="{{url('/')}}/{{$file->npwp_business_photo ?? ''}}" id="business_npwp_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-5">
                                                            <button type="submit" class="btn btn-primary btn-block"> Tambahkan Informasi </button>
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

@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
