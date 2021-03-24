$(document).ready(function() {
    $("#btn_verified_otp").click( function() {
       // $(this).prop('disabled', true);
       $('#error_response').text('');

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


});

function getCodeBoxElement(index) {
    return document.getElementById('kode_otp' + index);
}
function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement(index).value.length === 1) {
        if (index !== 6) {
            getCodeBoxElement(index+ 1).focus();
        } else {
            getCodeBoxElement(index).blur();
            // Submit code
            console.log('submit code ');
            submit_otp();
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement(index - 1).focus();
    }
}
function onFocusEvent(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxElement(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}


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
