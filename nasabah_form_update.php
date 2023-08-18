<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Data</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css?v=1" />

  <script type="text/javascript">
    function getConfirmation() {
      var retVal = confirm("Anda yakin dengan data yang anda ubah?");
      if (retVal == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>

</head>

<body>

  <h2 align="center">Ubah Data Nasabah</h2>

  <?php

  if (isset($_GET['updatenasabah'])) {

    $id = $_GET['updatenasabah'];

    $result = $dbConn->prepare("SELECT * FROM nasabah where nik=:id");
    $result->execute(array(':id' => $id));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    } else {
      echo "DATA TIDAK DI TEMUKAN";
    }
  }
  ?>

  <?php
  function Pecah_TTL($tahun_sekarang, $in_TglNas)
  {
    $tgl = explode("/", $in_TglNas);
    $explode = $tgl[0];
    $umur = $tahun_sekarang - $explode;
    if ($umur < 17) {
      return true;
    } elseif ($umur > 26) {
      return true;
    } else {
      return false;
    }
  }
  $in_TglNas_err = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['in_TglNas'])) {
      $in_TglNas_err = "tahun lahir tidak boleh kosong";
      //memanggil atau validasi umurnya
    } elseif (Pecah_TTL($_POST['tahun_sekarang'], $_POST['in_TglNas'])) {
      $in_TglNas_err = "Maaf Umur Anda dibawah 17 tahun atau diatas 26 tahun,<br/> Anda tidak bisa daftar";
    } else {
      $in_TglNas = $_POST['in_TglNas'];
    }
    if (empty($_POST['tahun_sekarang'])) {
      die("Error : Tahun tidak boleh kosong");
    } else {
      $tahun_sekarang = $_POST['tahun_sekarang'];
    }

    if (empty($in_TglNas_err)) {
      //
      echo "Data berhasil disimpan";
    }
  }
  ?>
  </table>


  <form name="edit" action="proses_update.php?id=<?php echo $row['nik']; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="3" cellspacing="0" align="center">

      <tr>
        <td>NIK</td>
        <td>:</td>
        <td>
          <input readonly type="text" value="<?php echo $row['nik'] ?>" name="in_Nik" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' />
        </td>
      </tr>
      <tr>
        <td>Tanggal Register</td>
        <td>:</td>
        <td>
          <input readonly type="date" value="<?php echo $row['tgl_register'] ?>" name="in_Tglreg" class="form-control" id="tglreg" />
        </td>
      </tr>
      <tr>
        <td>Nama Nasabah</td>
        <td>:</td>
        <td>
          <input id="src" type="text" name="in_NamaNas" class="form-control" value="<?php echo $row['nama_nasabah'] ?>" />
        </td>
      </tr>

      <tr>
      <tr>
        <td>Alamat Nasabah</td>
        <td>:</td>
        <td>
          <input type="text" name="in_AlamatNas" class="form-control" value="<?php echo $row['alamat_nasabah'] ?>" />
        </td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="date" name="in_TglNas" class="form-control" value="<?php echo $row['tgl_lahir'] ?>" />
            <span><?php echo $in_TglNas_err; ?></span>
            <input type="hidden" name="tahun_sekarang" value="<?php echo date('Y'); ?>" />
          </form>
        </td>
      </tr>

      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><input type="radio" name="jk" value="Laki-laki" <?php if ($row['jk'] == "Laki-laki") { ?> checked<?php } ?> /><label class="ml-2">Laki-laki</label>
          <input class="ml-3" type="radio" name="jk" value="Perempuan" <?php if ($row['jk'] == "Perempuan") { ?> checked<?php } ?> /><label class="ml-2">Perempuan</label>
        </td>
      </tr>

      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>
          <input type="text" name="in_Pekerjaan" class="form-control" value="<?php echo $row['pekerjaan'] ?>" />
        </td>
      </tr>

      <tr>
        <td>No HP</td>
        <td>:</td>
        <td>
          <input type="text" name="in_Nohp" class="form-control" value="<?php echo $row['no_hp'] ?>" onchange='tryNumberFormat(this.form.thirdBox);' />
        </td>
      </tr>

      <tr>
        <td>Nama Keluarga</td>
        <td>:</td>
        <td>
          <input type="text" name="in_Namakeluarga" value="<?php echo $row['nama_keluarga'] ?>" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Alamat Keluarga</td>
        <td>:</td>
        <td>
          <input type="text" name="in_Alamatkeluarga" value="<?php echo $row['alamat_keluarga'] ?>" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>No HP Keluarga</td>
        <td>:</td>
        <td>
          <input type="text" name="in_Nokeluarga" class="form-control" value="<?php echo $row['no_hp_keluarga'] ?>" onchange='tryNumberFormat(this.form.thirdBox);' />
        </td>
      </tr>
      <tr>
        <td>Foto KTP</td>
        <td>:</td>
        <td>
          <input type="file" name="ktp" value="<?php echo $row['ktp'] ?>" />
        </td>
      </tr>
      <tr>
        <td>Foto Sebelumnya</td>
        <td>:</td>
        <td>
          <?php
          if ($row['ktp'] <> '') {
            echo '<img src="./img/ktp/' . $row['ktp'] . '" width="150px">';
          } ?>
        </td>
      </tr>
      <td></td>
      <td></td>
      <td>
        <button type="submit" name="btn_nasabah_update" class="btn btn-info" onclick="return getAge()">Update</button>
      </td>
      </tr>
    </table>
  </form>
  <br>
  <br>



</body>

</html>