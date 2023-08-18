<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>

</head>

<body>


  <h2 align="center">Tambah Data</h2>



  <form name="kegiatan" action="proses_insert.php" method="post">
    <table cellpadding="3" cellspacing="0" align="center">
      <!-- <tr>
        <td>Kd Admin</td>
        <td>:</td>
        <td><input name='in_KdAdmin' id='in_KdAdmin' class='form-control' type='text' ></td>
    </tr> -->
      <tr>
        <td>Nama Admin</td>
        <td>:</td>
        <td><input name='in_NamaAdmin' id='in_NamaAdmin' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input name='in_Username' id='in_Username' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input name='in_Password' id='in_Password' class='form-control' type='password'></td>
      </tr>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_admin_tambah" class="btn btn-info">Submit</button>
        </td>
      </tr>

    </table>

  </form>


</body>

</html>