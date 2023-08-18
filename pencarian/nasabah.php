<?php
session_start();
$term = $_GET['term'];

$query = "SELECT * from nasabah where nik like '%$term%'  or nama_nasabah like '%$term%'  ";
include('../koneksi.php');
$result = mysqli_query($conn, $query);
$row1 = mysqli_num_rows($result);
$json = array();
if ($row1 >= 1) {
    while ($rs = mysqli_fetch_array($result)) {
        $json[] = array(
            'label' => $rs['nik'] . '-' . $rs['nama_nasabah'],
            'value' => $rs['nik'],
            'nama' => $rs['nama_nasabah']
        );
    }
} else {
    while ($rs = mysqli_fetch_array($result)) {
        $json[] = array(
            'label' => 'Tidak ada data',
            'value' => $rs['nik'],

        );
    }
}
echo json_encode($json);
