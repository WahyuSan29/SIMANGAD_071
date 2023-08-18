<?php
include('koneksi.php');
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="icon" type="image/png" href="Gambar/logo2.png">
	<title>SIMANGAD | BMT 071</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

	<link href="css/style.css" type="text/css" rel="stylesheet">

	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link rel="stylesheet" href="js/jquery-ui.css" />

	<link rel="stylesheet" href="css/sweetalert2.min.css">

	<link rel="stylesheet" href="css/lightbox.css">

</head>
<!-- Page Wrapper -->

<body id="page-top">
	<?php
	if (isset($_SESSION['admin'])) {
	?>

		<div id="wrapper">


			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center mt-5" href="index.php">
					<div class="sidebar-brand-icon rotate-n-0">
						<img src="Gambar/logo.png" width="70%" height="70%">
					</div>
				</a>

				<div class="mt-5" align="center">

					<hr class="sidebar-divider mb-0">

					<li class="nav-item active ">
						<a class="nav-link" href="index.php">
							<i class="fas fa-fw fa-bars"></i>
							<span>Dashboard</span></a>
					</li>

					<hr class="sidebar-divider mb-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php?page=nasabah">
							<i class="fas fa-fw fa-users"></i>

							<span>Data Nasabah</span></a>
					</li>

					<hr class="sidebar-divider mb-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php?page=gadai">
							<i class="fas fa-fw fa-boxes"></i>

							<span>Data Penggadaian</span></a>
					</li>

					<hr class="sidebar-divider mb-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php?page=laporan">
							<i class="fas fa-fw fa-file"></i>

							<span>Laporan</span></a>
					</li>

					<!-- Dropdowm -->

					<hr class="sidebar-divider mb-0">
					<li class="nav-item active">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
							<i class="fas fa-fw fa-folder"></i>
							<span>Data Lainnya</span>
						</a>
						<div id="collapsePages1" class="collapse bg-primary" aria-labelledby="headingPages" data-parent="#accordionSidebar">
							<div class="bg-blue py-2 collapse-inner rounded">

								<a class="nav-link" href="index.php?page=jenis">

									<span>Data Jenis Barang</span></a>

								<a class="nav-link" href="index.php?page=pinjaman">

									<span>Data Besar Pinjaman</span></a>

								<a class="nav-link" href="index.php?page=pengelola">

									<span>Data Pengelola</span></a>

								<a class="nav-link" href="index.php?page=loker">

									<span>Data Loker</span></a>

								<a class="nav-link" href="index.php?page=template">

									<span>Template Surat</span></a>

							</div>
						</div>
					</li>

					<hr class="sidebar-divider mb-0">
					<li class="nav-item active">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
							<i class="fas fa-fw fa-folder"></i>
							<span>Menu Lainnya</span>
						</a>
						<div id="collapsePages2" class="collapse bg-primary" aria-labelledby="headingPages" data-parent="#accordionSidebar">
							<div class="bg-blue py-2 collapse-inner rounded">

								<a class="nav-link" href="index.php?page=backup-restore">

									<span>Backup Data</span></a>

							<?php }

						if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
							?>
								<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">

									<span>Logout</span></a>
							</div>
						</div>
					</li>


					<hr class="sidebar-divider mb-0">
					<div class="text-center d-none d-md-inline">
						<button class="rounded-circle border-0 mt-3" id="sidebarToggle"></button>
					</div>
			</ul>
		<?php } ?>

		<div id="content-wrapper" class="d-flex flex-column">


			<div id="content">
				<!-- TOP BAR BOSS -->
				<?php
				if (isset($_SESSION['admin'])) {
				?>
					<nav class="navbar navbar-expand bg-primary navbar-light topbar mb-4 static-top shadow">

						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-bg-light d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>

						<div class="col-md-6 col-sm-8 clearfix">
							<div class="nav-btn pull-left">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="pull-left text-white d-none d-lg-inline">
								<form action="#">
									<h4> <b>
											<script type="text/javascript">
												var h = (new Date()).getHours();
												var m = (new Date()).getMinutes();
												var s = (new Date()).getSeconds();
												if (h >= 4 && h < 10) document.writeln("Selamat Pagi,");
												if (h >= 10 && h < 15) document.writeln("Selamat Siang,");
												if (h >= 15 && h < 18) document.writeln("Selamat Sore,");
												if (h >= 18 || h < 4) document.writeln("Selamat Malam,");
											</script>
											<?php if (isset($_SESSION['admin'])) { ?> <?php echo $_SESSION['admin']['nama_admin'];
																					} ?>
										</b></h4>
								</form>
							</div>
						</div>

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">

							<!-- profile info & task notification -->
							<div class="col-md d-none d-lg-inline">
								<h6>
									<div class="mt-2" style="color: white">
										<script type='text/javascript'>
											var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
											var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
											var date = new Date();
											var day = date.getDate();
											var month = date.getMonth();
											var thisDay = date.getDay(),
												thisDay = myDays[thisDay];
											var yy = date.getYear();
											var year = (yy < 1000) ? yy + 1900 : yy;
											document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
										</script></b>
									</div>
								</h6>
							</div>

							<div class="topbar-divider d-none d-sm-block"></div>


							<a href="index.php?page=admin" style="color:white" class="mt-0">
								<span><b>
										<img src="Gambar/User1.png" width"30" height="30" alt="me" class="online" />
										<?php if (isset($_SESSION['admin'])) ?>
									</b></span>

							</a>
						</ul>

					</nav>
				<?php } ?>
				<!-- End of Topbar -->
				<?php if (isset($_SESSION['admin'])) { ?>
					<div class="container-fluid">

						<h2 class=" mt-4  font-weight-bold text-center" style="font-family:Verdana, Geneva, sans-serif"> SIMANGAD<br>
						</h2>
						<hr>
					<?php } ?>

					<?php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
						//$detil = $_GET['detil'];
						switch ($page) {
							case 'jenis':
								include "barang_lis.php";
								break;
							case 'template':
								include "template.php";
								break;
							case 'pinjaman':
								include "besar_pinjaman_lis.php";
								break;
							case 'besartambah':
								include "besar_pinjam_form_tambah.php";
								break;
							case 'besarhapus':
								include "akun_hapus.php";
								break;
							case 'admin':
								include "admin_lis.php";
								break;
							case 'nasabah':
								include "nasabah_lis.php";
								break;
							case 'pengelola':
								include "pengelola_lis.php";
								break;
							case 'fbarang':
								include "barang_form_tambah.php";
								break;
							case 'loker':
								include "loker_list.php";
								break;
							case 'floker':
								include "loker_form_tambah.php";
								break;
							case 'gadai':
								include "penggadaian_list.php";
								break;
							case 'fnasabah':
								include "nasabah_form_tambah.php";
								break;
							case 'fadmin':
								include "admin_form_tambah.php";
								break;
							case 'fpengelola':
								include "pengelola_form_tambah.php";
								break;
							case 'laporan':
								include "laporan.php";
								break;
							case 'laporan_proses':
								include "laporan_proses.php";
								break;

							case 'logout':
								unset($_SESSION['admin']);
								echo "<script>location='index.php';</script>";
								break;
							case 'pegadaian':
								include "kalku.php";
								break;

								//backup
							case 'backup-restore':
								include "backup-restore.php";
								break;
							case 'backup':
								include "backup.php";
								break;

							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['barang'])) {
						$detil = $_GET['barang'];
						switch ($detil) {
							case $detil:
								include "barang_list.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updatebarang'])) {
						$detil = $_GET['updatebarang'];
						switch ($detil) {
							case $detil:
								include "barang_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['kalku'])) {
						$detil = $_GET['kalku'];
						switch ($detil) {
							case $detil:
								include "kalku2.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updateloker'])) {
						$detil = $_GET['updateloker'];
						switch ($detil) {
							case $detil:
								include "loker_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updatestatusgadai'])) {
						$detil = $_GET['updatestatusgadai'];
						switch ($detil) {
							case $detil:
								include "penggadaian_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updateadmin'])) {
						$detil = $_GET['updateadmin'];
						switch ($detil) {
							case $detil:
								include "admin_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updatepengelola'])) {
						$detil = $_GET['updatepengelola'];
						switch ($detil) {
							case $detil:
								include "pengelola_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updatetarif'])) {
						$detil = $_GET['updatetarif'];
						switch ($detil) {
							case $detil:
								include "besar_pinjam_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else if (isset($_GET['updatenasabah'])) {
						$detil = $_GET['updatenasabah'];
						switch ($detil) {
							case $detil:
								include "nasabah_form_update.php";
								break;
							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else {
						include "home.php";
					}
					?>


					</div>
					<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php
			if (isset($_SESSION['admin'])) {
			?>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; 2023 SIMANGAD | BMT 071 </span>
						</div>
					</div>
				</footer>
			<?php }

			?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal -->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda yakin ingin Keluar dari SIMANGAD?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<a class="btn btn-primary" href="logout.php">Keluar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/datatables-demo.js"></script>

		<!-- Sweetalert2 -->
		<script src="js/sweetalert2.min.js"></script>

		<!-- Lightbox -->
		<script src="js/lightbox.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#tglLahir").change(function() {

					var inputTanggal = document.getElementById("tglLahir").value;
					var tanggalLahir = new Date(inputTanggal);
					var sekarang = new Date();
					var usia = sekarang.getFullYear() - tanggalLahir.getFullYear();

					// Periksa jika usia kurang dari 18 tahun
					if (usia < 18) {
						alert("Maaf, usia harus di atas 18 tahun.");
						$('#tglLahir').val('');
					}
				});
			});
		</script>
</body>

</html>