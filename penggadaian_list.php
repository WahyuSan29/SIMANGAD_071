<?php include 'check_login.php'; ?>

<script type="text/javascript">
	function getConfirmation() {
		var retVal = confirm("Anda yakin dengan data yang akan Anda hapus?");
		if (retVal == true) {
			return true;
		} else {
			return false;
		}
	}
</script>


</head>

<body>

	<!-- Navigasi Panel -->
	<?php

	?>


	<h2 align="center">DAFTAR PENGGADAIAN</h2>
	<p align="center"><a href="index.php?page=pegadaian" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>

	<form action="index.php?page=gadai" method="post">
		<div style="overflow-x:auto;">
			<table>
				<tr>
					<td>Pencarian</td>
					<td><input type="text" name="cari" /></td>
					<td><button name="filter" type="submit" value=filter>Cari</button></td>
				</tr>
			</table>
	</form>
	<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
		<tr align="center">
			<th>Pilihan</th>
			<th>Status</th>
			<th>No Surat</th>
			<th>NIK</th>
			<th>Nama Nasabah</th>
			<th>Barang Yang Di Gadaikan</th>
			<th>Harga Taksir</th>
			<th>Tanggal Gadai</th>
			<th>Kode Loker</th>
			<th>Foto Transaksi</th>
			<th>Scan Akad</th>
		</tr>
		<?php
		include("config.php");
		if (isset($_POST['filter'])) {
			$cari = $_POST['cari'];
			$result = $dbConn->query("SELECT *
				FROM penggadaian p, nasabah n, pengelola pn, barang b, jenis_barang j, loker l 
				WHERE p.nik = n.nik
				AND p.nik_pengelola = pn.nik_pengelola
				AND j.id_jenis = b.id_jenis
				AND p.id_barang = b.id_barang
				AND p.id_loker = l.id_loker
				AND n.nama_nasabah LIKE '%$cari%'
				ORDER BY p.id_surat ASC"); // Mengurutkan secara ascending berdasarkan id_surat
		} else {
			$result = $dbConn->query("SELECT *
				FROM penggadaian p, nasabah n, pengelola pn, barang b, jenis_barang j, loker l 
				WHERE p.nik = n.nik
				AND p.nik_pengelola = pn.nik_pengelola
				AND j.id_jenis = b.id_jenis
				AND p.id_barang = b.id_barang
				AND p.id_loker = l.id_loker
				ORDER BY p.id_surat DESC"); // Mengurutkan secara ascending berdasarkan id_surat
		}

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		?>
			<tr align="center">
				<td align="center" width="100px">
					<a href="index.php?updatestatusgadai=<?php echo $row['id_surat'] ?>">
						<i class="fas fa-fw fa-edit mr-0"></i><br>
					</a>
					<hr>
					<!-- <a href="cetak_surat_perjanjian.php?id=<?php echo $row['id_surat'] ?>" target="_BLANK"> -->
					<a href="cetakku.php?id=<?php echo $row['id_surat'] ?>" target="_blank">
						<i class="fas fa-sharp fa-solid fa-print ml-0"></i>
					</a>

				</td>
				<td style="color: <?php echo $row['keterangan'] === 'Lunas' ? 'green' : 'red'; ?>">
					<?php echo $row['keterangan']; ?>
				</td>
				<td>
					<?php echo $row['no_surat']; ?>
				</td>
				<td>
					<a href="index.php?barang=<?php echo $row['nik'] ?>"><?php echo $row['nik']; ?></a>
				</td>
				<td>
					<?php echo $row['nama_nasabah']; ?>
				</td>
				<td>
					<?php echo $row['nama_barang']; ?>
				</td>
				<td>
					<?php echo "Rp." . number_format($row['harga_taksir'], 0, ".", "."); ?>
				</td>
				<td>
					<?php $row['tgl_gadai'];
					$date = $row['tgl_gadai'];
					$datetime = DateTime::createFromFormat('Y-m-d', $date);
					echo $datetime->format('d/m/Y'); ?>
				</td>
				<td>
					<?php echo $row['kd_loker']; ?>
				</td>
				<td>
					<?php
					if ($row['trx_gambar'] <> '') {
						echo '<img src="./img/foto_transaksi/' . $row['trx_gambar'] . '" width="100px">';
					} ?>
				</td>
				<td>
					<?php
					if ($row['trx_akad'] != '') {
						echo '<a href="./img/akad/' . $row['trx_akad'] . '" target="_blank">' . $row['trx_akad'] . '</a>';
					}
					?>
				</td>

			</tr>
		<?php
		}
		?>

	</table>
	</div>
</body>