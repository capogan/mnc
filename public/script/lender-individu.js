$(document).on('ready', function () {
    const lender_type_info = $("#lender_type_info").val()
    if (lender_type_info == 1) {
        showSME()
    } else if (lender_type_info == 2) {
        hideSME()
    }

    $("#npwp_of_bussiness").inputmask({ "mask": "99.999.999.9-999.999" });
    $("#no_npwp").inputmask({ "mask": "99.999.999.9-999.999" });

    $("#form_register_lender_individu_information").on("submit", function (event) {
        event.preventDefault();

        var btn = $("#btn_submit_lender_individu");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/profile/lender-individu',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender-individu/occupation/sme';
                    if ($("#lender_type").val() == 2) {
                        window.location.href = '/profile/lender-individu/occupation';
                    }

                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });

    $("#form_register_lender_individu_occupation").on("submit", function (event) {
        event.preventDefault();
        var btn = $("#btn_submit_individual_occupation");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/profile/lender-individu/occupation',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender-individu/document';
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });

    $("#form_register_lender_individu_occupation_sme").on("submit", function (event) {
        event.preventDefault();
        var btn = $("#btn_submit_individual_occupation_sme");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/profile/lender-individu/occupation/sme',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender-individu/document/sme';
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });

    $("#form_individual_lender_documents").on("submit", function (event) {
        event.preventDefault();
        var btn = $("#btn_submit_personal_document");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        var block = $('#selfie_photo_preview').attr('src').split(";");
        var contentType = block[0].split(":")[1];
        var realData = block[1].split(",")[1];
        var blob = b64toBlob(realData, contentType);

        var fd = new FormData(this);
        fd.append("selfie_photo", blob);

        $.ajax({
            url: '/profile/lender-individu/document',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender-individu/sign';
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });
    
    $(document).on('click' , '#activate_account_dgsign' , function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/account/activate_account',
            method: "POST",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': token
            },
            beforeSend: function () {  
            },
            success: function (response) {
                console.log(response.status);
                if(response.status == true){
                    window.location.href = response.url;
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Gagal saat aktivasi akun',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
               
            },
            error: function (xhr, status, error) {
               
            }
        })
    });

    $("#form_individual_lender_documents_sme").on("submit", function (event) {
        event.preventDefault();
        var btn = $("#btn_submit_personal_document_sme");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');


        var block = $('#selfie_photo_preview').attr('src').split(";");
        var contentType = block[0].split(":")[1];
        var realData = block[1].split(",")[1];
        var blob = b64toBlob(realData, contentType);

        var fd = new FormData(this);
        fd.append("selfie_photo", blob);

        $.ajax({
            url: '/profile/lender-individu/document/sme',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender-individu/sign';
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });

    $("#btn_sign_agreement_lender_individu").on('click', function (event) {
        event.preventDefault();
        var btn = $("#btn_sign_agreement_lender_individu");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/profile/lender-individu/sign',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: {},
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    // Swal.fire({
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Data Anda telah tersimpan',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                    window.location.href = response.url;
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });


    $("#btn_send_activation_email").on('click', function (event) {
        event.preventDefault();
        var btn = $("#btn_send_activation_email");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/profile/lender/activate_account',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async: true,
            data: {},
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                close_loading();
                if (response.status == true) {
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = response.url;
                } else {
                    var text = '';
                    $.each(response.message, function (index, value) {
                        text += '<p class="error"><i data-feather="x-square"></i> ' + value[0] + '</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function () {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function (xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });

    $("#lender_type").on("change", function (e) {
        if (this.value == 1) {
            showSME()
        } else if (this.value == 2) {
            hideSME()
        }
    });

});

function showSME() {
    $("#sme_resident").show()
    $("#sme_cc").show()
    $("#sme_bpjs").show()
    $("#sme_occupation").show()
    $("#sme_document").show()
    $("#non_sme_occupation").hide()
    $("#non_sme_document").hide()
}

function hideSME() {
    $("#sme_resident").hide()
    $("#sme_cc").hide()
    $("#sme_bpjs").hide()
    $("#sme_occupation").hide()
    $("#sme_document").hide()
    $("#non_sme_occupation").show()
    $("#non_sme_document").show()
}

function get_city(province_id, attr) {
    let token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/get/city?province_id=' + province_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            $("#city").empty();
            $("#city").append('<option>Pilih Kota</option>');
            $.each(res, function (key, value) {
                $("#city").append('<option value="' + key + '">' + value + '</option>');
            });
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_district(regency_id, attr) {
    let token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/get/district?regency_id=' + regency_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            $("#district").empty();
            $("#district").append('<option>Pilih Kecamatan</option>');
            $.each(res, function (key, value) {
                $("#district").append('<option value="' + key + '">' + value + '</option>');
            });
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_villages(district_id, attr) {
    let token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/get/villages?district_id=' + district_id,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            $("#villages").empty();
            $("#villages").append('<option>Pilih Kelurahan</option>');
            $.each(res, function (key, value) {
                $("#villages").append('<option value="' + key + '">' + value + '</option>');
            });
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}


$(document).on('change', 'input[type="file"]', function () {
    readURL(this, $(this).attr('id'));
});

function readURL(input, imagetarget) {
    if (input.files && input.files[0]) {
        //console.log(input.files[0]);
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + imagetarget + '_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
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
