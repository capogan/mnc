$(document).ready(function() {
    $("#btn_verified_otp").click( function() {
       // $(this).prop('disabled', true);
       $('#error_response').text('');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: "/user/verified/otp",
            type: "POST",
            dataType:"json",
            data: $('#form_verified').serialize(),
            beforeSend: function() {
                $('#btn_verifiec').prop('disabled', true);
            },
            success:function(response){
                //console.log(response);
                if(response.status == true){
                    window.location.href = '/profile';
                }else{
                    $('#error_response').text(response.message);
                }

            },
            error:function(response){
            }
        })
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
                 $('#btn_verifiec').prop('disabled', true);
             },
             success:function(response){
                // console.log(response);
                 if(response.status == true){
                     window.location.href = '/profile';
                 }
             },
 
             error:function(response){
             }
         })
     });
});
