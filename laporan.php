<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Laporan</title>
</head>

<body>

  <h2 align="center">Laporan</h2>

  <form name="kegiatan" action="index.php?page=laporan_proses" method="post" enctype="multipart/form-data">
    <table cellpadding="3" cellspacing="0" align="center">
      <tr>
        <td>Jenis Laporan</td>
        <td>:</td>
        <td>
          <select name="jenis" id="jenis" class="form-control" required>
            <option>-- Pilih --</option>
            <option value="1">Data Nasabah</option>
            <option value="2">Data Transaksi</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Periode Awal</td>
        <td>:</td>
        <td>
          <input required id="tgl_awal" type="date" name="tgl_awal" class="form-control" />
        </td>
      </tr>

      <tr>
      <tr>
        <td>Periode Akhir</td>
        <td>:</td>
        <td>
          <input required type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" />
        </td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="submit" class="btn btn-info">Proses</button>
        </td>
      </tr>

    </table>

  </form>
</body>

</html>