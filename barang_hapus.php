
<?php
include("config.php");

$id = $_GET['id'];
$sql = "DELETE FROM jenis_barang WHERE id_jenis=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

// Cek jika proses Berhasil
if ($query) {
	echo "
		<script language='javascript'>alert('Data Berhasil di hapus!');
			document.location='index.php?page=jenis';
		</script>";
} else {
	echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
}
// Tutup Koneksi
$dbConn = null;

?>