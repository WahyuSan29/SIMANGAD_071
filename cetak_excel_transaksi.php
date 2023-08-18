<?php
include("config.php");
$jenis = $_GET['jenis'];
$tgl_awal = $_GET['awal'];
$tgl_akhir = $_GET['akhir'];

?>

<h2 align="center">Data Transaksi</h2>
<table border='1'>
	<tr>
		<th>No.</th>
		<th>Tanggal Gadai</th>
		<th>Nama Nasabah</th>
		<th>NIK</th>
		<th>Nama Barang</th>
		<th>Dana Diberikan</th>
		<th>Keterangan</th>
	</tr>
	<?php
	$i = 1; // Inisialisasi variabel $i
	$result = $dbConn->query("SELECT * FROM penggadaian p 
		LEFT JOIN nasabah n ON p.nik=n.nik 
		LEFT JOIN barang b ON p.id_barang=b.id_barang 
		LEFT JOIN jenis_barang j ON j.id_jenis=b.id_jenis
		WHERE p.tgl_gadai >= '$tgl_awal' AND p.tgl_gadai <= '$tgl_akhir'");
	$no = 1;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr>
			<td align="center"><?php echo $i; ?></td>

			<td align="center">
				<?php $row['tgl_gadai'];
				$date = $row['tgl_gadai'];
				$datetime = DateTime::createFromFormat('Y-m-d', $date);
				echo $datetime->format('d/m/Y'); ?>
			</td>
			<td align="center">
				<?php echo $row['nama_nasabah']; ?>
			</td>
			<td align="center">
				<?php echo $row['nik']; ?>
			</td>
			<td align="center">
				<?php echo $row['nama_barang']; ?>
			</td>
			<td align="center">
				<?php echo $row['harga_taksir']; ?>
			</td>
			<td align="center">
				<?php echo $row['keterangan']; ?>
			</td>
		</tr>
	<?php
	}
	?>

</table>
<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_transaksi.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

?>