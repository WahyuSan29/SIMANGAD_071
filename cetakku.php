<?php

require_once 'vendor/autoload.php';

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





$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('file_template/template.docx');
// $phpWord = new \PhpOffice\PhpWord\PhpWord();

$templateProcessor->setValues([
    'no_surat'          => $row['no_surat'],
    'hari'              => $row['hari'],
    'bulan'             => $bulan[$row['bulan']],
    'tahun'             => $row['tahun'],
    'nama'              => $row['nama'],
    'nama_nasabah'      => $row['nama_nasabah'],
    'nik'               => $row['nik'],
    'alamat_nasabah'    => $row['alamat_nasabah'],
    'pekerjaan'         => $row['pekerjaan'],
    'jenis_barang'      => $row['jenis_barang'],
    'merk'              => $row['merk'],
    'tahun'             => $row['tahun'],
    'warna'             => $row['warna'],
    'lama_gadai'        => $row['lama_gadai'],
    'tempo'             => tanggal($row['tempo']),
    'harga_sewa'        => rupiah($row['harga_sewa']),
    'harga_taksir'      => rupiah($row['harga_taksir']),
    'total_harga'       => rupiah($row['harga_taksir'] + $row['harga_sewa']),
    'terbilang_sewa'        => terbilang($row['harga_sewa']),
    'terbilang_taksir'      => terbilang($row['harga_taksir']),
    'terbilang_total'       => terbilang($row['harga_taksir'] + $row['harga_sewa']),
    'nik_pengelola'     => $row['nik_pengelola'],
    'alamat'            => $row['alamat']
]);

header("Content-Disposition: attachment; filename=AKAD.docx");

$templateProcessor->saveAs('php://output');


function terbilang($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu ", "dua ", "tiga ", "empat ", "lima ", "enam ", "tujuh ", "delapan ", "sembilan ", "sepuluh ", "sebelas ");
    $temp = "";
    if ($nilai < 12) {
        $temp = "" . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = terbilang($nilai - 10) . "belas ";
    } else if ($nilai < 100) {
        $temp = terbilang($nilai / 10) . "puluh " . terbilang($nilai % 10);
    } else if ($nilai < 200) {
        $temp = "seratus " . terbilang($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = terbilang($nilai / 100) . "ratus " . terbilang($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = "seribu" . terbilang($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = terbilang($nilai / 1000) . "ribu " . terbilang($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = terbilang($nilai / 1000000) . "juta " . terbilang($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = terbilang($nilai / 1000000000) . "milyar" . terbilang(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = terbilang($nilai / 1000000000000) . "trilyun" . terbilang(fmod($nilai, 1000000000000));
    }
    return $temp;
}


function tanggal($tgl)
{
    return substr($tgl, 8, 2) . '-' . substr($tgl, 5, 2) . '-' . substr($tgl, 0, 4);
}

function rupiah($nilai, $pecahan = 0)
{
    return number_format($nilai, $pecahan, ',', '.');
}
