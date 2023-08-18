<?php
include("koneksi.php");
if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$ambil = mysqli_query($conn, "select * from admin WHERE username='$user' AND pass='$pass'");

	if (mysqli_num_rows($ambil) == 1) {
		echo "<script>alert('Selamat Anda Berhasil Login');</script>";
		$akun = mysqli_fetch_assoc($ambil);
		$_SESSION["admin"] = $akun;
		header("Refresh:0");
	} else {
		echo "<script>alert('Username Atau Password Salah');</script>";
		header("Refresh:0");
	}
}

if (isset($_SESSION['admin'])) { ?>


	<div class="container">
		<div class="row">
			<div class="col-md-3 mt-5">
				<div class="card" style="width: 14rem;">
					<img src="Gambar/kalkulator.png" class="card-img-top" height="200" width="300" alt="..." style="padding: 10px;">
					<div class="card-body text-center">
						<p class="card-title">Kalkulator Gadai</p>
						<a href="index.php?page=pegadaian" class="btn btn-primary text-center">Pilih</a>
					</div>
				</div>
			</div>


			<div class="col-md-3 mt-5">
				<div class="card" style="width: 14rem;">
					<img src="Gambar/barang.png" class="card-img-top" width="300" height="200" alt="..." style="padding: 10px;">
					<div class="card-body text-center">
						<p class="card-title">Data Gadai</p>
						<a href="index.php?page=gadai" class="btn btn-primary text-center">Pilih</a>
					</div>
				</div>
			</div>

			<div class="col-md-3 mt-5">
				<div class="card" style="width: 14rem;">
					<img src="Gambar/Nasabah1.png" class="card-img-top" width="300" height="200" alt="..." style="padding: 10px;">
					<div class="card-body text-center">
						<p class="card-title">Nasabah</p>
						<a href="index.php?page=nasabah" class="btn btn-primary text-center">Pilih</a>
					</div>
				</div>
			</div>

			<div class="col-md-3 mt-5">
				<div class="card" style="width: 14rem;">
					<img src="Gambar/report.png" class="card-img-top" width="300" height="200" alt="..." style="padding: 10px;">
					<div class="card-body text-center">
						<p class="card-title">Laporan</p>
						<a href="index.php?page=laporan" class="btn btn-primary text-center">PILIH</a>
					</div>
				</div>
			</div>

		</div>
	</div>


<?php } else {
?>
	<style>
		body {
			background-image: url("Gambar/Kantor.jpg");
			/* Full height */
			height: 100%;


			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>

	<body>
		<div class="container">

			<div class="card o-hidden border-0 shadow-lg" style="margin-top: 2%;">
				<div class="card-body p-3">
					<div class="card shadow-lg justify-content-center align-items-center bg-primary" style="width: 100%;">

						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-m">
								<div class="p-5">
									<b>
										<h3 style="color: white;" align="center"> SISTEM INFORMASI </h3>
										<h3 style="color: white;" align="center"> MANAJEMEN GADAI </h3>
									</b>
									<img src="Gambar/logo.png" alt="Gambar" width="280px" height="280px">
									<hr>

									<form class="user" action="index.php" method="post">
										<div class="form-group">
											<input type="Text" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
										</div>
										<div class="form-group">
											<input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
										</div>
										<!-- <div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck">Remember Me</label>
										</div>
									</div> -->
										<hr>
										<button type="submit" name="login" value="Login" class="btn btn-outline-light btn-user btn-block ">
											Login
										</button>
									</form>
								</div>
							</div>
						</div>
						<?php
						if (isset($_GET['pesan'])) {
							$pesan = addslashes($_GET['pesan']);
							if ($pesan == "gagal") {
								echo "<div class='col-md-11'>";
								echo "<div class='alert alert-danger mt-1' role='alert'>";
								echo "<p><center>Gagal Masuk Sebagai Admin, <br> Silahkan Periksa Kembali Username & Password Anda</center></p>";
								echo   "</div>";
								echo "</div>";
							} else {
							}
						} else {
						}
						?>
					</div>
				</div>
			</div>

		</div>
	</body>
<?php } ?>