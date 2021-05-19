@extends('layouts.app_lender')
@section('content')
<div class="container containers-with-margin">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active text-light">Profil</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="st-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show tab-header-custom" id="tab-1" data-toggle="tab" href="#service1" role="tab" aria-controls="responsibilities" aria-selected="true"> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-header-custom" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="education" aria-selected="false">Informasi Usaha</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-header-custom" id="tab-3" data-toggle="tab" href="#service3" role="tab" aria-controls="experience" aria-selected="false">Berkas Usaha</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-header-custom" id="tab-4" data-toggle="tab" href="#service4" role="tab" aria-controls="tab-4" aria-selected="false">Direktur / Komisioner</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active show" id="service1">
                        <div class="row">
                            <form class="row g-3">
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Usaha</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jenis Lender</label>
                                        <p><b>{{Auth::user()->level}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Perusahaan</label>
                                        <p><b>{{$profile->business_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor NPWP</label>
                                        <p><b>{{$profile->npwp}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <p><b>{{$profile->email}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                                        <p><b>{{$profile->phone_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Propinsi</label>
                                        <p><b>{{$profile->provinces_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Kota</label>
                                        <p><b>{{$profile->regencies_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Kecamatan</label>
                                        <p><b>{{$profile->districts_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Kelurahan</label>
                                        <p><b>{{$profile->villages_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <p><b>{{$profile->address}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Website</label>
                                        <p><b>{{$profile->website}}</b></p>
                                    </div>
                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Sertifikat Perusahaan</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Induk Berusaha </label>
                                        <p><b>{{$profile->induk_berusaha_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Tanda Terdaftar Perusahaan (TDP)</label>
                                        <p><b>{{$profile->tdp_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Akta pendirian & tanggal</label>
                                        <p><b>{{$profile->akta_pendirian}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor pengesahaan KEMENKUMHAM AHU</label>
                                        <p><b>{{$profile->letter_register_pengesahan_kemenkunham}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Akta perubahan terakhir & tanggal</label>
                                        <p><b>{{$profile->letter_change_pengesahan_kemenkunham}}</b></p>
                                    </div>

                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Aset</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jumlah Setoran Modal</label>
                                        <p><b>{{$profile->amount_setoran_modal}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Wajib Pajak</label>
                                        <p><b>{{$profile->taxpayer == 'non_pkp' ? 'Non PKP' : 'PKP'}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nilai Aset</label>
                                        <p><b>{{$profile->asset_value}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nilai Ekuitas</label>
                                        <p><b>{{$profile->equity_value}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Kewajiban Jangka Pendek</label>
                                        <p><b>{{$profile->short_term_obligations}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Pendapatan Tahun berjalan sampai dengan saat ini</label>
                                        <p><b>{{$profile->annual_income}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Beban Operasional tahun berjalan sampai dengan saat ini</label>
                                        <p><b>{{$profile->operating_expenses}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Laba - Rugi periode Tahun berjalan sampai dengan saat ini</label>
                                        <p><b>{{$profile->profit_and_loss}}</b></p>
                                    </div>

                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Bank</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Bank Penerima</label>
                                        <p><b>{{$profile->ibank}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Rekening</label>
                                        <p><b>{{$profile->rekening_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Rekening</label>
                                        <p><b>{{$profile->rekening_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Rekening Dana Lender</label>
                                        <p><b>{{$profile->rdl_number}}</b></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="service2">
                        <div class="row">
                            @if($other_data->individuinfo)
                            <form class="row g-3">
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Direktur</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">NIK</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->company_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->business_legality->legality_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->phone_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->no_siup}}</b></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->no_npwp}}</b></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">NPWP</label>
                                        <p><b>{{date('d M Y' , strtotime($profile->individuinfo->individubusiness->date_of_business_birth))}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jabatan</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->place_status->place_status_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Alamat</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->type->industry_sectore}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->full_address}}</b></p>
                                        <p><b>{{$profile->individuinfo->individubusiness->provinces->name.' ,'.$profile->individuinfo->individubusiness->cities->name.' ,'.$profile->individuinfo->individubusiness->districts->name.' ,'.$profile->individuinfo->villagess->name.', '.$profile->individuinfo->kodepos}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->identity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->identity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Komisioner</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">NIK</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->company_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->business_legality->legality_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->phone_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->no_siup}}</b></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->no_npwp}}</b></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">NPWP</label>
                                        <p><b>{{date('d M Y' , strtotime($profile->individuinfo->individubusiness->date_of_business_birth))}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jabatan</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->place_status->place_status_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Alamat</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->type->industry_sectore}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                                        <p><b>{{$profile->individuinfo->individubusiness->full_address}}</b></p>
                                        <p><b>{{$profile->individuinfo->individubusiness->provinces->name.' ,'.$profile->individuinfo->individubusiness->cities->name.' ,'.$profile->individuinfo->individubusiness->districts->name.' ,'.$profile->individuinfo->villagess->name.', '.$profile->individuinfo->kodepos}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->identity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->identity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Keuangan dan Karyawan (6 Bulan Terakhir)</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Rata-Rata Penjualan per Bulan  </label>
                                        <p><b> Rp {{number_format($profile->individuinfo->individubusiness->average_sales_revenue_six_month , 0 , '.','.')}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Rata-Rata Pengeluaran per Bulan</label>
                                        <p><b>Rp {{number_format($profile->individuinfo->individubusiness->average_monthly_expenditure_six_month , 0 , '.','.')}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Rata-Rata Keuntungan per Bulan</label>
                                        <p><b>Rp {{number_format($profile->individuinfo->individubusiness->average_monthly_profit_six_month , 0 , '.','.')}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Total Karyawan Saat Ini </label>
                                        <p><b>{{$profile->individuinfo->individubusiness->total_employee}}</b></p>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="service3">
                        <div class="row">
                            @if($other_data->individuinfo)
                            <form class="row g-3">
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Usaha</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jenis Lender</label>
                                        <p><b>{{$profile->level}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Perusahaan</label>
                                        <p><b>{{$profile->individuinfo->identity_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor NPWP</label>
                                        <p><b>{{$profile->individuinfo->fullname}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <p><b>{{$profile->phone_number_verified}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                                        <p><b>{{$profile->individuinfo->whatsapp_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <p><b>{{$profile->individuinfo->email}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                                        <p><b>{{$profile->individuinfo->gender == 'male' ? 'Laki-laki' : 'Perempuan'}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Tempat Tanggal Lahir</label>
                                        <p><b>{{$profile->individuinfo->pob}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Pendidikan terakhir</label>
                                        <p><b>{{$profile->individuinfo->educations->level}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Ibu Kandung</label>
                                        <p><b>{{$profile->individuinfo->mother_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Status Pernikahan</label>
                                        <p><b>{{$profile->individuinfo->marital_status->status}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Status Tempat Tingggal Usaha</label>
                                        <p><b>{{$profile->individuinfo->status_of_residences ? $profile->individuinfo->status_of_residences->place_status_name : ''}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor NPWP</label>
                                        <p><b>{{$profile->individuinfo->no_npwp}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Jumlah Kartu Kredit</label>
                                        <p><b>{{$profile->individuinfo->total_credit_card}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">No BPJS TK</label>
                                        <p><b>{{$profile->individuinfo->no_bpjs_tk}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">No BPJS KEsehatan</label>
                                        <p><b>{{$profile->individuinfo->no_bpjs_kesehatan}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                                        <p><b>{{$profile->individuinfo->full_address}}</b></p>
                                        <p><b>{{$profile->individuinfo->provinces->name.' ,'.$profile->individuinfo->cities->name.' ,'.$profile->individuinfo->districts->name.' ,'.$profile->individuinfo->villagess->name.', '.$profile->individuinfo->kodepos}}</b></p>
                                    </div>
                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Kerabat</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Kerabat</label>
                                        <p><b>{{$profile->individuinfo->individuemergency->emergency_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Hubungan</label>
                                        <p><b>{{$profile->individuinfo->individuemergency->sibling->sibling_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">No Telepon</label>
                                        <p><b>{{$profile->individuinfo->individuemergency->emergency_phone_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">ALamat</label>
                                        <p><b>{{$profile->individuinfo->individuemergency->emergency_full_address}}</b></p>
                                    </div>
                                </div>
                                <div class="m-separator m-separator--dashed"></div>
                                <div class="row font-custom">
                                    <div class="col-md-12">
                                        <h4>Informasi Bank</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Bank Penerima</label>
                                        <p><b>{{$profile->individuinfo->individubank->bank->bank_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nomor Rekening</label>
                                        <p><b>{{$profile->individuinfo->individubank->account_number}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Nama Penerima</label>
                                        <p><b>{{$profile->individuinfo->individubank->account_name}}</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">No Telepon yang didaftarkan di bank</label>
                                        <p><b>{{$profile->individuinfo->individubank->phone_number_register_in_bank}}</b></p>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="service4">
                        <form class="row g-3">
                            <div class="row font-custom">
                                <div class="col-md-12">
                                    <h4>Berkas Pribadi</h4>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">KTP</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->identity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Swa foto</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->self_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">NPWP</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->npwp_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="m-separator m-separator--dashed"></div>
                            <div class="row font-custom">
                                <div class="col-md-12">
                                    <h4>Berkas Usaha/Pekerjaan</h4>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">NPWP Usaha</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->business_npwp_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Tempat Usaha</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->business_place_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Surat Izin Usaha atau Sejenisnya</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->license_business_document_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Bukti Kepemilikan / Kontrak Tempat Usaha</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->proof_of_ownership_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Dokumen Usaha</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->document_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Aktifitas Usaha</label>
                                    <div class="file_preview">
                                        <img class="img-file"
                                            src="{{ asset('/upload/lender/individu/file/attachment') }}/{{ $profile->individuinfo->individufile->business_activity_image ?? '' }}"
                                            id="business_place_image_preview" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .m-separator.m-separator--dashed {
        border-bottom: 1px dashed #ebedf2;
        width: 100%;
    }
    .tab-header-custom{
        font-size: 12px !important;
    }
    .col-md-6{
        padding: 10px 35px 10px 35px !important;
    }
    .font-custom{
        padding: 10px 35px 10px 35px !important;
        font-size: 13px !important;
    }
    </style>
@section('js')
    <script src="{{ asset('/script/profile.js') }}"></script>
@endsection
@endsection
