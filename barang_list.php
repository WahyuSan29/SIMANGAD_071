<?php include 'check_login.php'; ?>

<body>

	<!-- Navigasi Panel -->
	<?php

	?>


	<h2 align="center">DAFTAR BARANG YANG PERNAH DIGADAIKAN</h2>
	<?php
	$nik = $_GET['barang'];
	$result = $dbConn->prepare("SELECT b.*, j.jenis_barang, n.nama_nasabah 
                           FROM barang b 
                           INNER JOIN jenis_barang j ON b.id_jenis = j.id_jenis 
                           INNER JOIN nasabah n ON n.nik = :nik 
                           WHERE b.nik = :nik");
	$result->execute(array(':nik' => $nik));
	$row = $result->fetch(PDO::FETCH_ASSOC);
	if ($row) {
		echo '<h2 align="center">' . $row['nama_nasabah'] . '</h2>';
	}
	?>

	<div style="overflow-x:auto;">
		<table align="center" border="1" class="table table-bordered mt-3" style="border-collapse:collapse">
			<tr align="center">
				<th>No</th>
				<th>Pilihan</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Tahun</th>
				<th>Warna</th>
				<th>Jenis Barang</th>
			</tr>
			<?php
			$no = 1; // Variabel untuk menyimpan nomor urut
			while ($row) {
			?>
				<tr align="center">
					<td><?php echo $no; ?></td>
					<td align="center" width="200px">
						<a href="index.php?kalku=<?php echo $row['id_barang'] ?>">
							Gadaikan Lagi
						</a>
					</td>
					<td><?php echo $row['nama_barang']; ?></td>
					<td align="center"><?php echo $row['merk']; ?></td>
					<td align="center"><?php echo $row['tahun']; ?></td>
					<td><?php echo $row['warna']; ?></td>
					<td><?php echo $row['jenis_barang']; ?></td>
				</tr>
			<?php
				$no++; // Tambahkan nomor urut setiap kali perulangan
				$row = $result->fetch(PDO::FETCH_ASSOC); // Mendapatkan baris data selanjutnya
			}
			?>
		</table>
	</div>
</body>