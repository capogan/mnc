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
        success:function(response)
        {
            var text ='';
            var title = '';
            if(response.status){
                text = 'Data berhasil ditambahkan'
                var title = 'Sukses';

            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                var title = 'Terjadi Kesalahan';
            }
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
        success:function(response)
        {
            var text ='';
            var title = '';
            if(response.status){
                text = 'Data berhasil ditambahkan'
                var title = 'Sukses';

            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                var title = 'Terjadi Kesalahan';
            }
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
    })
});




$('#file_upload_image').on('submit', function(event){
    event.preventDefault();

    var btn = $("#btn_update_voucher");
    btn.attr("disabled", "disabled");

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:'/upload/file',
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        data:new FormData(this),
        cache:false,
        contentType: false,
        processData: false,
        dataType:'json',
        success:function(response)
        {
            var text ='';
            var title = '';
            if(response.status){
                text = response.message
                var title = 'Sukses';

            }else{

                $.each(response.message, function( index, value ) {
                    text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                });
                var title = 'Terjadi Kesalahan';
            }
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
        data: {period : period, total_invoice:$('#request_loan_borrower').val(), invoice_number : $('#invoice_number').val() , identity_numbers_invoice :$('#identity_numbers_invoice').val()},
        dataType:'json',
        success:function(response)
        {
            var res = response;
            if(res.status == 'success'){
                //$('#total_purchase_loan').text(formatRupiah(res.data.profile_pcg.total_invoice.toString() , ','));
                $('#interest_fee').text(res.data.loan_interest);
                $('#monthly_invoice').text(res.data.period_loan);
                $('#total_repayment').text(res.data.repayment);
                $('#admin_fee').text(res.data.admin_fee);
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
            $("#btn_submit").html("Silahkan tunggu").append(" <i class=\"fa fa-circle-o-notch fa-spin\"></i>").attr("disabled",true);
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
            //$("#btn_submit").html("Ajukan Pinjaman").attr("disabled",false);
            //$(".table-invoice").html(response.data).fadeIn('slow');
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
        data: {period : $("#loan_period_value").text(), invoice_number : $('#invoice_number').val() , identity_numbers_invoice :$('#identity_numbers_invoice').val()},
        dataType:'json',
        beforeSend:function(){
            //$("#request_loan_").html("Silahkan tunggu").append(" <i class=\"fa fa-circle-o-notch fa-spin\"></i>").attr("disabled",true);
        },
        success:function(response)
        {
            $('.load-load').text('');
            $('#body-pcg-item').html('');
            $('#error_response_from_limit').html('');
            var res = response;
            if(res.status == 'success'){
                
            }else{
                    var title = res.status;
                    bootbox.alert({
                    title: title,
                    message: res.message,
                    centerVertical:true,
                    onShow: function(e) {
                        
                    },
                    callback: function() {
                        btn.removeAttr("disabled");
                    }
                });
            }
            //$("#btn_submit").html("Ajukan Pinjaman").attr("disabled",false);
            //$(".table-invoice").html(response.data).fadeIn('slow');
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



