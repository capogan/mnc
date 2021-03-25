$(document).ready(function() {

    $("#npwp_of_bussiness,#npwp_of_director").inputmask({"mask": "99.999.999.9-999.999"});

    $('#asset_value,#equity_value,#short_term_liabilities,#income_year,#operating_expenses,#profit_loss').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return 'Rp ' + value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));


    $("#form_lender_business_information").on("submit", function(event) {

        event.preventDefault();

        var btn = $("#btn_submit_voucher");
        btn.attr("disabled", "disabled");

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/lender/information/business/add/',
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

            }
        })
    });

    var max_fields      = 3; //maximum input boxes allowed
    var wrapper         = $("#section_director"); //Fields wrapper
    var add_button      = $("#add_director_section"); //Add button ID
    var add_button_com  = $("#add_commissioner_section"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();


        if( $('.section_number_append').length < max_fields){
            x++;
            $(wrapper).append('<div class="remove_'+x+' section_number_append"><button type="button" class="btn btn-sm btn-danger pull-right remove_field_'+x+'" style="background:crimson">hapus</button><h3 class="title-section">Informasi Direktur </h3>\n' +
                '\n' +
                '                                                        <hr>\n' +
                '                                                        <div class="result-message"></div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NIK<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nama<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nama Direktur" id="director_name" name="director_name">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Tanggal Lahir<span>*</span></h6>\n' +
                '                                                                <input class="form-control" type="date"  name="dob" id="example-date-input" value="">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Email<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Email" name="email" id="email"  value="">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nomor Telepon<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number" value="" >\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NPWP<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_director" name="npwp_of_director">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Jabatan<span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="director_level">\n' +
                '                                                                    <option value="">--Pilih Jabatan--</option>\n' +
                '                                                                    <option value="director">Direktur</option>\n' +
                '                                                                    <option value="president_director">Direktur Utama</option>\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Alamat<span>*</span></h6>\n' +
                '                                                                <textarea class="form-control" name="address" id="address"></textarea>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Propinsi <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="province" name="province" onChange="get_city(this.value);" style="width: 100%;">\n' +
                '                                                                    <option></option>\n' +
                '                                                                    @foreach($provinces as $key => $val)\n' +
                '                                                                        <option value="{{$val->id}}">{{$val->name}}</option>\n' +
                '                                                                    @endforeach\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kota <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="city" name="city" onchange="get_district(this.value)">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4 mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kecamatan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="district" name="district" onchange="get_villages(this.value)" >\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kelurahan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="vilages" name="vilages">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div></div>');
            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1)
            })

        }
        $(wrapper).on("click",".remove_field_"+x, function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1);
            })
        })
    });


//    add_commissioner_section



    $(add_button_com).click(function(e){ //on add input button click
        e.preventDefault();


        if( $('.section_number_append').length < max_fields){
            x++;
            $(wrapper).append('<div class="remove_'+x+' section_number_append"><button type="button" class="btn btn-sm btn-danger pull-right remove_field_'+x+'" style="background:crimson">hapus</button><h3 class="title-section">Informasi komisaris </h3>\n' +
                '\n' +
                '                                                        <hr>\n' +
                '                                                        <div class="result-message"></div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NIK<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor KTP" id="identity_number" name="identity_number">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nama<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nama Komisaris" id="commissioner_name" name="commissioner_name">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Tanggal Lahir<span>*</span></h6>\n' +
                '                                                                <input class="form-control" type="date"  name="dob" id="example-date-input" value="">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Email<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Email" name="email" id="email"  value="">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Nomor Telepon<span>*</span></h6>\n' +
                '                                                                <input type="text" class="form-control" placeholder="Nomor Telepon" id="phone_number" name="phone_number" value="" >\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>NPWP<span>*</span></h6>\n' +
                '                                                                <input type="text" value="" class="form-control" placeholder="Nomor Npwp" id="npwp_of_commissioner" name="npwp_of_commissioner">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Jabatan<span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="director_level">\n' +
                '                                                                    <option value="">--Pilih Jabatan--</option>\n' +
                '                                                                    <option value="director">Direktur</option>\n' +
                '                                                                    <option value="president_director">Direktur Utama</option>\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Alamat<span>*</span></h6>\n' +
                '                                                                <textarea class="form-control" name="address" id="address"></textarea>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Propinsi <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="province" name="province" onChange="get_city(this.value);" style="width: 100%;">\n' +
                '                                                                    <option></option>\n' +
                '                                                                    @foreach($provinces as $key => $val)\n' +
                '                                                                        <option value="{{$val->id}}">{{$val->name}}</option>\n' +
                '                                                                    @endforeach\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kota <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="city" name="city" onchange="get_district(this.value)">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <div class="row mt-4 mb-4">\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kecamatan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="district" name="district" onchange="get_villages(this.value)" >\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col">\n' +
                '                                                                <h6>Kelurahan <span>*</span></h6>\n' +
                '                                                                <select class="form-control" id="vilages" name="vilages">\n' +
                '                                                                </select>\n' +
                '                                                            </div>\n' +
                '                                                        </div></div>');
            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1)
            })

        }
        $(wrapper).on("click",".remove_field_"+x, function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
            $('.section_number_append').each(function(index){
                $(this).find('.klkl').text(index+1);
            })
        })
    });

});

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


