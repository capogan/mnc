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
    <title>PERJANJIAN KREDIT</title>
</head>
<body>
<h1 class="title">{{ $title }}</h1>
<p>Perjanjian Kredit ini dibuat dan ditandatangani pada tanggal {{$date_request_loan}} oleh dan antara:</p>
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
        <td>Phone</td>
        <td>:</td>
        <td>{{$borrower->digisigndata->phone_number}}</td>
    </tr>
    <tr>
        <td>No. KTP</td>
        <td>:</td>
        <td>{{$borrower->digisigndata->nik}}</td>
    </tr>
    </table>

    {{-- <b>PEMINJAM</b>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$lender->digisigndata->email}}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>:</td>
            <td>{{$lender->digisigndata->phone_number}}</td>
        </tr>
        <tr>
            <td>No. KTP</td>
            <td>:</td>
            <td>{{$lender->digisigndata->nik}}</td>
        </tr>
        </table> --}}

<p>(selanjutnya disebut <b>“Penerima Pinjaman”</b>).</p>
</p>
<p>
    Penyelenggara dan Penerima Pinjaman selanjutnya secara bersama-sama disebut <b>“Para Pihak”</b> dan secara sendiri-sendiri disebut <b>“Pihak”</b>.
</p>
<p>Para Pihak telah setuju dan sepakat untuk mengikatkan diri ke dalam Perjanjian Kredit ini dengan syarat dan ketentuan sebagai berikut:</p>
<ul type="I">
    <li>Defenisi
    <p>Dalam Perjanjian ini:</p>
    <ul>
        <li><b>Para Pemberi Pinjaman</b> berarti pihak yang memberikan Fasilitas Kredit kepada Penerima Pinjaman melalui Layanan P2P Lending yang dikelola oleh Penyelenggara, termasuk di dalamnya Pemberi Pinjaman.</li>
        <li><b>Penerima Pinjaman</b> berarti pihak yang menerima Fasilitas Kredit dari Para Pemberi Pinjaman melalui Layanan P2P Lending yang diselenggarakan oleh Penyelenggara.</li>
        <li><b>Perjanjian Penggunaan Layanan P2P Lending</b> berarti perjanjian yang ditandatangani oleh Penyelenggara dengan Pemberi Pinjaman sehubungan dengan penggunaan Layanan P2P Lending melalui Portal untuk pemberian Fasilitas Kredit ke Penerima Pinjaman.</li>
        <li><b>Layanan P2P Lending</b> berarti layanan pinjam meminjam uang berbasis teknologi informasi yang dilakukan melalui Portal.</li>
        <li><b>Portal</b> berarti website https://siapdanain.id dan/atau aplikasi elektronik “SIAP” yang dikelola oleh Penyelenggara yang digunakan untuk menyelenggarakan Layanan P2P Lending.</li>
        <li><b>Fasilitas Kredit</b> berarti jumlah pinjaman yang terkumpul dan disetujui oleh Para Pemberi Pinjaman untuk dapat dipinjamkan ke Penerima Pinjaman.</li>
    </ul>
    </li>
    <li>Penyelenggara
    <p>Para Pihak mengakui bahwa Penyelenggara merupakan penyedia Layanan P2P Lending melalui Portal dan menandatangani Perjanjian ini sebagai kuasa dari, dan oleh karenanya untuk dan atas nama Para Pemberi Pinjaman berdasarkan Perjanjian Penggunaan Layanan P2P Lending.</p>
    </li>
    <li>Fasilitas Kredit</li>
    <ul>
        <li>Tunduk kepada ketentuan Perjanjian ini, Para Pemberi Pinjaman telah setuju untuk memberikan Fasilitas Kredit kepada Penerima Pinjaman  dengan syarat dan ketentuan sebagai berikut:
            <table>
                <tr>
                    <td>Jumlah Pinjaman</td>
                    <td>:</td>
                    <td>{{$loan->disbrusement}}</td>
                </tr>
                <tr>
                    <td>Bunga</td>
                    <td>:</td>
                    <td>{{$loan->interest_fee_amount}}</td>
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
                    <td>{{$loan->loan_period == 28 ? '4' : }}</td>
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
            
            <ul>
                <li></li>
                <li>Bunga</li>
                <li>Tanggal Pencairan</li>
                <li>Tenor</li>
                <li>Jumlah Angsuran</li>
                <li>Tanggal Pembayaran Angsuran</li>
                <li>Tanggal Jatuh Tempo</li>
                <li>Denda Keterlambatan</li>
                <li>Pinalti Pembayaran Dipercepat</li>
            </ul>
        </li>
        <li>Atas pencairan Fasilitas Kredit tersebut, Penerima Pinjaman mengaku berhutang kepada Para Pemberi Pinjaman senilai jumlah Fasilitas Kredit. </li>
    </ul>
    <li>Penggunaan Dana
    <ul>
        <li>Fasilitas Kredit hanya dapat digunakan untuk</li>
        <li>Penerima Pinjaman wajib memberikan laporan berkala terkait penggunaan Fasilitas Kredit.</li>
    </ul>
    </li>
    <li>Biaya untuk Penyelenggara
    <p>Penerima Pinjaman wajib membayar kepada Penyelenggara biaya penggunaan Layanan P2P Lending melalui Portal sebesar 			. Pembayaran atas biaya tersebut akan dilakukan secara langsung dengan cara memotong jumlah pencairan Fasilitas Kredit oleh Penyelenggara. Penerima Pinjaman dengan ini memberikan hak, kuasa dan otorisasi kepada Penyelenggara untuk melakukan pemotongan tersebut.</p>
    </li>
    <li>Pembayaran</li>
    <ul>
        <li>Penerima Pinjaman wajib melakukan pembayaran kewajibannya berdasarkan Perjanjian ini secara tepat waktu.</li>
        <li>Pembayaran dilakukan ke rekening yang ditentukan oleh Penyelenggara.</li>
        <li>Semua pembayaran atas Fasilitas Kredit dari Penerima Pinjaman kepada Para Pemberi Pinjaman akan dilakukan melalui Penyelenggara untuk kepentingan Para Pemberi Pinjaman.</li>
    </ul>
    <li>Pembayaran dipercepat
        <ul>
            <li>Dalam hal Penerima Pinjaman bermaksud melakukan pembayaran dipercepat sebelum berakhirnya tenor Fasilitas Kredit, Penerima Pinjaman wajib memberikan pemberitahuan tertulis kepada Penyelenggara paling lambat 14 (empat belas) hari kalender sebelumnya.</li>
            <li>Atas pembayaran dipercepat tersebut, Penerima Pinjaman akan dikenakan pinalti pembayaran dipercepat sebagaimana diatur dalam Butir III Perjanjian ini.</li>
        </ul>
    </li>
    <li>Pajak</li>
            <p>Segala kewajiban perpajakan yang timbul sehubungan dengan pelaksanaan Perjanjian ini akan menjadi beban dan tanggung jawab masing-masing Pihak sesuai dengan ketentuan peraturan perpajakan yang berlaku.</p>


    <li>Penagihan</li>

        <p>Penerima Pinjaman mengakui bahwa Para Pemberi Pinjaman telah menunjuk Penyelenggara sebagainya kuasanya berdasarkan Perjanjian Penggunaan Layanan P2P Lending, termasuk tetapi tidak terbatas kepada melakukan penagihan dan mengajukan tindakan hukum yang diperlukan untuk melinduni kepentingan Para Pemberi Pinjaman.
            Apabila Penerima Pinjaman gagal melakukan suatu pembayaran dalam waktu yang ditentukan, maka Penerima Pinjaman dengan ini memberi hak, kuasa dan otoritasi kepada Para Pemberi Pinjaman atau Penyelenggara untuk melakukan segala tindakan yang diperlukan untuk memperoleh pelunasan atas Fasilitas Kredit yang belum dilunasi.
        </p>

    <li>Pengakhiran</li>
        <p>
            Para Pemberi Pinjaman berhak untuk mengakhiri Perjanjian ini dan meminta pembayaran dipercepat jika: (i) Penerima Pinjaman gagal membayar satu satu kewajiban pembayaran berdasarkan Perjanjian ini; dan (ii) kondisi finansial Penerima Pinjaman memburuk dan membahayakan pelaksanaan pembayaran kembali Fasilitas Kredit kepada Para Pemberi Pinjaman.
        </p>
    <li>Data Rahasia
        <ul>
            <p>
                Penerima Pinjaman dengan ini memberikan otorisasi dan kuasa kepada Penyelenggara untuk mengumpulkan, mengolah, menganalisa dan mengungkap informasi terkait identitas Penerima Pinjaman ataupun transaksi pemberian pinjaman oleh Penerima Pinjaman, termasuk tetapi tidak terbatas kepada:
            </p>
            <ul>
                <li>Penyedia layanan tanda tangan elektronik ataupun sertifikasi elektronik (E-KYC)</li>
                <li>Pihak yang berwenang sesuai dengan ketentuan peraturan perundang-undangan</li>
                <li>Pihak ketiga yang menunjang kegiatan operasional Penyelenggara, termasuk tidak terbatas kepada bank, konsultan hukum, konsultan keuangan, konsultan pajak.</li>
            </ul>
        </ul>
    </li>
    <li>Perubahan Para Pihak
        <ul>
            <li>Pemberi Pinjaman dapat, tanpa memberikan pemberitahuan sebelumnya kepada Penerima Pinjaman, mengalihkan hak dan kewajibannya berdasarkan Perjanjian ini kepada pihak lain (“Pemberi Pinjaman Baru”).</li>
            <li>Penerima Pinjaman menyetujui dan mengakui keabsahan pengalihan yang dilakukan oleh Pemberi Pinjaman tersebut dan tidak akan mengajukan keberatan atas pengalihan yang dilakukan demikian.</li>
            <li>Pemberi Pinjaman mengakui bahwa identitas dari Para Pemberi Pinjaman adalah sebagaimana tercatat dalam daftar yang dipegang oleh Penyelenggara, sebagaimana daftar tersebut dapat diubah berdasarkan pengalihan yang dilakukan dari waktu ke waktu.</li>
            <li>Penerima Pinjaman tidak dapat mengalihkan atau mentransfer hak atau kewajibannya berdasarkan Perjanjian ini, kecuali dengan persetujuan tertulis terlebih dahulu dari Penyelenggara.</li>
        </ul>
    </li>
    <li>Korespondensi</li>
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

    <p class="underline">Kepada Penerima Pinjaman Pinjaman</p>
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
    <li>Ketidakabsahan Sebagian</li>
    <p>Jika suatu ketentuan dalam Perjanjian ini menjadi bertentangan dengan hukum, tidak sah atau tidak dapat dilaksanakan berdasarkan suatu peraturan perundang-undangan yang berlaku, maka hal tersebut tidak akan mempengaruhi legalitas, keabsahan atau keberlakukan ketentuan lain dari Perjanjian ini.</p>
    <li>Hukum Yang Mengatur</li>
    <p>Perjanjian ini diatur dan wajib ditafsirkan berdasarkan hukum dan peraturan perundang-undangan yang berlaku di Republik Indonesia.</p>
    <li>Perselisihan Sengketa</li>
    <p>Setiap gugatan, klaim atau perselisihan yang timbul dari atau sehubungan dengan Perjanjian ini akan diselesaikan melalui persidangan di Pengadilan Negeri Jakarta Pusat.</p>
    <p>Demikianlah Perjanjian ini ditandatangani secara elektronik dan akan mempunyai kekuatan hukum yang sama apabila Perjanjian ditandatangani secara langsung (tanda tangan basah).</p>
    <p>Penyelenggara selaku kuasa, untuk dan atas nama Para Pemberi Pinjaman</p>
    <p> PT Sistem Informasi Aplikasi Pembiayaan</p>
</ul>
</body>
</html>
