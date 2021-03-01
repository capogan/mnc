$(document).ready(function() {

    // $("#btn_register").click( function() {
    //
    //     var full_name = $("#full_name").val();
    //     var email    = $("#email").val();
    //     var password = $("#password").val();
    //     var token = $("meta[name='csrf-token']").attr("content");
    //     var $this = $(this);
    //
    //     if (full_name.length == "") {
    //
    //         Swal.fire({
    //             type: 'warning',
    //             title: 'Lengkapi Data',
    //             text: 'Nama Lengkap Wajib Diisi !'
    //         });
    //
    //     } else if(email.length == "") {
    //
    //         Swal.fire({
    //             type: 'warning',
    //             title: 'Lengkapi Data',
    //             text: 'Alamat Email Wajib Diisi !'
    //         });
    //
    //     } else if(password.length == "") {
    //
    //         Swal.fire({
    //             type: 'warning',
    //             title: 'Lengkapi Data',
    //             text: 'Password Wajib Diisi !'
    //         });
    //
    //     }else if ($('#check1').not(':checked').length) {
    //
    //         Swal.fire({
    //             type: 'warning',
    //             title: 'Lengkapi Data',
    //             text: 'Silahkan centang persetujuan persyaratan & ketentuan !'
    //         });
    //
    //     }
    //     else if ($('#check2').not(':checked').length) {
    //
    //         Swal.fire({
    //             type: 'warning',
    //             title: 'Lengkapi Data',
    //             text: 'Izinkan SIAP untuk mengirimkan saya informasi melalui email'
    //         });
    //
    //     }
    //     else {
    //         $.ajax({
    //             url: "/borrower/register",
    //             type: "POST",
    //             cache: false,
    //             data: {
    //                 "full_name": full_name,
    //                 "email": email,
    //                 "password": password,
    //                 "_token": token
    //             },
    //             beforeSend: function() {
    //                 $('#btn_register').prop('disabled', true);
    //             },
    //             success:function(response){
    //
    //
    //                 if (response.success) {
    //                     Swal.fire({
    //                         type: 'success',
    //                         title: 'Berhasil',
    //                         confirmButtonText: 'Masuk Sekarang',
    //                         text: 'Register Berhasil..',
    //                         footer: '',
    //                         showCloseButton: false
    //                     })
    //                         .then(function (result) {
    //                             if (result.value) {
    //                                 window.location = "/login";
    //                             }
    //                         })
    //
    //
    //                 } else {
    //                     Swal.fire({
    //                         type: 'error',
    //                         title: 'Register Gagal!',
    //                         text: response.message
    //                     });
    //
    //                 }
    //                 console.log(response);
    //             },
    //
    //             error:function(response){
    //                 Swal.fire({
    //                     type: 'error',
    //                     title: 'Opps!',
    //                     text: 'server error!'
    //                 });
    //             }
    //
    //         })
    //
    //     }
    //
    // });

});
