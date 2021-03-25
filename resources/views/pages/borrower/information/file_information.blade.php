<div class="tab-pane" id="Legalitas" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">
                        <div class="col">
                            <div class="section-title ">
                                <!-- section title start-->
                            </div>
                        </div>
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
                                <button type="submit" data-text="Tambahkan Informasi" class="btn btn-primary btn-block"> Tambahkan Informasi </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.section title start-->
            </div>

        </div>
    </div>

</div>
