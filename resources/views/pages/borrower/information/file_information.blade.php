<div class="tab-pane" id="Legalitas" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">
                        <div class="col">
                            <div class="section-title ">
                                <!-- section title start-->
                                <p>Isi Informasi Anda mengenai data Informasi Bisnis.</p>

                            </div>
                        </div>
                        <form id="file_upload_image" enctype="multipart/form-data">
                            <div class="row mt-4">
                                <div class="col">
                                    <h6>Berkas Personal </h6>
                                    <hr></hr>
                                </div>
                            </div>
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
                                                    <input type="file" id="identity_image" name="identity_image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->identity_photo}}" id="identity_image_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="self_image" name="self_image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->self_photo}}" id="self_image_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="npwp_image" name="npwp_image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->npwp_photo}}" id="npwp_image_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="business_location_image" name="business_location_image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->bussiness_build_photo}}" id="business_location_image_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="business_owner_file" name="business_owner_file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->bussiness_owner_photo}}" id="business_owner_file_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="business_document" name="business_document" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->siup_photo}}" id="business_document_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="business_activity_image" name="business_activity_image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->business_activity_photo}}" id="business_activity_image_preview" alt="" style="width:100%">
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
                                                    <input type="file" id="business_npwp" name="business_npwp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="file_preview">
                                                <img src="{{url('/')}}/{{$file->npwp_bussiness_photo}}" id="business_npwp_preview" alt="" style="width:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary btn-block"> Unggah Berkas & Lanjutkan </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.section title start-->
            </div>

        </div>
    </div>

</div>
