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
        <td>{{$lender->digisigndata->email}}</td>
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

<p>(selanjutnya disebut <b>"Pemberi Pinjaman”</b>).</p>
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
                    <tr>
                        <td>Komisi ke Penyelenggara</td>
                        <td>:</td>
                        <td>____________________________</td>
                    </tr>

                </table>
    </li>
    <li>
        <b>Pemberian Kuasa</b>
        <ol>
            <li>Sehubungan dengan pemberian pinjaman atas Fasilitas Kredit dari Para Pemberi Pinjaman kepada Penerima Pinjaman, Penyelenggara bukanlah pihak dalam transaksi tersebut. Dalam hal Penyelenggara bertindak mewakili Pemberi Pinjaman maka hal tersebut semata-mata didasarkan kuasa khusus dari Pemberi Pinjaman.</li>
            <li>Terkait dengan butir (1) di atas, Pemberi Pinjaman dengan ini memberikan otorisasi dan kuasa dengan hak substitusi untuk bertindak untuk dan atas nama Pemberi Pinjaman, untuk:
                <ol type="a">
                    <li>Menandatangani dan mengikatkan diri ke dalam setiap perjanjian kredit, dokumen jaminan atau penanggungan dan dokumen pendukung lainnya sehubungan dengan pemberian Fasilitas Kredit kepada Penerima Pinjaman dari waktu ke waktu.
                    </li>
                    <li>Menyalurkan dana Pemberi Pinjaman sesuai dengan jumlah Fasilitas Kredit yang disetujui oleh Para Pemberi Pinjaman untuk dipinjamkan ke Penerima Pinjaman. </li>
                    <li>Mengelola Fasilitas Kredit, termasuk menerima pembayaran pokok pinjaman, bunga dan pembayaran lainnya terkait Fasilitas Kredit.
                    </li>
                    <li>Mengirimkan atau memberikan pemberitahuan, persetujuan, tagihan kepada Penerima Pinjaman.</li>
                    <li>Melakukan penagihan kepada Penerima Pinjaman dengan cara apapun yang dipandang perlu Penyelenggara.</li>
                    <li>Mengajukan tindakan hukum yang diperlukan untuk melindungi kepentingan Pemberi Pinjaman dalam pemberian Fasilitas Kredit.</li>
                </ol>
            </li>
            <li>
                Segala otorisasi dan kuasa yang diberikan oleh Pemberi Pinjaman kepada Penyelenggara berdasarkan Perjanjian ini akan tunduk kepada ketentuan sebagai berikut:

                <ol type="a">
                    <li>Seluruh kuasa dan kewenangan yang diberikan oleh Pemberi Pinjaman kepada Penyelenggara tidak dapat dicabut atau ditarik kembali dengan alasan apapun dan Pemberi Pinjaman mengesampingkan ketentuan Pasal 1813, 1814, dan 1816 Kitab Undang-undang Hukum Perdata Indonesia.
                    </li>
                    <li>Pemberi Pinjaman dengan ini mengesahkan seluruh tindakan Penyelenggara yang dilakukan berdasarkan Perjanjian ini.</li>
                </ol>
            </li>
        </ol>
    </li>
    <li><b>Pajak</b>
        <p>Segala kewajiban perpajakan yang timbul sehubungan dengan pelaksanaan Perjanjian ini akan menjadi beban dan tanggung jawab masing-masing Pihak sesuai dengan ketentuan peraturan perpajakan yang berlaku.
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
    <li><b>Pengalihan Perjanjian</b>
        <p>Pemberi Pinjaman tidak dapat mengalihkan atau mentransfer hak atau kewajibannya berdasarkan Perjanjian ini, kecuali dengan persetujuan tertulis terlebih dahulu dari Penyelenggara.
        </p>
    </li>
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
                <td>Penyelenggara</td>
                <td>Pemberi Pinjaman</td>
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
