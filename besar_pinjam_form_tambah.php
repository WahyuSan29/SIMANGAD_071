<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>

</head>

<body>



  <h2 align="center">Tambah Data Besar Pinjaman</h2>


  <form name="kegiatan" action="proses_insert.php" method="post">
    <table align="center">
      <tr>
        <td>Golongan</td>
        <td>:</td>
        <td><input name='in_golongan' id='in_NamaBrg' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Minimal</td>
        <td>:</td>
        <td><input name='in_minimal' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Maksimal</td>
        <td>:</td>
        <td><input name='in_maksimal' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Tarif Ujroh</td>
        <td>:</td>
        <td><input name='in_tarif' class='form-control' type='text'>%</td>
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
          <button type="submit" name="btn_tarif_tambah" class="btn btn-info">Submit</button>
        </td>
      </tr>

    </table>

  </form>


</body>

</html>