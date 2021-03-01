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
                            <div class="row mt-2">
                                <div class="col">
                                    <p>Unggah Foto KTP</p>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="upload-file">
                                        <div class="file-input">
                                            <input type="file" id="identity_image" name="identity_image" class="form-control" onchange="readURL(this);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img id="preview_image" src="http://placehold.it/180" alt="your image" />
                            <div class="row mt-2">
                                <div class="col">
                                    <p>Unggah Foto Diri</p>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="upload-file">
                                        <div class="file-input">
                                            <input type="file" id="self_image" name="self_image" class="form-control" onchange="readURL2(this);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img id="preview_image2" src="http://placehold.it/180" alt="your image" />
                            <div class="row mt-2">
                                <div class="col">
                                    <p>Unggah Foto NPWP</p>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="upload-file">
                                        <div class="file-input">
                                            <input type="file" id="npwp_image" name="npwp_image" class="form-control"onchange="readURL3(this);" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img id="preview_image3" src="http://placehold.it/180" alt="your image" />


                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary btn-block"> Unggah Berkas </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.section title start-->
            </div>

        </div>
    </div>

</div>
