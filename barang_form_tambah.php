<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>

</head>

<body>



  <h2 align="center">Tambah Data Barang</h2>



  <form name="kegiatan" action="proses_insert.php" method="post">
    <table align="center">
      <tr>
        <td>Jenis Barang</td>
        <td>:</td>
        <td><input name='in_NamaBrg' id='in_NamaBrg' class='form-control' type='text'></td>
        </td>

      </tr>
      <tr>
        <td>Persentase Taksiran</td>
        <td>:</td>
        <td><input name='in_persen' id='in_HrgBeli' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>&nbsp;

        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_barang_tambah" class="btn btn-info">Submit</button>
        </td>
      </tr>

    </table>

  </form>


</body>

</html>