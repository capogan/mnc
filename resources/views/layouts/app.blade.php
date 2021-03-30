<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
     <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontello.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-slider.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/2.1.0/select2.css" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
    <!-- Flaticon -->
    <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-slider.css')}}">

    <title>SIAP</title>

</head>
<body>
<div class="header header-regular">
        <div class="container">
            <div class="row">
                <div class="col-sm-1.1">
                    <!-- logo -->
                    <div class="logo p-2">
                    <a href="#">[LOGO]</a>

                    </div>
                </div>
                <div class="col-sm-1">
                   <div class="logo p-2">
                        <img src="/images/ojk3.png" alt="Logo">
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                  <div id="navigation" class="p-2">
                        <!-- navigation start-->
                        <ul>
                            <li class="active"><a href="/" class="animsition-link">Home</a>

                            @if (Auth::check())
                            <li><a href="/register/borrower" class="animsition-link">profile</a>
                            </li>
                            @else
                                <li><a href="/lender" class="animsition-link">Pendanaan</a>
                                </li>
                                <li><a href="/pinjam" class="animsition-link">Peminjam</a>
                                </li>
                            @endif

                            <li class="active"><a href="/" class="animsition-link">Perusahaan</a>
                            <ul>
                                <li><a href="/tentang-kami" class="animsition-link">Tentang Kami</a>
                                <li><a href="/kegiatan" class="animsition-link">Kegiatan</a>
                            </ul>
                            <li class="active"><a href="#" class="animsition-link">Pusat Bantuan</a>


                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block p-2">
                    @if (Auth::check())
                        <div class="btn-action">
                            <a href="/logout" class="btn btn-default">KELUAR</a> </div>
                        </div>
                    @else
                        <div class="btn-action">
                            <a href="/login" class="btn btn-default">MASUK</a> </div>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@yield('content')


    <div class="footer section-space100 mt-3">
        <!-- footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="logo">
                        <!-- Footer Logo -->
                       <img src="/images/ojk3.png" alt="Logo">
                        </div>
                    <!-- /.Footer Logo -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <h3 class="newsletter-title">Signup Our Newsletter</h3>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="newsletter-form">
                                <!-- Newsletter Form -->
                                <form action="https://jituchauhan.com/borrow/bootstrap-4/newsletter.php" method="post">
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Write E-Mail Address" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form>
                            </div>
                            <!-- /.Newsletter Form -->
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
            <hr class="dark-line">
            <div class="row">
            <ol class="disclaimer">
                <li  class="">Layanan Pinjam Meminjam Berbasis Teknologi Informasi merupakan kesepakatan perdata antara Pemberi Pinjaman dengan Penerima Pinjaman, sehingga segala risiko yang timbul dari kesepakatan tersebut ditanggung sepenuhnya oleh masing-masing pihak.</li>
                <li  class="">Risiko kredit atau gagal bayar ditanggung sepenuhnya oleh Pemberi Pinjaman. Tidak ada lembaga atau otoritas negara yang bertanggung jawab atas risiko gagal bayar ini.</li>
                <li  class="">Penyelenggara dengan persetujuan dari masing-masing Pengguna (Pemberi Pinjaman dan/atau Penerima Pinjaman) mengakses, memperoleh, menyimpan, mengelola, dan/atau menggunakan data pribadi Pengguna ("Pemanfaatan Data") pada atau di dalam benda, perangkat elektronik (termasuk smartphone atau telepon seluler), perangkat keras (hardware) maupun lunak (software), dokumen elektronik, aplikasi atau sistem elektronik milik Pengguna atau yang dikuasai Pengguna, dengan memberitahukan tujuan, batasan, dan mekanisme Pemanfaatan Data tersebut kepada Pengguna yang bersangkutan sebelum memperoleh persetujuan yang dimaksud.</li>
                <li  class="">Pemberi Pinjaman yang belum memiliki pengetahuan dan pengalaman pinjam meminjam, disarankan untuk tidak menggunakan layanan ini.</li>
                <li  class="">Penerima Pinjaman harus mempertimbangkan tingkat bunga pinjaman dan biaya lainnya sesuai dengan kemampuan dalam melunasi pinjaman.</li>
                <li  class="">Setiap kecurangan tercatat secara digital di dunia maya dan dapat diketahui masyarakat luas di media sosial.</li>
                <li  class="">Pengguna harus membaca dan memahami informasi ini sebelum membuat keputusan menjadi Pemberi Pinjaman atau Penerima Pinjaman. </li>
                <li  class="">Pemerintah yaitu dalam hal ini Otoritas Jasa Keuangan, tidak bertanggung jawab atas setiap pelanggaran atau ketidakpatuhan oleh Pengguna, baik Pemberi Pinjaman maupun Penerima Pinjaman (baik karena kesengajaan atau kelalaian Pengguna) terhadap ketentuan peraturan perundang-undangan maupun kesepakatan atau perikatan antara Penyelenggara dengan Pemberi Pinjaman dan/atau Penerima Pinjaman.</li>
                <li  class="">Setiap transaksi dan kegiatan pinjam meminjam atau pelaksanaan kesepakatan mengenai pinjam meminjam antara atau yang melibatkan Penyelenggara, Pemberi Pinjaman, dan/atau Penerima Pinjaman wajib dilakukan melalui escrow account dan virtual account sebagaimana yang diwajibkan berdasarkan Peraturan Otoritas Jasa Keuangan Nomor 77/POJK.01/2016 tentang Layanan Pinjam Meminjam Uang Berbasis Teknologi Informasi dan pelanggaran atau ketidakpatuhan terhadap ketentuan tersebut merupakan bukti telah terjadinya pelanggaran hukum oleh Penyelenggara sehingga Penyelenggara wajib menanggung ganti rugi yang diderita oleh masing-masing Pengguna sebagai akibat langsung dari pelanggaran hukum tersebut di atas tanpa mengurangi hak Pengguna yang menderita kerugian menurut Kitab Undang-Undang Hukum Perdata.</li>
                <li  class="">SIAP merupakan badan hukum yang didirikan berdasarkan Hukum Republik Indonesia. Berdiri sebagai perusahaan yang telah diatur oleh dan dalam pengawasan Otoritas Jasa Keuangan (OJK) di Indonesia, Perusahaan menyediakan layanan interfacing  sebagai penghubung pihak yang memberikan pinjaman dan pihak yang membutuhkan pinjaman meliputi pendanaan dari individu, organisasi, maupun badan hukum kepada individu atau badan hukum tertentu. Perusahaan tidak menyediakan segala bentuk saran atau rekomendasi pendanaan terkait pilihan-pilihan dalam situs ini.</li>
                <li  class="">Isi dan materi yang tersedia pada situs <b>siap.id</b> dimaksudkan untuk memberikan informasi dan tidak dianggap sebagai sebuah penawaran, permohonan, undangan, saran, maupun rekomendasi untuk menginvestasikan sekuritas, produk pasar modal, atau jasa keuangan lainya. Perusahaan dalam memberikan jasanya hanya terbatas pada fungsi administratif.</li>
                <li  class="">Pendanaan dan pinjaman yang ditempatkan di rekening siap adalah tidak dan tidak akan dianggap sebagai simpanan yang diselenggarakan oleh Perusahaan seperti diatur dalam Peraturan Perundang-Undangan tentang Perbankan di Indonesia. Perusahaan atau setiap Direktur, Pegawai, Karyawan, Wakil, Afiliasi, atau Agen-Agennya tidak memiliki tanggung jawab terkait dengan setiap gangguan atau masalah yang terjadi atau yang dianggap terjadi yang disebabkan oleh minimnya persiapan atau publikasi dari materi yang tercantum pada situs Perusahaan.</li>
            </ol>
            </div>
        </div>
    </div>
    <div class="tiny-footer">
        <!-- tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">


                </div>
            </div>
        </div>
    </div>


<a href="#0" class="cd-top" title="Go to top">Top</a>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.inputmask.bundle.js')}}" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/2.1.0/select2.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('script/main.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/slider-carousel.js')}}"></script>
{{--<script src="{{asset('js/service-carousel.js')}}"></script>--}}

@yield('js')

</body>
</html>
