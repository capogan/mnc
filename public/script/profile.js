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

$('#check_invoice_form').on('submit', function(event){
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
        data:new FormData(this),
        cache:false,
        contentType: false,
        processData: false,
        dataType:'json',
        beforeSend:function(){
            $("#btn_submit").html("Silahkan tunggu").append(" <i class=\"fa fa-circle-o-notch fa-spin\"></i>").attr("disabled",true);
        },
        success:function(response)
        {
            $(".input-invoice").hide();
            $("#btn_submit").html("Ajukan Pinjaman").attr("disabled",false);
            $(".table-invoice").html(response.data).fadeIn('slow');

        }
    })
});




