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

<h2 align="center">DAFTAR LOKER</h2>

<p align="center"><a href="index.php?page=floker" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>
<table border="1" align="center" class="table table-bordered">
	<tr align="center">
		<th>No</th>
		<th>Pilihan</th>
		<th>Kode Loker</th>
	</tr>
	<?php
	if (isset($_POST['filter'])) {
		$cari = $_POST['cari'];
		$result = $dbConn->query("SELECT * FROM loker where id_loker like '%$cari%' or kd_loker like '%$cari%' ");
	} else {
		$result = $dbConn->query("SELECT * FROM loker order by kd_loker asc");
	}
	$counter = 1;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<td width="50px">
				<?php echo $counter++; ?>
			</td>
			<td width="50px">
				<a href="index.php?updateloker=<?php echo $row['id_loker']; ?>">
					<i class="fas fa-fw fa-edit mr-0"></i>
				</a>
			</td>
			<td width="500px">
				<?php echo $row['kd_loker']; ?>
			</td>
		</tr>
	<?php
	}
	?>
</table>