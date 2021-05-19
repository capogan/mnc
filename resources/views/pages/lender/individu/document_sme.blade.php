@extends('layouts.app_lender')
@section('content')
    <div class="container containers-with-margin">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
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
                                                                                <input type="file" id="selfie_photo" name="selfie_photo" class="file">
                                                                                <label onclick="setup_webcam()">
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
                                                                        <br>
                                                                        <div id="my_selfie"></div>
                                                                            <input type="button" value="Ambil Foto" id="snapshot" onClick="take_snapshot()" style="display:none">
                                                                            <input type="button" value="Cancel" id="cancel_snapshot" onClick="cancel_snapshots()" style="display:none">
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
    <script src="{{ asset('/js/webcam.min.js') }}"></script>

    <script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
	</script>

    <script language="JavaScript">
		function setup_webcam() {
            $('#selfie_photo_preview').hide();
			Webcam.attach( '#my_selfie' );
            $('#snapshot').show();
		}
        function cancel_snapshots() {
            Webcam.unfreeze();
            $('#snapshot').show();
            $('#cancel_snapshot').hide();
        }
		function take_snapshot() {
			Webcam.snap( function(data_uri) {
                var block = data_uri.split(";");
                var contentType = block[0].split(":")[1];
                var realData = block[1].split(",")[1];
                var blob = b64toBlob(realData, contentType);
                $('#selfie_photo_preview').attr('src' , data_uri);
                $('#cancel_snapshot').show();
                $('#snapshot').hide();
			} );

            Webcam.freeze();
		}

        function b64toBlob(b64Data, contentType, sliceSize) {
                contentType = contentType || '';
                sliceSize = sliceSize || 512;
                var byteCharacters = atob(b64Data);
                var byteArrays = [];

                for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                    var slice = byteCharacters.slice(offset, offset + sliceSize);

                    var byteNumbers = new Array(slice.length);
                    for (var i = 0; i < slice.length; i++) {
                        byteNumbers[i] = slice.charCodeAt(i);
                    }
                    var byteArray = new Uint8Array(byteNumbers);

                    byteArrays.push(byteArray);
                }

              var blob = new Blob(byteArrays, {type: contentType});
              return blob;
            }

            $("#myAwesomeForm").submit(function(e){
                e.preventDefault();
                appendFileAndSubmit();
            });

            function appendFileAndSubmit(){
                // Get the form
                var form = document.getElementById("myAwesomeForm");

                var ImageURL = "data:image/gif;base64,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";
                // Split the base64 string in data and contentType
                var block = ImageURL.split(";");
                // Get the content type
                var contentType = block[0].split(":")[1];// In this case "image/gif"
                // get the real base64 content of the file
                var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

                // Convert to blob
                var blob = b64toBlob(realData, contentType);

                // Create a FormData and append the file
                var fd = new FormData(form);
                fd.append("image", blob);

                // Submit Form and upload file
                $.ajax({
                    url:"endpoint.php",
                    data: fd,// the formData function is available in almost all new browsers.
                    type:"POST",
                    contentType:false,
                    processData:false,
                    cache:false,
                    dataType:"json", // Change this according to your response from the server.
                    error:function(err){
                        console.error(err);
                    },
                    success:function(data){
                        console.log(data);
                    },
                    complete:function(){
                        console.log("Request finished.");
                    }
                });
            }
	</script>
@endsection
@endsection
