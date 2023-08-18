<html>

<head>
    <title>Surat Perjanjian</title>
</head>

<body>
    <?php
    include('config.php');
    $id = $_GET['id'];

    $stmt = $dbConn->prepare("SELECT *,MONTH(tgl_gadai) as bulan,DAY(tgl_gadai) as hari,Year(tgl_gadai) as tahun ,tgl_gadai+ INTERVAL `lama_gadai` month as tempo
    FROM penggadaian p, nasabah n, pengelola pn,barang b,jenis_barang j where id_surat='$id' 
    and  p.nik=n.nik
    and p.nik_pengelola=pn.nik_pengelola
    and j.id_jenis=b.id_jenis
    and p.id_barang=b.id_barang");
    $stmt->execute();
    $row = $stmt->fetch();

    $bulan = array(
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );

    ?>

    <table align="center" width="65%">
        <tr>
            <td align="center" colspan="3"><b>PERJANJIAN AKAD RAHN
                    DAN PENGAKUAN HUTANG<br>
                    Nomor :<?php echo $row['no_surat']; ?></b>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3"><i>“Jika kamu dalam perjalanan (dan bermu’amalah tidak secara tunai) sedang kamu tidak memperoleh seorang penulis, maka hendaklah ada barang tanggungan yang dipegang (oleh yang berpiutang)…”</i>
                <br>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p align="justify">Pada hari ini <?php echo $row['hari'] . " " . $bulan[$row['bulan']] . " " . $row['tahun']; ?> bertempat di Kantor KSU BMT Unit 071, Jl.RA.Kartini No.06B Sampit Kalimantan Tengah, kami yang bertandatangan dibawah ini:</p>
            </td>
        </tr>
        <tr>
            <td width="50%">1. Nama : <?php echo $row['nama']; ?>
                <p align="justify">Dalam hal yang diuraikan di bawah ini dalam kedudukannya selaku Manajer KSU BMT Unit 071, bertindak untuk dan atas nama KSU BMT 071 beralamat di jalan RA.KartiniNo.06B Sampit,Kabupaten Kotawaringin Timur. Untuk selanjutnya disebut :PIHAK PERTAMA.</p>
            </td>
            <td width="50%">2. Nama :<?php echo $row['nama_nasabah']; ?><br>
                NIK :<?php echo $row['nik']; ?><br>
                Alamat :<?php echo $row['alamat_nasabah']; ?><br>
                Pekerjaan :<?php echo $row['pekerjaan']; ?>
                <p align="justify">dalam hal yang diuraikan di bawah ini bertindak untuk dan atas nama diri sendiri. Untuk selanjutnya disebut :PIHAK KEDUA.</p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="justify">Para pihak terlebih dahulu menerangkan bahwa PIHAK KEDUA.telah berhutang kepada PIHAK PERTAMA sebagaimana diikat dan diatur dalam Surat Perjanjian Akad Rahn Dan Pengakuan Hutang ini, yang telah dibuat antara PIHAK KEDUA dengan PIHAK PERTAMA. Guna menjamin ketertiban pembayaran hutang PIHAK KEDUA kepada PIHAK PERTAMA, para pihak setuju dan sepakat membuat Perjanjian Gadai (yang selanjutnya disebut “Akad Rahn”) dengan ketentuan dan syarat-syarat sebagai berikut :</td>
        </tr>
        <tr>
            <td colspan="3">
                <table border="2" align="justify">
                    <tr>
                        <td align="justify">
                            <center>Pasal 1
                                <br>POKOK PERJANJIAN
                            </center>
                            1) PIHAK KEDUA selaku pemilik barang gadai dengan ini menggadaikan barang (selanjutnya disebut “marhun”) sebagai berikut :<br>
                            <b>Jenis Marhun :<?php echo $row['jenis_barang']; ?><br>
                                Merk :<?php echo $row['merk']; ?><br>
                                Tahun :<?php echo $row['tahun']; ?><br>
                                Warna :<?php echo $row['warna']; ?><br>
                            </b>
                            yang diserahkan PIHAK KEDUA kepada PIHAK PERTAMA, sebagaimana PIHAK PERTAMA menerima gadai tersebut dari PIHAK KEDUA.<br>
                            2) Kedua belah pihak sepakat, dan dengan ini saling mengikatkan diri satu terhadap yang lain, bahwa PIHAK PERTAMA telah menyerahkan dan PIHAK KEDUA mengakui telah menerima sejumlah uang/dana sebesar <b><?php echo "Rp." . number_format($row['harga_taksir'], 0, ".", "."); ?></b> yang disebut dengan pokok/marhun bihdan Surat Perjanjian ini berlaku pula sebagai tanda bukti terimanya atau kuitansinya. Oleh karenanya PIHAK KEDUA disebut juga sebagai yang berhutang dan PIHAK PERTAMA sebagai yang berpiutang.<br>

                            <center><br>Pasal 2<br>
                                KEPEMILIKAN MARHUN DAN JAMINAN PIHAK KEDUA<br></center>
                            PIHAK KEDUA menjamin bahwa barang gadai (marhun) sebagaimana telah disebut dan diuraikan dalam Pasal 1 Akad Rahn ini adalah benar-benar milik sah-nya dan barang marhun tersebut tidak sedang tersangkut sengketa atau perkara, bebas dari pembebanan apa pun, sehingga PIHAK KEDUA berjanji dan dengan ini mengikatkan diri untuk menjamin PIHAK PERTAMA dibebaskan dari segala bentuk tuntutan atau gugatan apa pun dan dari pihak manapun juga berkaitan dengan marhun tersebut.
                            <br>
                            <center><br>Pasal 3
                                <br>JANGKA WAKTU, BIAYA PENITIPAN, DAN PEMBAYARAN
                            </center>
                            <br>1) PIHAK KEDUA selaku pemilik sah marhun, menyetujui dan sepakat serta dengan inimengikatkan diri sanggup untuk membayar biaya penitipan dan penyimpanan atas barang titipan dari PIHAK KEDUA ditempat PIHAK PERTAMA (KSU BMT 071)sebagaimana tertera pada Pasal 1.

                            <center><br><br>Pasal 4
                                <br>PENGGUNAAN MARHUN SEBAGAI PELUNAS HUTANG
                            </center>
                            <br>1) PIHAK KEDUA selaku pemilik sah marhun, berjanji dan dengan ini mengikatkan diriuntuk merelakan serta menyerahkan marhun sebagaimana telah disebut dan diuraikandalam Pasal 1 Akad Rahn ini kepada PIHAK PERTAMA dan memberikan kuasa penuh yang tidak dapat ditarik kembali dariPIHAK PERTAMAuntuk menjual marhun dimaksud, dan untuk selanjutnya dana hasil penjualan marhun digunakan untuk membayar angsuran dan atau melunasi hutang PIHAK KEDUA kepada PIHAK PERTAMA yang dijamin dengan Surat Perjanjian Akad Rahn Dan Pengakuan Hutang ini.
                            <br>2) Apabila PIHAK KEDUA melakukan penunggakan pembayaran hutangnya kepada Pihak Pertama yang diikat dan dijamin dengan Surat Perjanjian ini selama 2 (dua) bulan berturut- turut ataupun tidak melakukan pembayaran setelah 1 bulan sejak jatuh tempo tanpa konfirmasimaka akan di anggap melarikan diri atau wanprestasi dan akan diberikan Surat Pemberitahuan secara digital ke nomor PIHAK KEDUA yang telah di berikan ke PIHAK PERTAMA
                            yang kemudian akan dilanjutkan dengan penjualan marhun sebagaimana tertera pada pasal 4 ayat 1 diatas.
                            <br>3) Apabila hasil penjualan marhun, ternyata tidak mencukupi untuk melunasi hutang PIHAK KEDUA kepada PIHAK PERTAMA yang diikat dan dijamin dengan Surat Perjanjian Akad Rahn Dan Pengakuan Hutang ini, maka PIHAK KEDUA berjanji dan dengan ini mengikatkan diri sanggup melunasi hutangnya tersebut dengan cara membayar kekurangannya dan atau menyerahkan barang berharga milik Pihak Kedua lainnya sebagai pelunasannya.
                            <br>4) Dan apabila hasil penjualan marhun, ternyata setelah digunakan untuk melunasi hutang PIHAK KEDUA kepada PIHAK PERTAMA, ada kelebihan dana, maka PIHAK PERTAMA berjanji dan dengan ini mengikatkan diri untuk menyerahkan kelebihan dana tersebut ke rekening tabungan PIHAK KEDUA yang ada di BMT 071 Sampit.

                        </td>
                        <td align="justify">
                            <center><br><br>Pasal 5
                                <br>PENYELESAIAN PERSELISIHAN
                            </center>
                            <br>1)Dalam hal terjadi perbedaan pendapat atau penafsiran atas hal-hal yang tercantum dalam Akad Rahn ini atau terjadi perselisihan atau sengketa dalam pelaksanaannya, maka para pihak sepakat untuk menyelesaikannya secara musyawarah untuk mufakat.
                            <br>
                            2) Jangka waktu dan biaya penitipan adalah sebagai berikut :
                            <b><br>- Jangka Waktu :<?php echo $row['lama_gadai']; ?> Bulan
                                <br>- Tanggal Jatuh Tempo :<?php $row['tempo'];
                                                            $date = $row['tempo'];
                                                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                                                            echo $datetime->format('d/m/Y'); ?>
                                <br>- Biaya Penitipan :<?php echo "Rp." . number_format($row['harga_sewa'], 0, ".", "."); ?>
                                <br>- Total Biaya :<?php echo "Rp." . number_format($row['harga_sewa'] + $row['harga_taksir'], 0, ".", "."); ?>
                            </b>
                            <br>3)PIHAK PERTAMA dan PIHAK KEDUA sepakat bahwa tempo hutang ini berlangsung untuk jangka waktu,<?php echo $row['lama_gadai']; ?> Bulan, terhitung sejak tanggal Perjanjian ini ditandatangani kedua belah pihak dan berakhir pada tanggal,<?php $row['tempo'];
                                                                                                                                                                                                                                                                            $date = $row['tempo'];
                                                                                                                                                                                                                                                                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                                                                                                                                                                                                                                                                            echo $datetime->format('d/m/Y'); ?> . Apabila terlewat dari jatuh tempo maka PIHAK KEDUA akan dikenakan tarif ijarah tambahan oleh PIHAK PERTAMA.

                            <br>4)PIHAK KEDUA berjanji dan dengan ini mengikatkan diri untuk mengembalikan kepada PIHAK PERTAMA, seluruh jumlah hutangnya kepada PIHAK PERTAMA menurut jadwal pembayaran sebagaimana yang telah disepakati kedua belah pihak.

                            <br>5)Pembayaran dilakukan dengan cara datang langsung atau ditransfer ke Rekening milik KSU BMT 071 yang telah di konfirmasi chat melalui Kontak Gadai yang telah tertera.

                            <br>6)Untuk pengajuan dan pelunasan gadai PIHAK KEDUAdiwajibkan datang langsung/tatap muka dengan PIHAK PERTAMAdan tidak boleh di wakilkan tanpa adanya persetujuan kedua belah pihak.

                            <br>7)ApabilaPIHAK KEDUA belum bisa untuk melakukan pelunasan, maka PIHAK KEDUA dapat mengajukan perpanjangan jangka waktu gadai 2 harisebelum tanggal jatuh tempo.Apabila tidak ada konfirmasi atau perpanjangan maka akan dilanjutkan ke proses selanjutnya.

                            <br>8)Untukperpanjangan gadai PIHAK KEDUA diwajibkan untuk mengurangi pokok/marhun bih,membayarkan total margin dan administrasi yang telah di tentukan pengelola per hari itu sesuai kebijakan yang berlaku.
                            <br>2)Apabila musyawarah untuk mufakat telah diupayakan namun perbedaan pendapat atau penafsiran, perselisihan atau sengketa tidak dapat diselesaikan oleh kedua belah pihak, maka para pihak bersepakat, dan dengan ini berjanji serta mengikatkan diri untuk menyelesaikannya melalui Pengadilan Agama Sampit.
                            <br>3)Para pihak sepakat, dan dengan ini mengikatkan diri satu terhadap yang lain, bahwa Putusan yang ditetapkan oleh Pengadilan Agama Sampit tersebut bersifat final dan mengikat (final and binding).

                            <br><br>
                            <center>Pasal 6
                                <br>PENUTUP
                            </center>
                            <br>1)Sebelum Surat Perjanjian Akad Rahn dan Pengakuan Hutang ini ditandatangani oleh PIHAK KEDUA, PIHAK KEDUA mengakui dengan sebenarnya, bahwa PIHAK KEDUA telah membaca dengan cermat atau dibacakan kepadanya seluruh pokok isi perjanjian ini berikut semua surat dan/atau dokumen yang menjadi lampirannya, sehingga oleh karena itu PIHAK KEDUA memahami sepenuhnya segala yang akan menjadi akibat hukum setelah PIHAK KEDUA menandatangani Surat Perjanjian ini.
                            <br>2)Hal-hal yang berkaitan dengan pengurusan, perawatan dan apapun yang berkenaan dengan marhun (barang gadai)serta biaya yang berkenaan dengan upaya PIHAK PERTAMA untuk mengusahakan, menyediakan dan segala upaya untuk menyerahkan sejumlah Dana atau uang yang dibutuhkan PIHAK KEDUAsecara tunai ataupun non tunai, kedua belah pihak sepakat untuk mengaturnya bersama secara musyawarah untuk mufakat baik secara lisan maupun tertulis.
                            <br>3) PIHAK PERTAMA dan PIHAK KEDUA sepakat dan dengan ini mengikatkan diri satu terhadap yang lain, bahwa untuk Surat Perjanjian Akad Rahn Dan Pengakuan Hutang ini dan segala akibatnya memberlakukan syariah Islam dan peraturan perundang- undangan lain yang tidak bertentangan dengan syariah.
                            <br><br><br>

                            <center>Kontak Gadai :0878 1920 1103</center>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">Demikianlah, Akad Rahn dan Pengakuan Hutang ini dibuat dan ditandatangani oleh PIHAK PERTAMA dan PIHAK KEDUA di atas kertas yang bermeterai cukup.</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td align="center"><b>PIHAK PERTAMA<br><br><br><br><?php echo $row['nama']; ?></b></td>
            <td align="center"><b>PIHAK Kedua<br><br><br><br><?php echo $row['nama_nasabah']; ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="center">Saksi-Saksi:</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td>(..............)</td>
            <td>(..............)</td>
            <td>(.............)</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3" align="center"><b>SURAT KUASA MENJUAL</b></td>
        </tr>
        <tr>
            <td colspan="3">Pada hari ini pada Jumat, 23 Juni 2023bertempatdi Kantor KSU BMT 071 Sampit,yangbertandatangan di bawah ini :</td>
        </tr>
        <tr>
            <td colspan="3" align="justify">Nama :<?php echo $row['nama_nasabah']; ?><br>
                NIK :<?php echo $row['nik']; ?><br>
                Alamat :<?php echo $row['alamat_nasabah']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="justify">Dengan ini memberi kuasa penuh dengan hak subtitusi (melimpahkan) kepada :</td>
        </tr>
        <tr>
            <td colspan="3" align="justify">Nama :<?php echo $row['nama']; ?><br>
                NIK :<?php echo $row['nik_pengelola']; ?><br>
                Alamat :<?php echo $row['alamat']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">-----------------------------------------------------------------------------KHUSUS--------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="3" align="justify">untuk dan atas nama pemberi kuasa menjual kepada siapapun juga dengan harga, syarat-syarat, ketentuan- ketentuan dan cara- cara yang dianggap baik oleh yang diberi kuasa, yang tidak memerlukan persetujuan lagi dari pemberi kuasa baik tertulis maupun tidak tertulis, atas barang sebagai berikut :</td>
        </tr>
        <tr>
            <td colspan="3">- Barang Berupa :<?php echo $row['nama_barang']; ?><br>
                - Merk :<?php echo $row['merk']; ?><br>
                - Tahun :<?php echo $row['tahun']; ?><br>
                - Warna :<?php echo $row['warna']; ?>
                <br>

            </td>
        </tr>
        <tr>
            <td colspan="3" align="justify">
                <p>Untuk keperluan tersebut penerima kuasa diberi hak dan wewenang untuk memberikan keterangan, membuat dan menandatangani segala akta dan surat yang diperlukan, menyerahkan barang jaminan yang dijual kepada pembeli, mengambil segala keputusan dan tindakan yang diperlukan untuk dapat melaksanakan urusan yang disebut di atas tanpa ada suatu tindakanpun yang dikecualikan.
                </p>
                <p>Adapun dana/uang hasil dari penjualan tersebut digunakan oleh penerima kuasa untuk mengangsur dan atau melunasi pembiayaanatauhutangatas nama,kiujhikjdi KSU BMT 071 Sampit.
                </P>
                <p>Demikian surat kuasa ini dibuat dengan sebenar-benarnya, atas dasar itikad baik, secara sadar serta suka sama suka, tanpa ada unsur paksaan ataupun tekanan dari siapun dan dari manapun juga.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td align="center">Penerima Kuasa,</td>
            <td align="center">Yang Memberi Kuasa,</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td>Materai</td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td align="center"><u><b><?php echo $row['nama']; ?></b></u></td>
            <td align="center"><u><b><?php echo $row['nama_nasabah']; ?></b></u></td>
        </tr>
        <tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <td colspan="3" align="center">Saksi-Saksi:</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp</td>
        </tr>
        <tr>
            <td>(..............)</td>
            <td>(..............)</td>
            <td>(.............)</td>
        </tr>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>