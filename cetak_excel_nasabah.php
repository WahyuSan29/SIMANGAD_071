<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_nasabah.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

?>

<h2 align="center">Data Nasabah</h2>
<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
	<tr align="center">
		<th>No</th>
		<th>NIK</th>
		<th>Nama Nasabah</th>
		<th>Alamat Nasabah</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Pekerjaan</th>
		<th>No HP</th>
		<th>Nama Keluarga</th>
		<th>Alamat Keluarga</th>
		<th>No HP Keluarga</th>
		<th>Tanggal Register</th>

	</tr>
	<?php
	include("config.php");
	$tgl_awal = $_GET['awal'];
	$tgl_akhir = $_GET['akhir'];
	$i = 1; // Inisialisasi variabel $i
	$result = $dbConn->query("SELECT * FROM nasabah WHERE tgl_register >= '$tgl_awal' AND tgl_register <= '$tgl_akhir'");

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<td align="center" width="20px"><?php echo $i; ?></td>
			<td>
				<?php echo $row['nik']; ?>
			</td>
			<td><?php echo $row['nama_nasabah']; ?></td>
			<td align="center"><?php echo $row['alamat_nasabah']; ?></td>
			<td align="center">
				<?php
				$date = $row['tgl_lahir'];
				$datetime = DateTime::createFromFormat('Y-m-d', $date);
				echo $datetime->format('d/m/Y');
				?>
			</td>
			<td><?php echo $row['jk']; ?></td>
			<td><?php echo $row['pekerjaan']; ?></td>
			<td><?php echo $row['no_hp']; ?></td>
			<td><?php echo $row['nama_keluarga']; ?></td>
			<td><?php echo $row['alamat_keluarga']; ?></td>
			<td><?php echo $row['no_hp_keluarga']; ?></td>
			<td align="center">
				<?php
				$date = $row['tgl_register'];
				$datetime = DateTime::createFromFormat('Y-m-d', $date);
				echo $datetime->format('d/m/Y');
				?>
			</td>
		</tr>
	<?php
		$i++; // Menambah nilai variabel $i
	}
	?>
</table>