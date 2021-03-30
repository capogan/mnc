$(document).ready(function() {

    $(document).on('click' , '#sign_agreement_' , function(){
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/register/agreement',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async:true,
            data: {agreement : 'agree'},
            success:function(response)
            {
                window.location.href = '/lender/funding';
            }
        })
    });

    $(document).on('click' , '#lender_request_to_fung' , function(){
        var id = $(this).attr('attr');
        var modal = bootbox.dialog({
            message: "Klik lanjutkan untuk melanjutkan proses pendanaan.",
            title: "Ajukan Pendanaan",
            buttons: [
                {
                    label: "Cancel",
                    className: "btn btn-default pull-left",
                    callback: function() {
                    }
                },
                {
                    label: "Lanjutkan",
                    className: "btn btn-primary pull-left",
                    callback: function() {
                        submitfundingloan(id);
                    }
                }
            ],
            show: false,
            onEscape: function() {
                modal.modal("hide");
            }
        });

        modal.modal("show");
    });
    $("#npwp_of_bussiness,#npwp_of_director").inputmask({"mask": "99.999.999.9-999.999"});

    $('#amount_setoran_modal,#taxpayer,#asset_value,#equity_value,#short_term_liabilities,#income_year,#operating_expenses,#profit_loss').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return 'Rp ' + value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));

    $("#form_register_lender_business_information").on("submit", function(event) {

        event.preventDefault();

        var btn = $("#btn_submit_business_register");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/business/add',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            beforeSend:function(){
                loading();
            },
            success:function(response)
            {
                close_loading();
                if(response.status == true){
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender/information/director';

                }else{
                    var text = '';
                    $.each(response.message, function( index, value ) {
                        text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function() {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function(xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });


    $("#form_lender_director_information").on("submit", function(event) {

        event.preventDefault();

        var btn = $("#btn_submit_voucher");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/register/director',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async:true,
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                if(response.status == true){
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    // window.location.href = '/profile/lender/information/commissioner';
                }else{
                    var text = '';
                    $.each(response.message, function( index, value ) {
                        text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function() {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function(xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });


    $("#form_lender_commisioner_information").on("submit", function(event) {

        event.preventDefault();

        var btn = $("#btn_submit_voucher");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/register/commisioner',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async:true,
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                if(response.status == true){
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender/information/file';
                }else{
                    var text = '';
                    $.each(response.message, function( index, value ) {
                        text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function() {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function(xhr, status, error) {
                alert_error();
                close_loading();
            }
        })
    });




    $("#form_lender_attacment").on("submit", function(event) {
        event.preventDefault();
        var btn = $("#btn_submit_voucher");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/submit/attachment/',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            async:true,
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                if(response.status == true){
                    text = 'Data berhasil ditambahkan'
                    var title = 'Sukses';
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anda telah tersimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = '/profile/lender/register/sign';

                }else{
                    var text = '';
                    $.each(response.message, function( index, value ) {
                        text += '<p class="error"><i data-feather="x-square"></i> '+ value[0]+'</p>';
                    });
                    $(".result-message").addClass('alert alert-danger').html(text).fadeIn();
                    window.scrollTo(500, 0);
                    setTimeout(function() {
                        $(".result-message").fadeOut("slow");
                    }, 2000);
                }

            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err);
            }
        })
    });

    $().on('click' , '#' , function(){
        $('#modalRequestfund').show();
    });

    var max_fields      = 3; //maximum input boxes allowed
    var wrapper         = $("#section_director"); //Fields wrapper
    var add_button      = $("#add_director_section"); //Add button ID
    var add_button_com  = $("#add_commissioner_section"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();


        if( $('.section_number_append').length < max_fields){
            x = $('.section_number_append').length + 1;
            //alert($('.section_number_append').length);
            //$('.directors').html('<div class="section_number_appends director-'+x+'">'+$('.director-1').html()+'</div>');
            //$('.director-'+x).find()
            $(wrapper).append('<div class="remove_'+x+' section_number_append"><button type="button" class="btn btn-sm btn-danger pull-right remove_field_'+x+'" style="background:crimson">hapus</button><h3 class="title-section">Informasi Direktur  </h3>\n' +
                '\n' +
                '                                                        <hr>\n' +
                '                                                        <div class="result-message"></div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NIK<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nama<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nama Direktur" id="director_name" name="director_name[]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Tanggal Lahir<span>*</span></h6>\n' +
                '                                                                <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Email<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"  value="">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nomor Telepon<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]" value="" >\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NPWP<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director'+x+'" name="npwp_of_director[]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Jabatan<span>*</span></h6>\n' +
                '                                                                <select class="form-control" name="director_level[]" id="director_level">\n' +
                '                                                                    <option value="">--Pilih Jabatan--</option>\n' +
                '                                                                    <option value="director">Direktur</option>\n' +
                '                                                                    <option value="president_director">Direktur Utama</option>\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Alamat<span>*</span></h6>\n' +
                '                                                                <textarea class="form-control" name="address[]" id="address"></textarea>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Propinsi <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="province'+x+'" name="province[]" onchange="get_city(this.value,'+x+')" style="width: 100%;">\n' +
                '                                                                       <option value="">--Pilih Propinsi--</option>\n' +
                '                                                                       <option value="11">Aceh</option>\n' +
                '                                                                       <option value="12">SUMATERA UTARA</option>\n' +
                '                                                                       <option value="13">SUMATERA BARAT</option>\n' +
                '                                                                       <option value="14">RIAU</option>\n' +
                '                                                                       <option value="15">JAMBI</option>\n' +
                '                                                                       <option value="16">SUMATERA SELATAN</option>\n' +
                '                                                                       <option value="17">BENGKULU</option>\n' +
                '                                                                       <option value="18">LAMPUNG</option>\n' +
                '                                                                       <option value="19">KEPULAUAN BANGKA BELITUNG</option>\n' +
                '                                                                       <option value="21">KEPULAUAN RIAU</option>\n' +
                '                                                                       <option value="31">DKI JAKARTA</option>\n' +
                '                                                                       <option value="32">JAWA BARAT</option>\n' +
                '                                                                       <option value="33">JAWA TENGAH</option>\n' +
                '                                                                       <option value="34">DI YOGYAKARTA</option>\n' +
                '                                                                       <option value="35">JAWA TIMUR</option>\n' +
                '                                                                       <option value="36">BANTEN</option>\n' +
                '                                                                       <option value="51">BALI</option>\n' +
                '                                                                       <option value="52">NUSA TENGGARA BARAT</option>\n' +
                '                                                                       <option value="53">NUSA TENGGARA TIMUR</option>\n' +
                '                                                                       <option value="61">KALIMANTAN BARAT</option>\n' +
                '                                                                       <option value="62">KALIMANTAN TENGAH</option>\n' +
                '                                                                       <option value="63">KALIMANTAN SELATAN</option>\n' +
                '                                                                       <option value="64">KALIMANTAN TIMUR</option>\n' +
                '                                                                       <option value="65">KALIMANTAN UTARA</option>\n' +
                '                                                                       <option value="71">SULAWESI UTARA</option>\n' +
                '                                                                       <option value="72">SULAWESI TENGAH</option>\n' +
                '                                                                       <option value="73">SULAWESI SELATAN</option>\n' +
                '                                                                       <option value="74">SULAWESI TENGGARA</option>\n' +
                '                                                                       <option value="75">GORONTALO</option>\n' +
                '                                                                       <option value="76">SULAWESI BARAT</option>\n' +
                '                                                                       <option value="81">MALUKU</option>\n' +
                '                                                                       <option value="82">MALUKU UTARA</option>\n' +
                '                                                                       <option value="91">PAPUA BARAT</option>\n' +
                '                                                                       <option value="94">PAPUA</option>\n' +

                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kota <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="city'+x+'" name="city[]" onchange="get_district(this.value ,'+x+')">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4 mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kecamatan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="district'+x+'" name="district[]" onchange="get_villages(this.value,'+x+')" >\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kelurahan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="vilages'+x+'" name="vilages[]">\n' +
                '                                                                </select>\n' +
                '                                                            </div></div>\n' +
                                                                           '<div class="row mt-4 mb-4">'+
                                                                            '<div class="col">'+
                                                                                '<div class="row mt-2"><div class="col"><p>Unggah Foto Identitas *</p></div></div>'+
                                                                                '<div class="row mt-2">'+
                                                                                   ' <div class="col image-of-display">'+
                                                                                       ' <div class="upload-file">'+
                                                                                            '<div class="file-input">'+
                                                                                               ' <input type="file" id="identity_image'+x+'" name="identity_image'+x+'" class="file" >'+
                                                                                                '<label for="identity_image'+x+'">'+
                                                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />'+
                                                                                                    '</svg>'+
                                                                                                    '<span>Pilih Foto</span>'+
                                                                                                '</label>'+
                                                                                           ' </div>'+
                                                                                        '</div>'+
                                                                                        '<div class="file_preview"> <img src="" id="identity_image'+x+'_preview" alt="" style="width:100%"></div>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</div>'+

                                                                            '<div class="col">'+
                                                                                '<div class="row mt-2"><div class="col"><p>Unggah Foto Diri *</p></div></div>'+
                                                                                '<div class="row mt-2">'+
                                                                                   ' <div class="col image-of-display">'+
                                                                                       ' <div class="upload-file">'+
                                                                                            '<div class="file-input">'+
                                                                                               ' <input type="file" id="self_image'+x+'" name="self_image'+x+'" class="file" >'+
                                                                                                '<label for="self_image'+x+'">'+
                                                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />'+
                                                                                                    '</svg>'+
                                                                                                    '<span>Pilih Foto</span>'+
                                                                                                '</label>'+
                                                                                           ' </div>'+
                                                                                        '</div>'+
                                                                                        '<div class="file_preview"> <img src="" id="self_image'+x+'_preview" alt="" style="width:100%"></div>'+
                                                                                    '</div>'+
                                                                                '</div>'+

                '                                                        </div></div>');


            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1)
            })

        }
        $(wrapper).on("click",".remove_field_"+x, function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove();
            // $('.section_number_append').each(function(index){
            //     $(this).find('.klkl').text(index+1);
            // })
        })
        $("#npwp_of_director"+x).inputmask({"mask": "99.999.999.9-999.999"});
    });


//    add_commissioner_section



    $(add_button_com).click(function(e){ //on add input button click
        e.preventDefault();


        if( $('.section_number_append').length < max_fields){
            x = $('.section_number_append').length + 1;
            //alert(x);
            //$('.directors').html('<div class="section_number_appends director-'+x+'">'+$('.director-1').html()+'</div>');
            //$('.director-'+x).find()
            $(wrapper).append('<div class="remove_'+x+' section_number_append"><button type="button" class="btn btn-sm btn-danger pull-right remove_field_'+x+'" style="background:crimson">hapus</button><h3 class="title-section">Informasi Komisaris  </h3>\n' +
                '\n' +
                '                                                        <hr>\n' +
                '                                                        <div class="result-message"></div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NIK<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number[]">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nama<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nama Komisioner" id="director_name" name="director_name[]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Tanggal Lahir<span>*</span></h6>\n' +
                '                                                                <input class="form-control" type="date"  name="dob[]" id="example-date-input" value="">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Email<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Email" name="email[]" id="email"  value="">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nomor Telepon<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number[]" value="" >\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NPWP<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director'+x+'" name="npwp_of_director[]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Jabatan<span>*</span></h6>\n' +
                '                                                                <select class="form-control" name="director_level[]" id="director_level">\n' +
                '                                                                    <option value="">--Pilih Jabatan--</option>\n' +
                '                                                                    <option value="director">Direktur</option>\n' +
                '                                                                    <option value="president_director">Direktur Utama</option>\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Alamat<span>*</span></h6>\n' +
                '                                                                <textarea class="form-control" name="address[]" id="address"></textarea>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Propinsi <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="province'+x+'" name="province[]" onchange="get_city(this.value,'+x+')" style="width: 100%;">\n' +
                '                                                                       <option value="">--Pilih Propinsi--</option>\n' +
                '                                                                       <option value="11">Aceh</option>\n' +
                '                                                                       <option value="12">SUMATERA UTARA</option>\n' +
                '                                                                       <option value="13">SUMATERA BARAT</option>\n' +
                '                                                                       <option value="14">RIAU</option>\n' +
                '                                                                       <option value="15">JAMBI</option>\n' +
                '                                                                       <option value="16">SUMATERA SELATAN</option>\n' +
                '                                                                       <option value="17">BENGKULU</option>\n' +
                '                                                                       <option value="18">LAMPUNG</option>\n' +
                '                                                                       <option value="19">KEPULAUAN BANGKA BELITUNG</option>\n' +
                '                                                                       <option value="21">KEPULAUAN RIAU</option>\n' +
                '                                                                       <option value="31">DKI JAKARTA</option>\n' +
                '                                                                       <option value="32">JAWA BARAT</option>\n' +
                '                                                                       <option value="33">JAWA TENGAH</option>\n' +
                '                                                                       <option value="34">DI YOGYAKARTA</option>\n' +
                '                                                                       <option value="35">JAWA TIMUR</option>\n' +
                '                                                                       <option value="36">BANTEN</option>\n' +
                '                                                                       <option value="51">BALI</option>\n' +
                '                                                                       <option value="52">NUSA TENGGARA BARAT</option>\n' +
                '                                                                       <option value="53">NUSA TENGGARA TIMUR</option>\n' +
                '                                                                       <option value="61">KALIMANTAN BARAT</option>\n' +
                '                                                                       <option value="62">KALIMANTAN TENGAH</option>\n' +
                '                                                                       <option value="63">KALIMANTAN SELATAN</option>\n' +
                '                                                                       <option value="64">KALIMANTAN TIMUR</option>\n' +
                '                                                                       <option value="65">KALIMANTAN UTARA</option>\n' +
                '                                                                       <option value="71">SULAWESI UTARA</option>\n' +
                '                                                                       <option value="72">SULAWESI TENGAH</option>\n' +
                '                                                                       <option value="73">SULAWESI SELATAN</option>\n' +
                '                                                                       <option value="74">SULAWESI TENGGARA</option>\n' +
                '                                                                       <option value="75">GORONTALO</option>\n' +
                '                                                                       <option value="76">SULAWESI BARAT</option>\n' +
                '                                                                       <option value="81">MALUKU</option>\n' +
                '                                                                       <option value="82">MALUKU UTARA</option>\n' +
                '                                                                       <option value="91">PAPUA BARAT</option>\n' +
                '                                                                       <option value="94">PAPUA</option>\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kota <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="city'+x+'" name="city[]" onchange="get_district(this.value ,'+x+')">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4 mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kecamatan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="district'+x+'" name="district[]" onchange="get_villages(this.value,'+x+')" >\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kelurahan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="vilages'+x+'" name="vilages[]">\n' +
                '                                                                </select>\n' +
                '                                                            </div></div>\n' +
                                                                           '<div class="row mt-4 mb-4">'+
                                                                            '<div class="col">'+
                                                                                '<div class="row mt-2"><div class="col"><p>Unggah Foto Identitas *</p></div></div>'+
                                                                                '<div class="row mt-2">'+
                                                                                   ' <div class="col image-of-display">'+
                                                                                       ' <div class="upload-file">'+
                                                                                            '<div class="file-input">'+
                                                                                               ' <input type="file" id="identity_image'+x+'" name="identity_image'+x+'" class="file" >'+
                                                                                                '<label for="identity_image'+x+'">'+
                                                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />'+
                                                                                                    '</svg>'+
                                                                                                    '<span>Pilih Foto</span>'+
                                                                                                '</label>'+
                                                                                           ' </div>'+
                                                                                        '</div>'+
                                                                                        '<div class="file_preview"> <img src="" id="identity_image'+x+'_preview" alt="" style="width:100%"></div>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</div>'+

                                                                            '<div class="col">'+
                                                                                '<div class="row mt-2"><div class="col"><p>Unggah Foto Diri *</p></div></div>'+
                                                                                '<div class="row mt-2">'+
                                                                                   ' <div class="col image-of-display">'+
                                                                                       ' <div class="upload-file">'+
                                                                                            '<div class="file-input">'+
                                                                                               ' <input type="file" id="self_image'+x+'" name="self_image'+x+'" class="file" >'+
                                                                                                '<label for="self_image'+x+'">'+
                                                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-plus"viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />'+
                                                                                                    '</svg>'+
                                                                                                    '<span>Pilih Foto</span>'+
                                                                                                '</label>'+
                                                                                           ' </div>'+
                                                                                        '</div>'+
                                                                                        '<div class="file_preview"> <img src="" id="self_image'+x+'_preview" alt="" style="width:100%"></div>'+
                                                                                    '</div>'+
                                                                                '</div>'+

                '                                                        </div></div>');


            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1)
            })

        }
        $(wrapper).on("click",".remove_field_"+x, function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove();
            // $('.section_number_append').each(function(index){
            //     $(this).find('.klkl').text(index+1);
            // })
        })
        $("#npwp_of_director"+x).inputmask({"mask": "99.999.999.9-999.999"});
    });

});

function show_modal_request_fund(){

}
function submitfundingloan(id){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url:'/request/to_fund/loan',
        type:"POST",
        dataType:'json',
        dtaa: {id : id},
        success:function(res){
            bootbox.alert(data.message);
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}
function get_city(province_id , attr){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/city?province_id='+province_id,
        type:"GET",
        dataType:'json',

        success:function(res){

            $("#city"+attr).empty();
            $("#city"+attr).append('<option>Pilih Kota</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#city"+attr).append('<option value="'+key+'">'+value+'</option>');
            });



        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_district(regency_id , attr){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/district?regency_id='+regency_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
            $("#district"+attr).empty();
            $("#district"+attr).append('<option>Pilih Kecamatan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#district"+attr).append('<option value="'+key+'">'+value+'</option>');
            });



        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}

function get_villages(district_id , attr){

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/get/villages?district_id='+district_id,
        type:"GET",
        dataType:'json',

        success:function(res){
            // console.log(response);
           $("#vilages"+attr).empty();
            $("#vilages"+attr).append('<option>Pilih Kelurahan</option>');
            var index = 0;

            $.each(res,function(key,value){
                $("#vilages"+attr).append('<option value="'+key+'">'+value+'</option>');
            });

        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err);
        }
    })
}




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
