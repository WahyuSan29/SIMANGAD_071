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

<h2 align="center">DAFTAR PENGELOLA</h2>
<p align="center"><a href="index.php?page=fpengelola" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>


<table width="900px" align="center" border="1" class="table table-bordered" style="border-collapse:collapse">
	<tr align="center">
		<th>Pilihan</th>
		<th>NIK Pengelola</th>
		<th>Nama Pengelola</th>
		<th>Alamat Pengelola</th>
	</tr>
	<?php
	$result = $dbConn->query("SELECT * FROM pengelola");

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<td align="center" width="150px">
				<a href="index.php?updatepengelola=<?php echo $row['nik_pengelola'] ?>">
					<i class="fas fa-fw fa-edit mr-2"></i>
				</a>|
				<a href="pengelola_hapus.php?id=<?php echo $row['nik_pengelola'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
					<i class="fas fa-fw fa-trash ml-2"></i>
				</a>
			</td>
			<td>
				<?php echo $row['nik_pengelola']; ?>
			</td>
			<td>
				<?php echo $row['nama']; ?>
			</td>
			<td align="center">
				<?php echo $row['alamat']; ?>
			</td>

		</tr>
	<?php
	}
	?>

</table>