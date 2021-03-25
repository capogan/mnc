$(document).ready(function() {
    $("#btn_verified_otp").click( function() {
       // $(this).prop('disabled', true);
       $('#error_response').text('');
        submit_otp();
    });
    $("#send_otp_").click( function() {
        // $(this).prop('disabled', true);
        $('#error_response').text('');
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             },
             url: "/user/send/otp",
             type: "POST",
             dataType:"json",
             data: $('#form_verified').serialize(),
             beforeSend: function() {

                 loading();
             },
             success:function(response){

                 close_loading('Verifikasi');
             },

             error:function(response){
             }
         })
     });


    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());

            if(e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if(prev.length) {
                    $(prev).select();
                }
            } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if(next.length) {
                    $(next).select();
                } else {
                    if(parent.data('autosubmit')) {
                        submit_otp();
                    }
                }
            }
        });
    });


});


function submit_otp(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: "/user/verified/otp",
        type: "POST",
        dataType:"json",
        data: $('#form_verified').serialize(),
        beforeSend: function() {
            loading();
        },
        success:function(response){
            //console.log(response);

            if(response.status == true){
                window.location.href = '/profile';
            }else{
                $('#error_response').text(response.message);
            }
            close_loading('Verifikasi');

        },
        error:function(response){
        }
    })
}
