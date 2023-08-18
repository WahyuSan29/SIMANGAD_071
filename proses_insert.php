<?php

// koneksi
include("config.php");
include("koneksi.php");

// nasabah
if (isset($_POST['btn_nasabah_tambah'])) {
	$nik = $_POST['in_Nik'];
	$nama_nas = $_POST['in_NamaNas'];
	$alamat_nas = $_POST['in_AlamatNas'];
	$tgl = $_POST['in_TglNas'];
	$jk = $_POST['jk'];
	$pekerjaan = $_POST['in_Pekerjaan'];
	$no_hp = $_POST['in_Nohp'];
	$nama_keluarga = $_POST['in_Namakeluarga'];
	$alamat_keluarga = $_POST['in_Alamatkeluarga'];
	$no_keluarga = $_POST['in_Nokeluarga'];
	$tgl_register = $_POST['in_Tglreg'];


	$ekstensi_diperbolehkan    = array('jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'png', 'gif');
	$nama = $_FILES['ktp']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran    = $_FILES['ktp']['size'];
	$file_tmp = $_FILES['ktp']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

		move_uploaded_file($file_tmp, 'img/ktp/' . $nama);
		$sql = "INSERT INTO nasabah  VALUES (:nik,:nama_nas,:alamat_nas,:tgl,:jk,:pekerjaan,:no_hp,:nama_keluarga,:alamat_keluarga,:no_keluarga,:tgl_register,:ktp)";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':nik', $nik);
		$query->bindparam(':nama_nas', $nama_nas);
		$query->bindparam(':alamat_nas', $alamat_nas);
		$query->bindparam(':tgl', $tgl);
		$query->bindparam(':jk', $jk);
		$query->bindparam(':pekerjaan', $pekerjaan);
		$query->bindparam(':no_hp', $no_hp);
		$query->bindparam(':nama_keluarga', $nama_keluarga);
		$query->bindparam(':alamat_keluarga', $alamat_keluarga);
		$query->bindparam(':no_keluarga', $no_keluarga);
		$query->bindparam(':tgl_register', $tgl_register);
		$query->bindparam(':ktp', $nama);
		$query->execute();
	} else {
		$sql = "INSERT INTO nasabah  VALUES (:nik,:nama_nas,:alamat_nas,:tgl,:jk,:pekerjaan,:no_hp,:nama_keluarga,:alamat_keluarga,:no_keluarga,:tgl_register)";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':nik', $nik);
		$query->bindparam(':nama_nas', $nama_nas);
		$query->bindparam(':alamat_nas', $alamat_nas);
		$query->bindparam(':tgl', $tgl);
		$query->bindparam(':jk', $jk);
		$query->bindparam(':pekerjaan', $pekerjaan);
		$query->bindparam(':no_hp', $no_hp);
		$query->bindparam(':nama_keluarga', $nama_keluarga);
		$query->bindparam(':alamat_keluarga', $alamat_keluarga);
		$query->bindparam(':no_keluarga', $no_keluarga);
		$query->bindparam(':tgl_register', $tgl_register);
		$query->execute();
	}

	if ($query) {
		echo "
			<script language='javascript'>
				alert('Data Berhasil di simpan!');
				document.location='index.php?page=nasabah';
			</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}


	$dbConn = null;
}



// USER
if (isset($_POST['btn_admin_tambah'])) {

	//$kd_admin = $_POST['in_KdAdmin'];
	$nama_admin = $_POST['in_NamaAdmin'];
	$username = $_POST['in_Username'];
	$password = $_POST['in_Password'];
	$query = "select *from admin where username='$username'";
	$result1 = mysqli_query($conn, $query);
	$row1 = mysqli_num_rows($result1);
	if ($row1 == 1) {
		echo "<script>alert('Username Sudah Ada');history.go(-1)</script>";
	} else {
		$sql = "INSERT INTO admin  VALUES ('',:nama_admin,:username,:password)";
		$query = $dbConn->prepare($sql);
		//$query->bindparam(':kd_admin', $kd_admin);
		$query->bindparam(':nama_admin', $nama_admin);
		$query->bindparam(':username', $username);
		$query->bindparam(':password', $password);
		$query->execute();

		if ($query) {
			echo "
		<script language='javascript'>
			alert('Data Berhasil di simpan!');
			document.location='index.php?page=admin';
		</script>";
		} else {
			echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
		}

		$dbConn = null;
	}
}

// Pengelola
if (isset($_POST['btn_pengelola_tambah'])) {

	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$query = "select *from pengelola where nik_pengelola='$nik'";
	$result1 = mysqli_query($conn, $query);
	$row1 = mysqli_num_rows($result1);
	if ($row1 == 1) {
		echo "<script>alert('Pengelola Sudah Ada');history.go(-1)</script>";
	} else {
		$sql = "INSERT INTO pengelola  VALUES (:nik,:nama,:alamat)";
		$query = $dbConn->prepare($sql);
		//$query->bindparam(':kd_admin', $kd_admin);
		$query->bindparam(':nik', $nik);
		$query->bindparam(':nama', $nama);
		$query->bindparam(':alamat', $alamat);
		$query->execute();

		if ($query) {
			echo "
		<script language='javascript'>
			alert('Data Berhasil di simpan!');
			document.location='index.php?page=pengelola';
		</script>";
		} else {
			echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
		}

		$dbConn = null;
	}
}

// Jenis barang
if (isset($_POST['btn_barang_tambah'])) {

	$nama_barang = $_POST['in_NamaBrg'];
	$persen = $_POST['in_persen'];

	$sql = "INSERT INTO jenis_barang VALUES ('',:nama_barang,:persen)";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':nama_barang', $nama_barang);
	$query->bindparam(':persen', $persen);
	$query->execute();

	if ($query) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil di simpan!');
			document.location='index.php?page=jenis';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// Loker
if (isset($_POST['btn_loker_tambah'])) {

	$kd_loker = $_POST['in_kdloker'];

	$sql = "INSERT INTO loker VALUES ('',:kd_loker)";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':kd_loker', $kd_loker);
	$query->execute();

	if ($query) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil di simpan!');
			document.location='index.php?page=loker';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// Besar Pinjaman
if (isset($_POST['btn_tarif_tambah'])) {

	$golongan = $_POST['in_golongan'];
	$minimal = $_POST['in_minimal'];
	$maksimal = $_POST['in_maksimal'];
	$tarif = $_POST['in_tarif'];

	$sql = "INSERT INTO besar_pinjaman VALUES ('',:golongan,:minimal,:maksimal,:tarif)";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':golongan', $golongan);
	$query->bindparam(':minimal', $minimal);
	$query->bindparam(':maksimal', $maksimal);
	$query->bindparam(':tarif', $tarif);
	$query->execute();

	if ($query) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil di simpan!');
			document.location='index.php?page=pinjaman';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// penggadaian
if (isset($_POST['btn_perjanjian'])) {
	$harga_taksiran = $_POST['harga_taksiran'];
	$sewa = $_POST['sewa'];
	$barang = $_POST['barang'];
	$merek = $_POST['merek'];
	$tahun = $_POST['tahun'];
	$warna = $_POST['warna'];
	$nasabah = $_POST['nasabah'];
	$pengelola = $_POST['pengelola'];
	$jangka = $_POST['jangka'];
	$jenis = $_POST['jenis'];
	$keterangan = $_POST['keterangan'];
	$id_loker = $_POST['id_loker'];

	$sql = "INSERT INTO barang  VALUES ('',:jenis,:nasabah,:barang,:merek,:tahun,:warna)";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':nasabah', $nasabah);
	$query->bindparam(':barang', $barang);
	$query->bindparam(':merek', $merek);
	$query->bindparam(':tahun', $tahun);
	$query->bindparam(':warna', $warna);
	$query->bindparam(':jenis', $jenis);
	$query->execute();

	$no_daftar = "SELECT MAX(id_barang) AS maxID
FROM barang";
	$hasil = mysqli_query($conn, $no_daftar);
	$data1 = mysqli_fetch_array($hasil);
	$idmax = $data1['maxID'];
	$id_barang = sprintf($idmax);

	$no_daftar1 = "SELECT MAX(id_surat) AS maxID
FROM penggadaian";
	$hasil1 = mysqli_query($conn, $no_daftar1);
	$data2 = mysqli_fetch_array($hasil1);
	$idmax1 = $data2['maxID'];
	$nomor1 = $idmax1++;
	$id_surat = sprintf($idmax1);

	$bulan = array(
		'01' => 'I',
		'02' => 'II',
		'03' => 'III',
		'04' => 'IV',
		'05' => 'V',
		'06' => 'VI',
		'07' => 'VII',
		'08' => 'VIII',
		'09' => 'IX',
		'10' => 'X',
		'11' => 'XI',
		'12' => 'XII',
	);
	$bln = date('m');
	$tahun = date('Y');

	$ekstensi_diperbolehkan    = array('jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'png', 'gif');
	$nama = $_FILES['trx_gambar']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran    = $_FILES['trx_gambar']['size'];
	$file_tmp = $_FILES['trx_gambar']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

		move_uploaded_file($file_tmp, 'img/foto_transaksi/' . $nama);
		$sql = "INSERT INTO penggadaian  VALUES ('$id_surat','$id_surat/BMT071/SPG/$bulan[$bln]/$tahun',:nasabah,:pengelola,:id_barang,:harga_taksiran,:harga_sewa,CURRENT_DATE(),:jangka,:keterangan,:id_loker,:trx_gambar,:trx_akad)";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':nasabah', $nasabah);
		$query->bindparam(':pengelola', $pengelola);
		$query->bindparam(':id_barang', $id_barang);
		$query->bindparam(':harga_taksiran', $harga_taksiran);
		$query->bindparam(':harga_sewa', $sewa);
		$query->bindparam(':jangka', $jangka);
		$query->bindparam(':keterangan', $keterangan);
		$query->bindparam(':id_loker', $id_loker);
		$query->bindparam(':trx_gambar', $nama);
		$query->bindparam(':trx_akad', $trx_akad);
	}
	$query->execute();
	if ($query) {
		echo "<script>alert('Berhasil');
window.open('cetak_surat_perjanjian.php?id=$id_surat','blank');
</script>";
		echo "<script>location='index.php?page=gadai';</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// penggadaian2
if (isset($_POST['btn_perjanjian1'])) {
	$harga_taksiran = $_POST['harga_taksiran'];
	$sewa = $_POST['sewa'];
	$barang = $_POST['barang'];
	$nasabah = $_POST['nasabah'];
	$pengelola = $_POST['pengelola'];
	$jangka = $_POST['jangka'];
	$jenis = $_POST['barang'];
	$keterangan = $_POST['keterangan'];
	$id_loker = $_POST['id_loker'];

	$no_daftar1 = "SELECT MAX(id_surat) AS maxID
FROM penggadaian";
	$hasil1 = mysqli_query($conn, $no_daftar1);
	$data2 = mysqli_fetch_array($hasil1);
	$idmax1 = $data2['maxID'];
	$nomor1 = $idmax1++;
	$id_surat = sprintf($idmax1);

	$bulan = array(
		'01' => 'I',
		'02' => 'II',
		'03' => 'III',
		'04' => 'IV',
		'05' => 'V',
		'06' => 'VI',
		'07' => 'VII',
		'08' => 'VIII',
		'09' => 'IX',
		'10' => 'X',
		'11' => 'XI',
		'12' => 'XII',
	);
	$bln = date('m');
	$tahun = date('Y');

	$ekstensi_diperbolehkan    = array('jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'png', 'gif');
	$nama = $_FILES['trx_gambar']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran    = $_FILES['trx_gambar']['size'];
	$file_tmp = $_FILES['trx_gambar']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

		move_uploaded_file($file_tmp, 'img/foto_transaksi/' . $nama);
		$sql = "INSERT INTO penggadaian  VALUES ('$id_surat','$id_surat/BMT071/SPG/$bulan[$bln]/$tahun',:nasabah,:pengelola,:id_barang,:harga_taksiran,:harga_sewa,CURRENT_DATE(),:jangka,:keterangan,:id_loker,:trx_gambar,:trx_akad)";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':nasabah', $nasabah);
		$query->bindparam(':pengelola', $pengelola);
		$query->bindparam(':id_barang', $barang);
		$query->bindparam(':harga_taksiran', $harga_taksiran);
		$query->bindparam(':harga_sewa', $sewa);
		$query->bindparam(':jangka', $jangka);
		$query->bindparam(':keterangan', $keterangan);
		$query->bindparam(':id_loker', $id_loker);
		$query->bindparam(':trx_gambar', $nama);
		$query->bindparam(':trx_akad', $trx_akad);
	}
	$query->execute();
	if ($query) {
		echo "<script>alert('Berhasil');
window.open('cetak_surat_perjanjian.php?id=$id_surat','blank');
</script>";
		echo "<script>location='index.php?page=gadai';</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}
