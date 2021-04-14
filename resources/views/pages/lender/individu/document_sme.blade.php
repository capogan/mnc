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
                    <a href="/profile/lender-individu/" type="button" data-text="1" class="btn btn-default btn-circle"
                        disabled="disabled">1</a>
                    <p>Informasi Pribadi</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/occupation/sme" type="button" class="btn btn-default btn-circle"
                        disabled="disabled">2</a>
                    <p>Informasi Pekerjaan</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/document/sme" type="button" class="btn btn-primary btn-circle">3</a>
                    <p>Berkas</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender-individu/sign" type="button" class="btn btn-default btn-circle">4</a>
                    <p>Tanda Tangan</p>
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
                                                    <form id="form_individual_lender_documents_sme"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="lender_type_info" id="lender_type_info"
                                                            value="{{ isset($lender_individual_docs->lender_type) ? $lender_individual_docs->lender_type : '' }}">
                                                        <input type="hidden" name="personal_id" id="personal_id"
                                                            value="{{ isset($lender_individual_docs->personal_id) ? $lender_individual_docs->personal_id : '' }}">
                                                        <h3>Unggah Berkas Pribadi</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah KTP * (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="photo_ktp"
                                                                                    name="photo_ktp" class="file">
                                                                                <label for="photo_ktp">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->identity_image ?? '' }}"
                                                                                id="photo_ktp_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Swafoto * (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="selfie_photo"
                                                                                    name="selfie_photo" class="file">
                                                                                <label for="selfie_photo">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->self_image ?? '' }}"
                                                                                id="selfie_photo_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah NPWP * (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="photo_npwp"
                                                                                    name="photo_npwp" class="file">
                                                                                <label for="photo_npwp">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->npwp_image ?? '' }}"
                                                                                id="photo_npwp_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr>
                                                        <h3>Unggah Berkas Pekerjaan</h3>
                                                        <hr>

                                                        <div class="row">

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah NPWP Usaha * (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="business_npwp_image"
                                                                                    name="business_npwp_image" class="file">
                                                                                <label for="business_npwp_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->business_npwp_image ?? '' }}"
                                                                                id="business_npwp_image_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto Tempat Usaha * (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="business_place_image"
                                                                                    name="business_place_image"
                                                                                    class="file">
                                                                                <label for="business_place_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->business_place_image ?? '' }}"
                                                                                id="business_place_image_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto Surat Izin Usaha atau Sejenisnya *
                                                                            (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file"
                                                                                    id="license_business_document_image"
                                                                                    name="license_business_document_image"
                                                                                    class="file">
                                                                                <label
                                                                                    for="license_business_document_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->license_business_document_image ?? '' }}"
                                                                                id="license_business_document_image_preview"
                                                                                alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Bukti Kepemilikan / Kontrak Tempat Usaha *
                                                                            (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file"
                                                                                    id="proof_of_ownership_image"
                                                                                    name="proof_of_ownership_image"
                                                                                    class="file">
                                                                                <label for="proof_of_ownership_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->proof_of_ownership_image ?? '' }}"
                                                                                id="proof_of_ownership_image_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto Dokumen Usaha *
                                                                            (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="document_image"
                                                                                    name="document_image" class="file">
                                                                                <label for="document_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->document_image ?? '' }}"
                                                                                id="document_image_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah Foto Aktifitas Usaha *
                                                                            (maks: 1 Mb)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file"
                                                                                    id="business_activity_image"
                                                                                    name="business_activity_image"
                                                                                    class="file">
                                                                                <label for="business_activity_image">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="40" height="40" fill="white"
                                                                                        class="bi bi-plus"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                                    </svg>
                                                                                    <span>Pilih Foto</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file_preview">
                                                                            <img class="img-file"
                                                                                src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $lender_individual_docs->business_activity_image ?? '' }}"
                                                                                id="business_activity_image_preview" alt=""
                                                                                style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mt-5">
                                                            <button type="submit" data-text="Tambahkan Informasi"
                                                                id="btn_submit_personal_document_sme"
                                                                class="btn btn-primary btn-block"> Tambahkan Informasi </button>
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
        .col-xl-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            padding-bottom: 50px !important;
            max-width: 50%;
        }

        .img-file {
            max-width: 20% !important;
        }

        .file_preview img {
            width: 35% !important;
            text-align: center;
        }

    </style>


@section('js')
    <script src="{{ asset('/script/lender-individu.js') }}"></script>
@endsection
@endsection
