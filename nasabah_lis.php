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


	<h2 align="center">DAFTAR NASABAH</h2>
	<p align="center"><a href="index.php?page=fnasabah" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>

	<form action="index.php?page=nasabah" method="post">
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
			<th>No</th>
			<th>Pilihan</th>
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
		include("config.php");
		if (isset($_POST['filter'])) {
			$cari = $_POST['cari'];
			$result = $dbConn->query("SELECT * FROM nasabah WHERE nik LIKE '%$cari%' OR nama_nasabah LIKE '%$cari%'");
		} else {
			$result = $dbConn->query("SELECT * FROM nasabah");
		}
		$i = 1; // Inisialisasi variabel $i
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		?>
			<tr align="center">
				<td align="center" width="20px"><?php echo $i; ?></td>
				<td align="center">
					<a href="index.php?updatenasabah=<?php echo $row['nik']; ?>">
						<i class="fas fa-fw fa-edit mr-1"></i>
					</a>
				</td>
				<td>
					<a href="index.php?barang=<?php echo $row['nik']; ?>"><?php echo $row['nik']; ?></a>
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
				<td>
					<?php
					if ($row['ktp'] <> '') {
						echo '<a href="./img/ktp/' . $row['ktp'] . '" data-lightbox="image"><img src="./img/ktp/' . $row['ktp'] . '" width="100px"></a>';
					}
					?>
				</td>

			</tr>
		<?php
			$i++; // Menambah nilai variabel $i
		}
		?>
	</table>

	</div>