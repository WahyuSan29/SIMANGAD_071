<?php

include("config.php");



// user
if (isset($_POST['btn_user_update'])) {
	$kd_admin = $_GET['id'];
	$nama_admin = $_POST['in_NamaAdmin'];
	$username = $_POST['in_Username'];
	$password = $_POST['in_Password'];

	$sql = "UPDATE admin SET nama_admin=:nama_admin,username=:username,pass=:password WHERE id_admin=:kd_admin";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':kd_admin', $kd_admin);
	$query->bindparam(':nama_admin', $nama_admin);
	$query->bindparam(':username', $username);
	$query->bindparam(':password', $password);
	$query->execute();

	if ($query) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil di perbarui!');
			document.location='index.php?page=admin';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// pengelola
if (isset($_POST['btn_pengelola_update'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

	$sql = "UPDATE pengelola SET nama=:nama,alamat=:alamat WHERE nik_pengelola=:nik";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':nik', $nik);
	$query->bindparam(':nama', $nama);
	$query->bindparam(':alamat', $alamat);
	$query->execute();

	if ($query) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil di perbarui!');
			document.location='index.php?page=pengelola';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}

// Jenis Barang
if (isset($_POST['btn_barang_update'])) {
	$id_jenis = $_GET['id'];
	$nama_barang = $_POST['in_jenis'];
	$persen = $_POST['in_persen'];

	$sql = "update jenis_barang set jenis_barang=:nama_barang,persen_taksiran=:persen where id_jenis=:id_jenis";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':id_jenis', $id_jenis);
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

// Jenis Barang
if (isset($_POST['btn_loker_update'])) {
	$id_loker = $_GET['id'];
	$kd_loker = $_POST['in_kdloker'];

	$sql = "UPDATE loker set kd_loker=:kd_loker where id_loker=:id_loker";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':id_loker', $id_loker);
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

// Status Gadai
if (isset($_POST['btn_penggadaian_update'])) {

	$id_surat = $_GET['id'];
	$no_surat = $_POST['in_noSurat'];
	$nik = $_POST['in_Nik'];
	$nik_pengelola = $_POST['in_nikPengelola'];
	$id_barang = $_POST['in_idBarang'];
	$harga_taksir = $_POST['in_hargaTaksir'];
	$harga_sewa = $_POST['in_hargaSewa'];
	$tgl_gadai = $_POST['in_tglGadai'];
	$lama_gadai = $_POST['in_lamaGadai'];
	$keterangan = $_POST['in_ket'];
	$id_loker = $_POST['in_idloker'];

	// EKSTENSI
	$ekstensi_diperbolehkan = array('jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'png', 'gif');
	$nama_gambar = $_FILES['trx_gambar']['name'];
	$x = explode('.', $nama_gambar);
	$ekstensi_gambar = strtolower(end($x));
	$ukuran_gambar = $_FILES['trx_gambar']['size'];
	$file_tmp_gambar = $_FILES['trx_gambar']['tmp_name'];

	$nama_akad = $_FILES['trx_akad']['name'];
	$x = explode('.', $nama_akad);
	$ekstensi_akad = strtolower(end($x));
	$ukuran_akad = $_FILES['trx_akad']['size'];
	$file_tmp_akad = $_FILES['trx_akad']['tmp_name'];

	if (in_array($ekstensi_gambar, $ekstensi_diperbolehkan) === true) {
		move_uploaded_file($file_tmp_gambar, 'img/foto_transaksi/' . $nama_gambar);
	}

	if ($ekstensi_akad === 'pdf') {
		move_uploaded_file($file_tmp_akad, 'img/akad/' . $nama_akad);
	}

	$sql = "UPDATE penggadaian SET no_surat=:no_surat,nik=:nik,nik_pengelola=:nik_pengelola,id_barang=:id_barang,harga_taksir=:harga_taksir,harga_sewa=:harga_sewa,
	tgl_gadai=:tgl_gadai,lama_gadai=:lama_gadai,keterangan=:keterangan,id_loker=:id_loker";

	if (in_array($ekstensi_gambar, $ekstensi_diperbolehkan) === true) {
		$sql .= ",trx_gambar=:trx_gambar";
	}

	if ($ekstensi_akad === 'pdf') {
		$sql .= ",trx_akad=:trx_akad";
	}

	$sql .= " WHERE id_surat=:id_surat";

	$query = $dbConn->prepare($sql);
	$query->bindParam(':id_surat', $id_surat);
	$query->bindParam(':no_surat', $no_surat);
	$query->bindParam(':nik', $nik);
	$query->bindParam(':nik_pengelola', $nik_pengelola);
	$query->bindParam(':id_barang', $id_barang);
	$query->bindParam(':harga_taksir', $harga_taksir);
	$query->bindParam(':harga_sewa', $harga_sewa);
	$query->bindParam(':tgl_gadai', $tgl_gadai);
	$query->bindParam(':lama_gadai', $lama_gadai);
	$query->bindParam(':keterangan', $keterangan);
	$query->bindParam(':id_loker', $id_loker);

	if (in_array($ekstensi_gambar, $ekstensi_diperbolehkan) === true) {
		$query->bindParam(':trx_gambar', $nama_gambar);
	}

	if ($ekstensi_akad === 'pdf') {
		$query->bindParam(':trx_akad', $nama_akad);
	}

	if ($query->execute()) {
		echo "
		<script language='javascript'>
			alert('Data Berhasil disimpan!');
			document.location='index.php?page=gadai';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
	}

	$dbConn = null;
}




// if (isset($_POST['btn_penggadaian_update'])) {
// 	$id_surat = $_GET['id'];
// 	$status = $_POST['in_status'];

// 	$sql = "update penggadaian set status=:in_status where id_surat=:id";
// 	$query = $dbConn->prepare($sql);
// 	$query->bindparam(':id_surat', $id_surat);
// 	$query->bindparam(':status', $status);
// 	$query->execute();

// 	if ($query) {
// 		echo "
// 		<script language='javascript'>
// 			alert('Data Berhasil di simpan!');
// 			document.location='index.php?page=gadai';
// 		</script>";
// 	} else {
// 		echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
// 	}

// 	$dbConn = null;
// }

// Besar Pinjaman
if (isset($_POST['btn_tarif_update'])) {
	$id_pinjaman = $_GET['id'];
	$golongan = $_POST['in_golongan'];
	$minimal = $_POST['in_minimal'];
	$maksimal = $_POST['in_maksimal'];
	$tarif = $_POST['in_tarif'];

	$sql = "update besar_pinjaman set golongan=:golongan,minimal=:minimal,maksimal=:maksimal,tarif_ujroh=:tarif where id_bsr_pinjaman=:id_pinjaman";
	$query = $dbConn->prepare($sql);
	$query->bindparam(':id_pinjaman', $id_pinjaman);
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

// Nasabah
if (isset($_POST['btn_nasabah_update'])) {

	$nik = $_GET['id'];
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

	// EKSTENSI
	$ekstensi_diperbolehkan    = array('jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'png', 'gif');
	$nama = $_FILES['ktp']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran    = $_FILES['ktp']['size'];
	$file_tmp = $_FILES['ktp']['tmp_name'];

	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

		move_uploaded_file($file_tmp, 'img/ktp/' . $nama);
		$sql = "UPDATE nasabah SET nama_nasabah=:nama_nas,alamat_nasabah=:alamat_nas,
	tgl_lahir=:tgl,jk=:jk,pekerjaan=:pekerjaan,no_hp=:no_hp,nama_keluarga=:nama_keluarga,
	alamat_keluarga=:alamat_keluarga,no_hp_keluarga=:no_keluarga,tgl_register=:tgl_register,ktp=:ktp WHERE nik=:nik";
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
		$sql = "UPDATE nasabah SET nama_nasabah=:nama_nas,alamat_nasabah=:alamat_nas,
	tgl_lahir=:tgl,jk=:jk,pekerjaan=:pekerjaan,no_hp=:no_hp,nama_keluarga=:nama_keluarga,
	alamat_keluarga=:alamat_keluarga,no_hp_keluarga=:no_keluarga,tgl_register=:tgl_register WHERE nik=:nik";
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
