<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data Loker</title>

</head>

<body>



  <h2 align="center">Tambah Data Loker</h2>

  <form name="tmbhloker" action="proses_insert.php" method="post">
    <table align="center">
      <tr>
        <td>Kode Loker</td>
        <td>:</td>
        <td><input name='in_kdloker' id='in_kdloker' class='form-control' type='text'></td>
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
          <button type="submit" name="btn_loker_tambah" class="btn btn-info">Tambah</button>
        </td>
      </tr>

    </table>

  </form>


</body>

</html>