<style>
    body{
        font-family: "Times New Roman", Times, serif;
        font-size: 12pt;
    }

.title{
    text-align: center;
}
.underline{
    font-weight: bold;
    text-decoration: underline;
}

</style>
<!DOCTYPE html>
<html>
<head>
    <title>PERJANJIAN PENGGUNAAN LAYANAN P2P LENDING</title>
</head>
<body>
<h1 class="title">{{ $title }}</h1>
<p>Perjanjian Penggunaan Layanan P2P Lending (“Perjanjian”) ini dibuat dan ditandatangani pada tanggal {{$date_request_loan}} oleh dan antara:</p>
<p>
<b>I.	PT SISTEM INFORMASI APLIKASI PEMBIAYAAN</b>, suatu perseroan terbatas yang didirikan berdasarkan hukum dan
peraturan perundang-undangan di Republik Indonesia, berkedudukan di Jakarta Pusat dan beralamat di MNC Financial Center
    Lantai 10, Jl. Kebon Sirih No. 21-27, Jakarta Pusat – 10340 sebagai penyelenggara Layanan P2P Lending (selanjutnya disebut <b>“Penyelenggara”</b>)
yang bertindak untuk dan atas nama Para Pemberi Pinjaman.
</p>
<p>
    <b>PENDANA</b>
    <table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$borrower->digisigndata->email}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>No. KTP</td>
        <td>:</td>
        <td>{{$borrower->digisigndata->nik}}</td>
    </tr>
    </table>

<p>(selanjutnya disebut <b>"Penerima Pinjaman”</b>).</p>
</p>
<p>
    Penyelenggara dan Penerima Pinjaman selanjutnya secara bersama-sama disebut <b>“Para Pihak”</b> dan secara sendiri-sendiri disebut <b>“Pihak”</b>.
</p>
<p>Para Pihak telah setuju dan sepakat untuk mengikatkan diri ke dalam Perjanjian Kredit ini dengan syarat dan ketentuan sebagai berikut:</p>
<ol type="I">
    <li><b>Defenisi</b>
        <p>Dalam Perjanjian ini:</p>
        <ol>
            <li><b>Para Pemberi Pinjaman</b> berarti pihak yang memberikan Fasilitas Kredit kepada Penerima Pinjaman melalui Layanan P2P Lending yang dikelola oleh Penyelenggara, termasuk di dalamnya Pemberi Pinjaman.</li>
            <li><b>Penerima Pinjaman</b> berarti pihak yang menerima Fasilitas Kredit dari Para Pemberi Pinjaman melalui Layanan P2P Lending yang diselenggarakan oleh Penyelenggara.</li>
            <li><b>Perjanjian Penggunaan Layanan P2P Lending</b> berarti perjanjian yang ditandatangani oleh Penyelenggara dengan Pemberi Pinjaman sehubungan dengan penggunaan Layanan P2P Lending melalui Portal untuk pemberian Fasilitas Kredit ke Penerima Pinjaman.</li>
            <li><b>Layanan P2P Lending</b> berarti layanan pinjam meminjam uang berbasis teknologi informasi yang dilakukan melalui Portal.</li>
            <li><b>Portal</b> berarti website https://siapdanain.id dan/atau aplikasi elektronik “SIAP” yang dikelola oleh Penyelenggara yang digunakan untuk menyelenggarakan Layanan P2P Lending.</li>
            <li><b>Fasilitas Kredit</b> berarti jumlah pinjaman yang terkumpul dan disetujui oleh Para Pemberi Pinjaman untuk dapat dipinjamkan ke Penerima Pinjaman.</li>
        </ol>
    </li>
    <li><b>Penyelenggara Layanan P2P Lending</b>
        <ol>
            <li>Penyelenggara melalui Portal menyediakan Layanan P2P Lending yang memfasilitasi Para Pemberi Pinjaman dan Penerima Pinjaman untuk melakukan transaksi pinjam meminjam uang berbasis teknologi informasi.</li>
            <li>Informasi terkait peluang pemberian Fasilitas Kredit yang tercantum di Portal berasal dan disediakan oleh Penerima Pinjaman. </li>
            <li>Dalam memberikan pinjaman atas Fasilitas Kredit, Pemberi Pinjaman wajib mempelajari seluruh informasi yang diberikan oleh Penerima Pinjaman.</li>
            <li>Pemberi Pinjaman memahami dan mengerti bahwa pemberian pinjaman kepada Penerima Pinjaman melalui Layanan P2P Lending mengandung resiko yang substansial, di antara lain resiko gagal bayar. Pemberi Pinjaman bertanggung jawab sepenuhnya atas penggunaan Layanan P2P Lending melalui Portal.</li>
            <li>Penyelenggara tidak memberikan rekomendasi apapun kepada Pemberi Pinjaman sehubungan dengan pemberian pinjaman atas Fasilitas Kredit.</li>
        </ol>
    </li>

    <li><b>Akses</b>
        <ol>
            <li>Pemberi Pinjaman dapat mengakses Portal menggunakan username dan kata sandi (password) yang dibuat oleh Pemberi Pinjaman. Selama username dan kata sandi (password) digunakan, Penyelenggara dapat beramsusi bahwa Pemberi Pinjaman sendiri yang mengakses Portal.</li>
            <li>Pemberi Pinjaman tidak diperbolehkan memberikan username dan kata sandi (password) kepada pihak lain, apabila Pemberi Pinjaman melanggar ketentuan ini, Pemberi Pinjaman bertanggung jawab sepenuhnya atas tindakan yang dilakukan pihak lain menggunakan username dan kata sandi (password).</li>
        </ol>
    </li>
    <li><b>Fasilitas Kredit</b>
        <ol>
            <li>
            <p>Tunduk kepada ketentuan Perjanjian ini, Para Pemberi Pinjaman telah setuju untuk memberikan Fasilitas Kredit kepada Penerima Pinjaman  dengan syarat dan ketentuan sebagai berikut:</p>
                    <table>
                        <tr>
                            <td>Jumlah Pinjaman</td>
                            <td>:</td>
                            <td>Rp {{number_format($loan->disbrusement ,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Bunga</td>
                            <td>:</td>
                            <td>Rp {{number_format($loan->interest_fee_amount ,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pencairan</td>
                            <td>:</td>
                            <td>{{date('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <td>Tenor</td>
                            <td>:</td>
                            <td>{{$loan->loan_period}} hari</td>
                        </tr>
                        <tr>
                            <td>Jumlah Angsuran</td>
                            <td>:</td>
                            <td>{{$loan->loan_period == 28 ? '4' : '2' }} kali Angsuran</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembayaran Angsuran</td>
                            <td>:</td>
                            <td>____________________________</td>
                        </tr>
                        <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>:</td>
                            <td>____________________________</td>
                        </tr>
                        <tr>
                            <td>Denda Keterlambatan</td>
                            <td>:</td>
                            <td>____________________________</td>
                        </tr>
                        <tr>
                            <td>Pinalti Pembayaran Dipercepat</td>
                            <td>:</td>
                            <td>____________________________</td>
                        </tr>

                    </table>
            </li>
            <li>
                Atas pencairan Fasilitas Kredit tersebut, Penerima Pinjaman mengaku berhutang kepada Para Pemberi Pinjaman senilai jumlah Fasilitas Kredit
            </li>
        </ol>
    </li>
    <li>
        <b>Penggunaan Dana</b>
        <ol>
            <li>Fasilitas Kredit hanya dapat digunakan untuk ____________________________________________________</li>
            <li>Penerima Pinjaman wajib memberikan laporan berkala terkait penggunaan Fasilitas Kredit.
            </li>
        </ol>
    </li>
    <li>
        <b>Biaya untuk Penyelenggara</b>
        <p>Penerima Pinjaman wajib membayar kepada Penyelenggara biaya penggunaan Layanan P2P Lending melalui Portal sebesar.
           Pembayaran atas biaya tersebut akan dilakukan secara langsung dengan cara memotong jumlah pencairan Fasilitas Kredit oleh Penyelenggara. Penerima Pinjaman dengan ini memberikan hak, kuasa dan otorisasi kepada Penyelenggara untuk melakukan pemotongan tersebut.</p>
    </li>
    <li><b>Pembayaran</b>
        <ol>
            <li>Penerima Pinjaman wajib melakukan pembayaran kewajibannya berdasarkan Perjanjian ini secara tepat waktu.
            </li>
            <li>Pembayaran dilakukan ke rekening yang ditentukan oleh Penyelenggara.
            </li>
            <li>Semua pembayaran atas Fasilitas Kredit dari Penerima Pinjaman kepada Para Pemberi Pinjaman akan dilakukan melalui Penyelenggara untuk kepentingan Para Pemberi Pinjaman.
            </li>
        </ol>

    </li>
    <li><b>Pembayaran dipercepat</b>
        <ol>
            <li>Dalam hal Penerima Pinjaman bermaksud melakukan pembayaran dipercepat sebelum berakhirnya tenor Fasilitas Kredit, Penerima Pinjaman wajib memberikan pemberitahuan tertulis kepada Penyelenggara paling lambat 14 (empat belas) hari kalender sebelumnya.
            </li>
            <li>Atas pembayaran dipercepat tersebut, Penerima Pinjaman akan dikenakan pinalti pembayaran dipercepat sebagaimana diatur dalam Butir III Perjanjian ini.
            </li>
        </ol>

    </li>
    <li><b>Pajak</b>
        <p>Segala kewajiban perpajakan yang timbul sehubungan dengan pelaksanaan Perjanjian ini akan menjadi beban dan tanggung jawab masing-masing Pihak sesuai dengan ketentuan peraturan perpajakan yang berlaku.
        </p>
    </li>
    <li><b>Penagihan</b>
        <p>Penerima Pinjaman mengakui bahwa Para Pemberi Pinjaman telah menunjuk Penyelenggara sebagainya kuasanya berdasarkan Perjanjian Penggunaan Layanan P2P Lending, termasuk tetapi tidak terbatas kepada melakukan penagihan dan mengajukan tindakan hukum yang diperlukan untuk melinduni kepentingan Para Pemberi Pinjaman.
            Apabila Penerima Pinjaman gagal melakukan suatu pembayaran dalam waktu yang ditentukan, maka Penerima Pinjaman dengan ini memberi hak, kuasa dan otoritasi kepada Para Pemberi Pinjaman atau Penyelenggara untuk melakukan segala tindakan yang diperlukan untuk memperoleh pelunasan atas Fasilitas Kredit yang belum dilunasi.
            </p>
    </li>
    <li><b>Pengakhiran</b>
        <p>Para Pemberi Pinjaman berhak untuk mengakhiri Perjanjian ini dan meminta pembayaran dipercepat jika: (i) Penerima Pinjaman gagal membayar satu satu kewajiban pembayaran berdasarkan Perjanjian ini; dan (ii) kondisi finansial Penerima Pinjaman memburuk dan membahayakan pelaksanaan pembayaran kembali Fasilitas Kredit kepada Para Pemberi Pinjaman.
        </p>
    </li>
    <li><b>Batasan Tanggung Jawab</b>
        <p>
            Penyelenggara tidak bertanggung jawab atas kerugian baik kerugian langsung maupun tidak langsung yang di derita oleh Pemberi Pinjaman sehubungan dengan pemberian pinjaman atas Fasilitas Kredit kepada Penerima Pinjaman.
            </p>
    </li>
    <li>
        <b>Data Rahasia</b>
        <p>Pemberi Pinjaman dengan ini memberikan otorisasi dan kuasa kepada Penyelenggara untuk mengumpulkan, mengolah, menganalisa dan mengungkap informasi terkait identitas Pemberi Pinjaman ataupun transaksi pemberian pinjaman oleh Pemberi Pinjaman, termasuk tetapi tidak terbatas kepada:
        </p>
        <ol>
            <li>Penyedia layanan tanda tangan elektronik ataupun sertifikasi elektronik (E-KYC)</li>
            <li>Pihak yang berwenang sesuai dengan ketentuan peraturan perundang-undangan
            </li>
            <li>Pihak ketiga yang menunjang kegiatan operasional Penyelenggara, termasuk tidak terbatas kepada bank, konsultan hukum, konsultan keuangan, konsultan pajak.
            </li>
        </ol>
    </li>

    <li>
        <b>Perubahan Para Pihak</b>
        <ol>
            <li>Pemberi Pinjaman dapat, tanpa memberikan pemberitahuan sebelumnya kepada Penerima Pinjaman, mengalihkan hak dan kewajibannya berdasarkan Perjanjian ini kepada pihak lain (“Pemberi Pinjaman Baru”).
            </li>
            <li>Penerima Pinjaman menyetujui dan mengakui keabsahan pengalihan yang dilakukan oleh Pemberi Pinjaman tersebut dan tidak akan mengajukan keberatan atas pengalihan yang dilakukan demikian.
            </li>
            <li>Pemberi Pinjaman mengakui bahwa identitas dari Para Pemberi Pinjaman adalah sebagaimana tercatat dalam daftar yang dipegang oleh Penyelenggara, sebagaimana daftar tersebut dapat diubah berdasarkan pengalihan yang dilakukan dari waktu ke waktu.
            </li>
            <li>Penerima Pinjaman tidak dapat mengalihkan atau mentransfer hak atau kewajibannya berdasarkan Perjanjian ini, kecuali dengan persetujuan tertulis terlebih dahulu dari Penyelenggara.
            </li>
        </ol>
    </li>

    <li><b>Korespondensi</b></li>
    <p>
        Setiap komunikasi yang akan dilakukan berdasarkan atau berkaitan dengan Perjanjian ini harus dilakukan secara tertulis melalui pos, fax, email atau komunikasi elektronik lainnya yang disetujui oleh Para Pihak.
    </p>
    <p>
        Detail alamat setiap Pihak untuk komunikasi atau pengiriman dokumen yang akan dilakukan atau disampaikan berdasarkan Perjanjian ini adalah:
    </p>
    <p class="underline">Kepada Para Pemberi Pinjaman</p>
    <p>PT Sistem Informasi Aplikasi Pembiayaan</p>
    <p>MNC Financial Center Lantai 10</p>
    <p>Jl. Kebon Sirih No. 21-27</p>
    <table>
        <tr>
            <td>U.p</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
        <tr>
            <td>Fax</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
    </table>

    <p class="underline">Kepada Pemberi Pinjaman</p>
    <table>
        <tr>
            <td>U.p</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
        <tr>
            <td>Fax</td>
            <td>:</td>
            <td>____________________________</td>
        </tr>
    </table>
    <li><b>Ketidakabsahan Sebagian</b>
        <p>Jika suatu ketentuan dalam Perjanjian ini menjadi bertentangan dengan hukum, tidak sah atau tidak dapat dilaksanakan berdasarkan suatu peraturan perundang-undangan yang berlaku, maka hal tersebut tidak akan mempengaruhi legalitas, keabsahan atau keberlakukan ketentuan lain dari Perjanjian ini.</p>
    </li>
    <li><b>Hukum Yang Mengatur</b>
        <p>Perjanjian ini diatur dan wajib ditafsirkan berdasarkan hukum dan peraturan perundang-undangan yang berlaku di Republik Indonesia.</p>
    </li>
    <li><b>Perselisihan Sengketa</b>
        <p>Setiap gugatan, klaim atau perselisihan yang timbul dari atau sehubungan dengan Perjanjian ini akan diselesaikan melalui persidangan di Pengadilan Negeri Jakarta Pusat.</p>
        <p>Demikianlah Perjanjian ini ditandatangani secara elektronik dan akan mempunyai kekuatan hukum yang sama apabila Perjanjian ditandatangani secara langsung (tanda tangan basah).</p>
        <br>
        <br>
        <table style="width: 100%">
            <tr>
                <td>Penyelenggara selaku kuasa, untuk dan atas nama Para Pemberi Pinjaman
                </td>
                <td>Penerima Pinjaman</td>
            </tr>
            <tr>
                <td>PT Sistem Informasi Aplikasi Pembiayaan</td>
                <td></td>
            </tr>
            <tr>
                <td><br><br><br><br><br></td>
                <td></td>
            </tr>
            <tr>
                <td>______________________________</td>
                <td>______________________________</td>
            </tr>
        </table>

    </li>
</ol>
</body>
</html>
