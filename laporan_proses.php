<!DOCTYPE html>
<html>

<head>
	<title>Laporan</title>
</head>

<body>

	<!-- Navigasi Panel -->
	<?php
	include("config.php");
	$jenis = $_POST['jenis'];
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];

	if ($_POST['jenis'] == '1') {
		$jenis = 'Laporan Data Nasabah';
	} elseif ($_POST['jenis'] == '2') {
		$jenis = 'Laporan Data Transaksi Gadai';
	}
	?>

	<?php
	if ($_POST['jenis'] == '1') { ?>

		<h2 align="center"><?= $jenis; ?></h2>
		<!-- <h5 align="center">Periode : <?= $tgl_awal . ' - ' . $tgl_akhir; ?></h5> -->

		<button onclick="cetakData('<?= $_POST['jenis']; ?>', '<?= $_POST['tgl_awal']; ?>', '<?= $_POST['tgl_akhir']; ?>')" class="btn btn-warning btn-sm">Cetak</button>
		<a href="cetak_excel_nasabah.php?jenis=<?= $_POST['jenis']; ?>&awal=<?= $_POST['tgl_awal']; ?>&akhir=<?= $_POST['tgl_akhir']; ?>" class="btn btn-info btn-sm">Eksport Excel</a>
		<br>
		<br>
		<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
			<tr align="center">
				<th>No.</th>
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
				<th>Foto KTP</th>
			</tr>
			<?php
			$i = 1; // Inisialisasi variabel $i
			$result = $dbConn->query("SELECT * FROM nasabah WHERE tgl_register >= '$tgl_awal' AND tgl_register <= '$tgl_akhir'");


			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			?>
				<tr align="center">
					<td><?php echo $i++; ?></td>
					<td>
						<?php echo $row['nik']; ?>
					</td>
					<td>
						<?php echo $row['nama_nasabah']; ?>
					</td>
					<td align="center">
						<?php echo $row['alamat_nasabah']; ?>
					</td>
					<td align="center">
						<?php $row['tgl_lahir'];
						$date = $row['tgl_lahir'];
						$datetime = DateTime::createFromFormat('Y-m-d', $date);
						echo $datetime->format('d/m/Y'); ?>
					</td>
					<td>
						<?php echo $row['jk']; ?>
					</td>
					<td>
						<?php echo $row['pekerjaan']; ?>
					</td>
					<td>
						<?php echo $row['no_hp']; ?>
					</td>
					<td>
						<?php echo $row['nama_keluarga']; ?>
					</td>
					<td>
						<?php echo $row['alamat_keluarga']; ?>
					</td>
					<td>
						<?php echo $row['no_hp_keluarga']; ?>
					</td>
					<td align="center">
						<?php $row['tgl_register'];
						$date = $row['tgl_register'];
						$datetime = DateTime::createFromFormat('Y-m-d', $date);
						echo $datetime->format('d/m/Y'); ?>
					</td>
					<td>
						<?php
						if ($row['ktp'] <> '') {
							echo '<img src="./img/ktp/' . $row['ktp'] . '" width="100px">';
						} ?>
					</td>
				</tr>
			<?php
			}
			?>
		</table>

	<?php
	} elseif ($_POST['jenis'] == '2') { ?>

		<h2 align="center"><?= $jenis; ?></h2>
		<!-- <h5 align="center">Periode : <?= $tgl_awal . '  -  ' . $tgl_akhir; ?></h5> -->

		<button onclick="cetakDataPenggadaian('<?= $_POST['jenis']; ?>', '<?= $_POST['tgl_awal']; ?>', '<?= $_POST['tgl_akhir']; ?>')" class="btn btn-warning btn-sm">Cetak</button>
		<a href="cetak_excel_transaksi.php?jenis=<?= $_POST['jenis']; ?>&awal=<?= $_POST['tgl_awal']; ?>&akhir=<?= $_POST['tgl_akhir']; ?>" class="btn btn-info btn-sm">Eksport Excel</a>
		<br>
		<br>
		<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
			<tr align="center">
				<th>No.</th>
				<th>Tanggal Gadai</th>
				<th>Nama Nasabah</th>
				<th>NIK</th>
				<th>Nama Barang</th>
				<th>Dana Diberikan</th>
				<th>Status</th>
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
				<tr align="center">
					<td><?php echo $i; ?></td>
					<td>
						<?php $row['tgl_gadai'];
						$date = $row['tgl_gadai'];
						$datetime = DateTime::createFromFormat('Y-m-d', $date);
						echo $datetime->format('d/m/Y'); ?>
					</td>
					<td>
						<?php echo $row['nama_nasabah']; ?>
					</td>
					<td align="center">
						<?php echo $row['nik']; ?>
					</td>
					<td>
						<?php echo $row['nama_barang']; ?>
					</td>
					<td>
						<?php echo "Rp." . number_format($row['harga_taksir'], 0, ".", "."); ?>
					</td>
					<td>
						<?php echo $row['keterangan']; ?>
					</td>
				</tr>
			<?php
				$i++; // Increment variabel $i
			}
			?>
		</table>

	<?php } ?>


	<script>
		function cetakData(jenis, awal, akhir) {
			// Membuka jendela baru untuk mencetak
			var windowPrint = window.open('cetak_print_nasabah.php?jenis=' + jenis + '&awal=' + awal + '&akhir=' + akhir, '_blank');

			// Menunggu jendela baru selesai memuat
			windowPrint.onload = function() {
				// Mencetak jendela baru
				windowPrint.print();

				// // Menutup jendela baru setelah mencetak
				// windowPrint.close();
			}
		}

		function cetakDataPenggadaian(jenis, awal, akhir) {
			// Membuka jendela baru untuk mencetak
			var windowPrint = window.open('cetak_print_transaksi.php?jenis=' + jenis + '&awal=' + awal + '&akhir=' + akhir, '_blank');

			// Menunggu jendela baru selesai memuat
			windowPrint.onload = function() {
				// Mencetak jendela baru
				windowPrint.print();

				// // Menutup jendela baru setelah mencetak
				// windowPrint.close();
			}
		}
	</script>
</body>

</html>