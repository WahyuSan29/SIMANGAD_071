<?php include 'check_login.php'; ?>

<script type="text/javascript">
	function getConfirmation() {
		var retVal = confirm("Anda yakin dengan data yang anda hapus?");
		if (retVal == true) {
			return true;
		} else {
			return false;
		}
	}
</script>



<!-- Navigasi Panel -->
<?php

?>


<h2 align="center">Daftar Besar Pinjaman</h2>

<div style="margin-bottom: -90px;">
	<p align="center"><a href="index.php?page=besartambah" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>
</div>

<table width="900px" align="center" class="table table-bordered">
	<tr align="center">
		<th>Pilihan</th>
		<th>Golongan</th>
		<th>Marhun Bih</th>
		<th>Maximal</th>
		<th>Tarif Ujroh</th>
	</tr>
	<?php
	$result = $dbConn->query("SELECT * FROM besar_pinjaman ");
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<br>
			<td align="center" width="100px">
				<a href="index.php?updatetarif=<?php echo $row['id_bsr_pinjaman'] ?>">
					<i class="fas fa-fw fa-edit mr-2"></i>
				</a>|
				<a href="besar_pinjam_hapus.php?id=<?php echo $row['id_bsr_pinjaman'] ?>" onclick="return confirm('Anda yakin dengan data yang anda hapus?')">
					<i class="fas fa-fw fa-trash ml-2"></i>
				</a>
			</td>
			<td>
				<?php echo $row['golongan']; ?>
			</td>

			<td>
				Rp. <?php echo number_format($row['minimal'], 0, ',', '.'); ?>
			</td>
			<td>
				Rp. <?php echo number_format($row['maksimal'], 0, ',', '.'); ?>
			</td>
			<td>
				<?php echo $row['tarif_ujroh']; ?>%
			</td>

		</tr>
	<?php
	}
	?>
</table>