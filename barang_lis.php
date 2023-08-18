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

<h2 align="center">DAFTAR JENIS BARANG</h2>

<p align="center"><a href="index.php?page=fbarang" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>
<table width="900px" border="1" align="center" class="table table-bordered">
	<tr align="center">
		<th>Pilihan</th>
		<th>Jenis Barang</th>
		<th>Persen Taksiran</th>
	</tr>
	<?php
	if (isset($_POST['filter'])) {
		$cari = $_POST['cari'];
		$result = $dbConn->query("select * from jenis_barang where id_jenis like '%$cari%' or jenis_barang like '%$cari%' ");
	} else {
		$result = $dbConn->query("SELECT * FROM jenis_barang order by persen_taksiran desc");
	}
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<br>
			<td align="center" width="200px">
				<a href="index.php?updatebarang=<?php echo $row['id_jenis'] ?>">
					<i class="fas fa-fw fa-edit mr-2"></i>
				</a>|
				<a href="barang_hapus.php?id=<?php echo $row['id_jenis'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
					<i class="fas fa-fw fa-trash ml-2"></i>
				</a>
			</td>
			<td>
				<?php echo $row['jenis_barang']; ?>
			</td>

			<td>
				<?php echo $row['persen_taksiran']; ?>%
			</td>


		</tr>
	<?php
	}
	?>

</table>