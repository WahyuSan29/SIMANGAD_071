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

<h2 align="center">DAFTAR ADMIN</h2>
<p align="center"><a href="index.php?page=fadmin" role="button" type="button" class="btn btn-outline-primary">Tambah Data</a></p>

<div style="margin-bottom: 20px;">
	<form action="index.php?page=user" method="post">
		<table>
			<tr>
				<td>Pencarian</td>
				<td><input type="text" name="cari" /></td>
				<td><button name="filter" type="submit" value=filter>Cari</button></td>
			</tr>
		</table>
	</form>
</div>
<table width="900px" align="center" border="1" class="table table-bordered" style="border-collapse:collapse">
	<tr align="center">
		<th>Pilihan</th>
		<!-- <th>Kd Admin</th> -->
		<th>Nama</th>
		<th>Username</th>
	</tr>
	<?php
	include("config.php");
	if (isset($_POST['filter'])) {
		$cari = $_POST['cari'];
		$result = $dbConn->query("select * from admin where id_admin like '%$cari%' or nama_admin like '%$cari%'");
	} else {
		$result = $dbConn->query("SELECT * FROM admin");
	}
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	?>
		<tr align="center">
			<td align="center" width="150px">
				<a href="index.php?updateadmin=<?php echo $row['id_admin'] ?>">
					<i class="fas fa-fw fa-edit mr-2"></i>
				</a>|
				<a href="admin_hapus.php?id=<?php echo $row['id_admin'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
					<i class="fas fa-fw fa-trash ml-2"></i>
				</a>
			</td>
			<td>
				<?php echo $row['nama_admin']; ?>
			</td>
			<td align="center">
				<?php echo $row['username']; ?>
			</td>

		</tr>
	<?php
	}
	?>

</table>