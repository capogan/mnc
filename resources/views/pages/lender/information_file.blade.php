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
                    <a href="/profile/lender/information/commissioner" type="button" class="btn btn-default btn-circle" >3</a>
                    <p>Informasi Komisaris</p>
                </div>
                <div class="stepwizard-step">
                    <a href="/profile/lender/information/file" type="button" class="btn btn-primary btn-circle">4</a>
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
                                                    <form id="form_lender_attacment" enctype="multipart/form-data">
                                                        <h3>Unggah Berkas</h3>
                                                        <hr>
                                                        <div class="result-message"></div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <p>Unggah NPWP KTP *</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-2">
                                                                    <div class="col">
                                                                        <div class="upload-file">
                                                                            <div class="file-input">
                                                                                <input type="file" id="npwp" name="npwp" class="file" >
                                                                                <label for="npwp">
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
                                                                            <img class="img-file" src="{{asset('/upload/lender/file/attachment')}}/{{$attachment->npwp ?? ''}}" id="npwp_preview" alt="" style="width:100%">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6>Dokumen NIB *</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                        <input type="file" id="nib" name="nib" class="file" style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;" >
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->nib ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6>Dokumen TDP *</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input type="file" id="tdp" name="tdp" class="file" style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->tdp ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6> Dokumen kta Pendirian & Pengesahaan AHU *</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input type="file" id="doc_kta" name="doc_kta" class="file" style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->akta_pendirian ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6>Dokumen akta Perubahan Terakhir & Pengesahaan AHU</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input type="file" id="doc_last_ahu" name="doc_last_ahu" class="file" style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->akta_perubahan ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6> Dokumen Struktur Organisasi Perusahaan</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input type="file" id="organizational_structure" name="organizational_structure" style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;"  class="file">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->structure_organization ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6> Neraca</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;" type="file" id="balance_report" name="balance_report" class="file">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->balance_sheet ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6> Dokumen Laporan Arus Kas *</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                    <input type="file" id="cash_flow" name="cash_flow" class="file"  style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;" >
                                                                    </div>

                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->cash_flow_statement ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group m-form__group row">
                                                                    <label for="example-text-input" class="col-12 col-form-label">
                                                                    <h6>Laporan Laba Rugi*</h6>
                                                                    </label>
                                                                    <div class="col-12">
                                                                        <input style="width: 100% !important;opacity: initial;    z-index: 9999;margin-left: 18px;" type="file" id="loss_profit" name="loss_profit" class="file">
                                                                    </div>
                                                                    @if(isset($attachment))
                                                                        <div class="col-12">
                                                                            <a target="_blank"  style="margin-top: 46px;" class="btn btn-primary" href="{{asset('/upload/lender/file/attachment')}}/{{$attachment->income_statement ?? ''}}"> download </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group mt-5">
                                                            <button type="submit" class="btn btn-primary btn-block"> Selesai </button>
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
.img-file{
    max-width: 20% !important;
}

.file_preview img{
        width: 35% !important;
        text-align: center;
    }
    </style>


@section('js')
    <script src="{{ asset('/script/lender.js') }}"></script>
@endsection
@endsection
