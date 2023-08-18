<?php include 'check_login.php'; ?>

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



<h3 align="center">Update Status Gadai</h3>

<?php
include 'koneksi.php';

if (isset($_GET['updatestatusgadai'])) {
  $id = $_GET['updatestatusgadai'];

  $result = $dbConn->prepare("SELECT * FROM penggadaian where id_surat=:id");
  $result->execute(array(':id' => $id));
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $keterangan = $row['keterangan'];

  if ($row) {
  } else {
    echo "DATA TIDAK DI TEMUKAN";
  }
}
?>

<form name="edit" action="proses_update.php?id=<?php echo $row['id_surat']; ?>" method="post" class="mt-2 mb-4" enctype="multipart/form-data">
  <table cellpadding="3" cellspacing="0" align="center">
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td>
        <select class="form-control" id="ketgadai" name="in_ket">
          <option <?php if ($keterangan == 'Lunas') {
                    echo 'selected';
                  } ?> value="Lunas">Lunas</option>
          <option <?php if ($keterangan == 'Belum Lunas') {
                    echo 'selected';
                  } ?> value="Belum Lunas">Belum Lunas</option>
        </select>
      </td>
    </tr>
    <tr hidden>
      <td>Id Surat</td>
      <td>:</td>
      <td>
        <input readonly type="text" value="<?php echo $row['id_surat'] ?>" name="in_surat" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' />
      </td>
    </tr>
    <tr>
      <td>No Surat</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_noSurat" class="form-control" value="<?php echo $row['no_surat'] ?>" />
      </td>
    </tr>
    <tr>
    <tr hidden>
      <td>NIK</td>
      <td>:</td>
      <td>
        <input readonly type="text" value="<?php echo $row['nik'] ?>" name="in_Nik" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' />
      </td>
    </tr>

    <tr hidden>
      <td>NIK Pengelola</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_nikPengelola" class="form-control" value="<?php echo $row['nik_pengelola'] ?>" />
      </td>
    </tr>

    <tr hidden>
      <td>Id Barang</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_idBarang" class="form-control" value="<?php echo $row['id_barang'] ?>" />
      </td>
    </tr>
    <tr hidden>
      <td>Harga Taksir</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_hargaTaksir" class="form-control" value="<?php echo $row['harga_taksir'] ?>" />
      </td>
    </tr>

    <tr hidden>
      <td>Harga Sewa</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_hargaSewa" class="form-control" value="<?php echo $row['harga_sewa'] ?>" />
      </td>
    </tr>

    <tr>
      <td>Tanggal Gadai</td>
      <td>:</td>
      <td>
        <input readonly type="date" name="in_tglGadai" value="<?php echo $row['tgl_gadai'] ?>" class="form-control" />
      </td>
    </tr>
    <tr hidden>
      <td>Lama Gadai</td>
      <td>:</td>
      <td>
        <input readonly type="number" name="in_lamaGadai" value="<?php echo $row['lama_gadai'] ?>" class="form-control" />
      </td>
    </tr>
    <tr hidden>
      <td>Kode Loker</td>
      <td>:</td>
      <td>
        <input readonly type="text" name="in_idloker" class="form-control" value="<?php echo $row['id_loker'] ?>" />
      </td>
    </tr>
    <tr hidden>
      <td>Foto Transaksi</td>
      <td>:</td>
      <td>
        <input type="file" name="trx_gambar" value="<?php echo $row['trx_gambar'] ?>" />
      </td>
    </tr>
    <tr>
      <td>Foto Transaksi</td>
      <td>:</td>
      <td>
        <?php
        if ($row['trx_gambar'] <> '') {
          echo '<img src="./img/foto_transaksi/' . $row['trx_gambar'] . '" width="220px">';
        } ?>
      </td>
    </tr>
    <tr>
      <td>Scan Transaksi</td>
      <td>:</td>
      <td>
        <input type="file" name="trx_akad" value="<?php echo $row['trx_akad'] ?>" />
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>
        <br>
        <button type="submit" name="btn_penggadaian_update" class="btn btn-info">Simpan</button>
      </td>
    </tr>
  </table>
</form>