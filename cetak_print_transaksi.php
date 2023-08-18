<!DOCTYPE html>
<html>

<head>
	<link rel="icon" type="image/png" href="Gambar/logo2.png">
	<title>Laporan Data Transaksi</title>
</head>

<body>
	<h2 align="center">Data Transaksi</h2>
	<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
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
		include("config.php");
		$jenis = $_GET['jenis'];
		$tgl_awal = $_GET['awal'];
		$tgl_akhir = $_GET['akhir'];
		$i = 1; // Inisialisasi variabel $i

		$result = $dbConn->query("SELECT * FROM penggadaian p 
	LEFT JOIN nasabah n ON p.nik=n.nik 
	LEFT JOIN barang b ON p.id_barang=b.id_barang 
	LEFT JOIN jenis_barang j ON j.id_jenis=b.id_jenis
	WHERE p.tgl_gadai >= '$tgl_awal' AND p.tgl_gadai <= '$tgl_akhir'");

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		?>
			<tr align="center">
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
				<td>
					<?php echo "Rp." . number_format($row['harga_taksir'], 0, ".", "."); ?>
				</td>
				<td align="center">
					<?php echo $row['keterangan']; ?>
				</td>
			</tr>
		<?php
			$i++; // Increment variabel $i
		}
		?>
	</table>
</body>

</html>