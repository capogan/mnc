function loading(){

    $('.btn-primary[type=submit]').attr('disabled','disabled').html('<i class="fa fa-spinner fa-spin"></i> Mohon Tunggu');

}
function close_loading(){
    $(".btn-primary[type=submit]").removeAttr('disabled').html($("button").attr("data-text"));
}
function alert_error(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Terjadi kesalahan pada pengimputan data!',
    })
}
