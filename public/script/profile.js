$(document).ready(function() {
    $("#npwp_number").inputmask({"mask": "99.999.999.9-999.999"});
    $("#business_category").select2({
        placeholder: "Pilih Kategori Industri",
        allowClear: true
    });

    $('.currency-format').each(function(){
        var number = $(this).val();
        var rupiah = formatRupiah(number , '');
        $(this).val(rupiah);
    });

    $(document).on( 'click' , '#lender_sign_aggreement_of_fund' , function(){
        btn = $(this);
        btn.attr("disabled", true);
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:'/sign_document_fund_aggreement',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {id : $(this).attr('data-content')},
            dataType:'json',
            success:function(response)
            {

                if(response.status == 'success'){
                    window.location.href = response.url;
                }
                else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                btn.attr("disabled", false);

            }
        })
    });

    $(document).on('click', '#repayment_request', function() {
        var id = $(this).attr('chars');
        var btn = $(this);
        btn.attr("disabled", true);

        Swal.fire({
            title: 'Konfirmasi',
            showDenyButton: true,
            text :'Akun virtual yang muncul hanya berlaku 6 jam , Silahkan melakukan pembayaran secepatnya.',
            confirmButtonText: `Lanjutkan`,
            denyButtonText: `Batal`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                request_repayment(id);
            } else if (result.isDenied) {
                Swal.fire('Batal melakukan pembayaran', '', 'info')
                btn.attr("disabled", false);

            }
        })
    })

});

$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);

});


$('.btn-file :file').on('fileselect', function(event, label) {

    var input = $(this).parents('.input-group').find(':text'),
        log = label;

    if( input.length ) {
        input.val(log);
    } else {
        if( log ) alert(log);
    }

});


$('#check_identity_form').on('submit', function(event){
    event.preventDefault();

    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:'/api/get/user',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        async:true,
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:'json',
        success:function(response)
        {

            if(response.status){
                $("#identity_number").val(response.data.identity_id);
                $("#first_name").val(response.data.name);
                $("#address").val(response.data.address);
                $("#phone_number").val(response.data.phone_number);
                $("#member").val('yes');
                $("input[name=gender][value=" + response.data.gender + "]").attr('checked', 'checked');
                $(".result-message").removeClass('alert-danger').addClass('alert-success').html(response.message);
            }
            else{
                $(".result-message").removeClass('alert-success').addClass('alert-danger').html(response.message);
            }
            setTimeout(function(){
                $('#input_identity_number').modal('hide')
            }, 800);

        }
    })
});

$(document).on('keyup' , '#request_loan_borrower' , function(){
    var number = $(this).val();
    var rupiah = formatRupiah(number , '');
    $(this).val(rupiah);
    check_interest();
    $('#la_value').text(rupiah);
});

$(document).on('keyup' , '#omset_value' , function(){
    var number = $(this).val();
    var rupiah = formatRupiah(number , '');
    $(this).val(rupiah);
});

$(document).on('keyup' , '.currency-format' , function(){
    var number = $(this).val();
    var rupiah = formatRupiah(number , '');
    $(this).val(rupiah);
});


$(document).on('keyup' , '#asset_value' , function(){
    var number = $(this).val();
    var rupiah = formatRupiah(number , '');
    $(this).val(rupiah);
});

$('#personal_info_form').on('submit', function(event){
    event.preventDefault();

    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:'/add/personal/info',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        async:true,
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:'json',
        beforeSend:function(){
            loading();
        },
        success:function(response)
        {
            close_loading();
            var text ='';
            var title = '';
            if(response.status){
                text = 'Data berhasil ditambahkan'
                var title = 'Sukses';
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Anda telah tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = '/profile/business';
                }, 500);


            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                window.scrollTo(500, 0);
               $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                setTimeout(function() {
                    $(".result-message").fadeOut("slow");
                }, 2000);

            }

        },
        error: function() {
            alert_error();
            close_loading();
        }
    })
});


$('#form_borrower_business_information').on('submit', function(event){

    event.preventDefault();
    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:'/add/personal/business',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        async:true,
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:'json',
        beforeSend:function(){
            loading();
        },
        success:function(response)
        {
            close_loading();
            var text ='';
            var title = '';
            if(response.status){
                text = 'Data berhasil ditambahkan'
                var title = 'Sukses';

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Anda telah tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = '/profile/file';
                }, 500);


            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                $(".result-message-b").addClass('alert alert-danger').html(text).fadeIn();
                window.scrollTo(500, 0);
                setTimeout(function() {
                    $(".result-message-b").fadeOut("slow");
                }, 2000);
            }
        },
        error: function() {
            alert_error();
            close_loading();
        }
    })
});




$('#file_upload_image').on('submit', function(event){
    event.preventDefault();

    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');
    var block = $('#selfie_photo_preview').attr('src');
    if(block == undefined){
        block = $('#self_image_preview').attr('src').split(";");
    }else{
        block = $('#selfie_photo_preview').attr('src').split(";");
    }
   
    var contentType = block[0].split(":")[1];
    var realData = block[1].split(",")[1];
    var blob = b64toBlob(realData, contentType);

    var fd = new FormData(this);
    fd.append("self_image", blob);
    
    $.ajax({
        url:'/upload/file',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data:fd,
        cache:false,
        contentType: false,
        processData: false,
        dataType:'json',
        beforeSend:function(){
            loading();
        },
        success:function(response)
        {
            close_loading();
            var text ='';
            var title = '';
            if(response.status){
                text = response.message
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Anda telah tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function() {
                    window.location.href = '/profile/faktur';
                }, 500);


            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                $(".result-message-f").addClass('alert alert-danger').html(text).fadeIn();
                window.scrollTo(500, 0);
                setTimeout(function() {
                    $(".result-message-f").fadeOut("slow");
                }, 2000);
            }

        },
        error: function() {
            alert_error();
            close_loading();
        }
    })
});

//check_invoice_form

$("#loan_period").bind(
    "slider:changed", function (event, data) {
        $("#loan_period_value").html(data.value.toFixed(0));
        check_interest(data.value.toFixed(0));
    }
);

$(document).on('change' , 'input[type="file"]' , function(){
    readURL(this , $(this).attr('id'));
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

$(document).on('click' , '#request_file_assign' , function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/borrower/document/sign',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {invoice : $('#invoice_number').val()},
        beforeSend: function () {
            
        },
        success: function (response) {
            if (response.status == true) {
                window.location.href = response.url;
            }else{
                alert('Something wrong with this.');
            }
           // window.location.href = response.url;
        },
        error: function (xhr, status, error) {
           
        }
    })
});


function readURL(input , imagetarget) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#'+imagetarget+'_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function check_interest(period){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/api/pcg/invoice/check',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            period : period,
            total_invoice:$('#request_loan_borrower').val(),
            invoice_number : $('#invoice_number').val() ,
            identity_numbers_invoice :$('#identity_numbers_invoice').val(),
           },
        dataType:'json',
        success:function(response)
        {
            var res = response;
            if(res.status == 'success'){
                //$('#total_purchase_loan').text(formatRupiah(res.data.profile_pcg.total_invoice.toString() , ','));
                $('#interest_fee').text(res.data.loan_interest);
                $('#monthly_invoice').text(res.data.period_loan);
                $('#invoice_loan_').text(res.data.profile_pcg);
                $('#total_repayment').text(res.data.repayment);
                $('#admin_fee').text(res.data.admin_fee);
                $('#invoice_loan_').text(res.data.loan_by_invoice);
                $('#invoice_loan_requested').text(res.data.invoice_plus_admin_fee);
            }else{
                //window.location.href = '/login'
            }

        }
    })
}

$('#check_invoice_form').on('click', function(event){
    event.preventDefault();

    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:'/api/pcg/invoice/check',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {invoice_number : $('#invoice_number').val() , identity_numbers_invoice :$('#identity_numbers_invoice').val()},
        dataType:'json',
        beforeSend:function(){
            // $("#btn_submit").html("Silahkan tunggu").append(" <i class=\"fa fa-circle-o-notch fa-spin\"></i>").attr("disabled",true);
            loading();
        },
        success:function(response)
        {
            $('.load-load').text('');
            $('#body-pcg-item').html('');
            $('#error_response_from_limit').html('');
            var res = response;
            if(res.status == 'success'){
                $('.succes_respose_api_pcg').show()
                $('.error_response_from_limit').hide()
                $('.error_respose_api_pcg').show();
                if(res.data.status_loan != 'approve'){
                    $('#error_response_from_limit').html('<div class="alert alert-danger load-load" role="alert">'+res.data.loan_request_message+'</div>');
                }else{
                    $('#error_response_from_limit').html('<div class="alert alert-success load-load" role="alert">'+res.data.loan_request_message+'</div>');
                    $('#request_loan_').attr("disabled",true)
                }
                if(res.data.status_loan == 'approve'){
                   $('#request_loan_').attr("disabled",false)
                }
                $('#name_of_pcg').text(res.data.profile_pcg.full_name);
                $('#id_number_of_pcg').text(res.data.profile_pcg.id_number);
                $('#invoice_number_of_pcg').text(res.data.profile_pcg.invoice_id);
                $('#total_purchase_of_pcg').text(formatRupiah(res.data.profile_pcg.total_invoice.toString() , ','));
                //$('#total_purchase_loan').text(formatRupiah(res.data.profile_pcg.total_invoice.toString() , ','));
                $('#admin_fee').text(res.data.admin_fee);
                $('#la_value').text(formatRupiah(res.data.profile_pcg.total_invoice.toString() , ','));
                $('#interest_fee').text(res.data.loan_interest);
                //$('#repayment_loan').text(res.data.repayment);
                $('#total_repayment').text(res.data.repayment);
                $('#monthly_invoice').text(res.data.period_loan);
                $.each(res.data.profile_pcg.items, function( index, value ) {
                    $('#body-pcg-item').append('<tr><td>'+value.product+'</td><td>'+value.qty+'</td><td>'+value.price+'</td></tr>');
                });
            }else{
                $('.succes_respose_api_pcg').hide()
                $('.error_respose_api_pcg').hide()
                var text = '';
                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                var title = 'Terjadi Kesalahan';
                    bootbox.alert({
                    title: title,
                    message: text,
                    centerVertical:true,
                    onShow: function(e) {
                        feather.replace();
                    },
                    callback: function() {
                        btn.removeAttr("disabled");
                    }
                });
            }

        }
    })
});



$(document).on('click' , '#request_loan_' , function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    var btn = $(this);
    $.ajax({
        url:'/borrower/submit/loan',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            total_invoice:$('#request_loan_borrower').val(),
            period : $("#loan_period_value").text(),
            invoice_number : $('#invoice_number').val() ,
            identity_numbers_invoice :$('#identity_numbers_invoice').val(),
            member_code :$('#member_code').val()

        },
        dataType:'json',
        beforeSend:function(){
            //$("#request_loan_").html("Silahkan tunggu").append(" <i class=\"fa fa-circle-o-notch fa-spin\"></i>").attr("disabled",true);
            loading();
        },
        success:function(response)
        {
            close_loading('Ajukan pinjaman');
            var text ='';
            var title = '';
            if(response.status){
                text = 'Data berhasil ditambahkan'
                var title = 'Sukses';
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Anda telah tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = '/profile/transaction';
                }, 500);

            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                var title = 'Terjadi Kesalahan';
                $(".result-message-i").addClass('alert alert-danger').html(text).fadeIn();
                window.scrollTo(500, 0);
                setTimeout(function() {
                    $(".result-message-i").fadeOut("slow");
                }, 2000);
            }

        },
        error: function() {
            alert_error();
            close_loading();
        }
    })

});


function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   = number_string.split(','),
    sisa     = split[0].length % 3,
    rupiah     = split[0].substr(0, sisa),
    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}


function get_city(province_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/city?province_id='+province_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#city").empty();
            $("#city").append('<option>Pilih Kota</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#city").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_district(regency_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/district?regency_id='+regency_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#district").empty();
            $("#district").append('<option>Pilih Kecamatan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#district").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_villages(district_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/villages?district_id='+district_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#vilages").empty();
            $("#vilages").append('<option>Pilih Kelurahan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#vilages").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_city_business(province_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/city?province_id='+province_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#city_business").empty();
            $("#city_business").append('<option>Pilih Kota</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#city_business").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_district_business(regency_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/district?regency_id='+regency_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#district_business").empty();
            $("#district_business").append('<option>Pilih Kecamatan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#district_business").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_villages_business(district_id){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/villages?district_id='+district_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#vilages_business").empty();
            $("#vilages_business").append('<option>Pilih Kelurahan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#vilages_business").append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}



function updated_status(id,number_status){

    var token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
         url:'/profile/received',
         method:"POST",
         headers: {
             'X-CSRF-TOKEN': token
         },
         dataType:'json',
         data:{
             id_loan:id,
             number_status:number_status,
         },
         beforeSend:function(){
           loading();
         },
         success:function(response)
         {
            close_loading();
             setTimeout(function(){
                window.location.href = '/profile/transaction'
             }, 800);
         },
         error: function() {
             alert_error();
             close_loading();
         }
     })
}

function request_repayment(id){
    var token = $('meta[name="csrf-token"]').attr('content');
    console.log(id);
    $.ajax({
        url:'/repayment/request',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        dataType:'json',
        data:{
            id:id,
        },
        success:function(response)
        {
            console.log(response);
            if(response.status === true){
                window.location.reload();
            }else{
                Swal.fire(response.message, '', 'info')
                $('#repayment_request').attr("disabled", false);
            }
           
        },
        error: function() {
        }
    })
}






